<?php
/**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

include_once(_PS_MODULE_DIR_.'wtslideshow/classes/WtSlideshowClass.php');
include_once(_PS_MODULE_DIR_.'wtslideshow/classes/CaptionClass.php');
include_once(_PS_MODULE_DIR_.'wtslideshow/classes/WtSlideshowOption.php');
include_once(_PS_MODULE_DIR_.'wtslideshow/sql/SampleDataSlider.php');

class WtSlideshow extends Module implements WidgetInterface
{
	private $html = '';
	public function __construct()
	{
		$this->loadConfig();
		$this->name = 'wtslideshow';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'waterthemes';
		$this->secure_key = Tools::encrypt($this->name);
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->getTranslator()->trans('WT Layer SlideShow', array(), 'Modules.WTSlideshow.Admin');
		$this->description = $this->getTranslator()->trans('Show images slideshow to homepage..', array(), 'Modules.WTSlideshow.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
	}
	private function loadConfig()
	{
		$optransition2d = array();
		$optransition3d = array();
		include(dirname(__FILE__).'/option/option_transitions_2d.php');
		include(dirname(__FILE__).'/option/option_transitions_3d.php');
		$this->optransition2d = $optransition2d;
		$this->optransition3d = $optransition3d;
	}
	public function install()
	{
		$res = true;
		if (parent::install() &&
			$this->registerHook('displayHeader') &&
			$this->registerHook('displaySlideshow') &&
			$this->registerHook('actionShopDataDuplication') && $this->registerHook('actionObjectLanguageAddAfter'))
		{
			$res &= $this->createAdminController('AdminAddLayerImage', 'WTLayerMedia');
			$res &= $this->createAdminController('AdminAddThumbnailImage', 'WTThumnbnailMedia');
			$res &= $this->createAdminController('AdminAddVideo', 'WTVideoMedia');
			$res &= $this->createAdminController('AdminAddImage', 'WTImageSlide');
			/* Creates tables */
			include(dirname(__FILE__).'/sql/install.php');
			$sample_data = new SampleDataSlider();
			$sample_data->initData();
			return (bool)$res;
		}
		return false;
	}
	public function createAdminController($classname, $tabname)
	{
		$tab = new Tab();
		$tab->active = 1;
		$tab->class_name = $classname;
		$tab->name = array();
		foreach (Language::getLanguages(true) as $lang)
			$tab->name[$lang['id_lang']] = $tabname;
		$tab->id_parent = -1;
		$tab->module = $this->name;
		return (bool)$tab->add();
	}
	public function uninstall()
	{
		include(dirname(__FILE__).'/sql/uninstall.php');
		return parent::uninstall();
	}

	public function getContent()
	{
		$this->context->controller->addCss($this->_path.'views/css/admin/wtadmin.css', 'all');
		$this->html .= $this->headerHTML();
		/* Validate & process */
		if (Tools::isSubmit('submitSlide') || Tools::isSubmit('delete_id_slide') || Tools::isSubmit('changeStatus'))
		{
			if ($this->postValidation())
				$this->postProcess();
			else
				$this->html .= $this->renderAddForm();

			$this->clearCache();
		}
		if (Tools::isSubmit('submitSliderConfig'))
		{
			$this->postProcess();
			$this->html .= $this->renderList();
			$this->html .= $this->renderForm();
			$this->clearCache();
		}
		elseif (Tools::isSubmit('submitCaption') || Tools::isSubmit('addlayer'))
		{
				$this->postProcess();
				$this->html .= $this->renderAddCaption();
		}
		elseif (Tools::isSubmit('addSlide') || (Tools::isSubmit('id_slide') && $this->slideExists((int)Tools::getValue('id_slide'))))
			$this->html .= $this->renderAddForm();
		else
		{
			$this->html .= $this->renderList();
			$this->html .= $this->renderForm();
		}

		return $this->html;
	}

	private function postValidation()
	{
		$errors = array();
		/* Validation for Slider configuration */
		if (Tools::isSubmit('submitSlider'))
		{
			if (!Validate::isInt(Tools::getValue('wtslideshow_SPEED')) || !Validate::isInt(Tools::getValue('wtslideshow_PAUSE')) ||
				!Validate::isInt(Tools::getValue('wtslideshow_WIDTH')))
				$errors[] = $this->l('Invalid values');
		} /* Validation for status */
		elseif (Tools::isSubmit('changeStatus'))
		{
			if (!Validate::isInt(Tools::getValue('id_slide')))
				$errors[] = $this->l('Invalid slide');
		}
		/* Validation for Slide */
		elseif (Tools::isSubmit('submitSlide'))
		{
			/* Checks state (active) */
			if (!Validate::isInt(Tools::getValue('active_slide')) || (Tools::getValue('active_slide') != 0 && Tools::getValue('active_slide') != 1))
				$errors[] = $this->l('Invalid slide state.');
			/* Checks position */
			if (!Validate::isInt(Tools::getValue('position')) || (Tools::getValue('position') < 0))
				$errors[] = $this->l('Invalid slide position.');
			/* If edit : checks id_slide */
			if (Tools::isSubmit('id_slide'))
			{
				if (!Validate::isInt(Tools::getValue('id_slide')) && !$this->slideExists(Tools::getValue('id_slide')))
					$errors[] = $this->l('Invalid id_slide');
			}
			/* Checks title/url/legend/description/image */
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				if (Tools::strlen(Tools::getValue('title_'.$language['id_lang'])) > 255)
					$errors[] = $this->l('The title is too long.');
				if (Tools::strlen(Tools::getValue('legend_'.$language['id_lang'])) > 255)
					$errors[] = $this->l('The caption is too long.');
				if (Tools::strlen(Tools::getValue('url_'.$language['id_lang'])) > 255)
					$errors[] = $this->l('The URL is too long.');
				if (Tools::strlen(Tools::getValue('url_'.$language['id_lang'])) > 0 && !Validate::isUrl(Tools::getValue('url_'.$language['id_lang'])))
					$errors[] = $this->l('The URL format is not correct.');
				if (Tools::getValue('image_'.$language['id_lang']) != null && !Validate::isFileName(Tools::getValue('image_'.$language['id_lang'])))
					$errors[] = $this->l('Invalid filename.');
				if (Tools::getValue('image_old_'.$language['id_lang']) != null && !Validate::isFileName(Tools::getValue('image_old_'.$language['id_lang'])))
					$errors[] = $this->l('Invalid filename.');
			}

			/* Checks title/url/legend/description for default lang */
			$id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
			if (Tools::strlen(Tools::getValue('title_'.$id_lang_default)) == 0)
				$errors[] = $this->l('The title is not set.');
			if (Tools::strlen(Tools::getValue('url_'.$id_lang_default)) == 0)
				$errors[] = $this->l('The URL is not set.');
		}
		elseif (Tools::isSubmit('delete_id_slide') && (!Validate::isInt(Tools::getValue('delete_id_slide')) || !$this->slideExists((int)Tools::getValue('delete_id_slide'))))
			$errors[] = $this->l('Invalid id_slide');

		/* Display errors if needed */
		if (count($errors))
		{
			$this->html .= $this->displayError(implode('<br />', $errors));
			return false;
		}
		/* Returns if validation is ok */
		return true;
	}

	private function postProcess()
	{
		$errors = array();

		/* Processes Slider Options*/
		if (Tools::isSubmit('submitSliderConfig'))
		{
			$this->clearCache();
			$options = '';
			$option_arr = array();
			$id_wtslideshow_op = (int)Tools::getValue('id_wtslideshow_op', 1);
			$slider_op = new WtSlideshowOption($id_wtslideshow_op);
			$option_arr = $slider_op->getOptions();
			$options = Tools::jsonEncode($option_arr);
			$slider_op->options = $options;
			$res = $slider_op->update();
			if (!$res)
				$errors[] = $this->displayError($this->l('The configuration could not be updated.'));
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=6&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		} /* Process Slide status */
		elseif (Tools::isSubmit('changeStatus') && Tools::isSubmit('id_slide'))
		{
			$slide = new WtSlideshowClass((int)Tools::getValue('id_slide'));
			if ($slide->active == 0)
				$slide->active = 1;
			else
				$slide->active = 0;
			$res = $slide->update();
			$this->clearCache();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=6&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		}
		/* Processes Slide */
		elseif (Tools::isSubmit('submitSlide'))
		{
			/* Sets ID if needed */
			if (Tools::getValue('id_slide'))
			{
				$slide = new WtSlideshowClass((int)Tools::getValue('id_slide'));
				if (!Validate::isLoadedObject($slide))
				{
					$this->html .= $this->displayError($this->l('Invalid id_slide'));
					return false;
				}
			}
			else
				$slide = new WtSlideshowClass();
			$slide->position = (int)Tools::getValue('position');
			$slide->active = (int)Tools::getValue('active_slide');
			$slide->slidedelay = Tools::getValue('slidedelay');
			$transition2d_arr = Tools::getValue('transition2d');
			$slide->transition2d = Tools::jsonEncode($transition2d_arr);
			$transition3d_arr = Tools::getValue('transition3d');
			$slide->transition3d = Tools::jsonEncode($transition3d_arr);
			$slide->timeshift = Tools::getValue('timeshift');

			/* Sets each langue fields */
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				$img_up = Tools::getValue('image_'.$language['id_lang']);
				if (isset($img_up) && $img_up != '')
					$img_default = $img_up;
			}
			foreach ($languages as $language)
			{
				$slide->title[$language['id_lang']] = Tools::getValue('title_'.$language['id_lang']);
				$slide->url[$language['id_lang']] = Tools::getValue('url_'.$language['id_lang']);
				$slide->thumbnail[$language['id_lang']] = Tools::getValue('thumbnail_'.$language['id_lang']);
				/* Check image */
				$img_upload = Tools::getValue('image_'.$language['id_lang']);
				if (isset($img_upload) && $img_upload != '')
					$slide->image[$language['id_lang']] = $img_upload;
				else
				{
					if (!Tools::getValue('id_slide'))
						$slide->image[$language['id_lang']] = $img_default;
				}
			}

			/* Processes if no errors  */
			if (!$errors)
			{
				/* Adds */
				if (!Tools::getValue('id_slide'))
				{
					if (!$slide->add())
						$errors[] = $this->displayError($this->l('The slide could not be added.'));
				}
				elseif (!$slide->update())
					$errors[] = $this->displayError($this->l('The slide could not be updated.'));
				$this->clearCache();
			}
			return $errors;
		} /* Deletes */
		elseif (Tools::isSubmit('delete_id_slide'))
		{
			$slide = new WtSlideshowClass((int)Tools::getValue('delete_id_slide'));
			$res = $slide->delete();
			$this->clearCache();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		}

		/* Display errors if needed */
		if (count($errors))
			$this->html .= $this->displayError(implode('<br />', $errors));
	}


	public function transitionHandling($t_str)
	{
		$t_arr = array();
		$t_str_hand = '';
		$t_arr = Tools::jsonDecode($t_str, true);
		if (is_array($t_arr) && count($t_arr) >= 1)
		{
			foreach ($t_arr as $key => $value)
			{
				if ($key < (count($t_arr) - 1))
					$t_str_hand .= $value.',';
				else
					$t_str_hand .= $value;
			}
		}
		return $t_str_hand;
	}
	public function hookdisplayHeader()
	{
		if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'index')
			return;
		$this->context->controller->addCSS($this->_path.'views/css/layerslider.css');
		$this->context->controller->addCSS($this->_path.'views/css/dynamic-captions.css');
		$this->context->controller->addJS($this->_path.'views/js/greensock.js');
		$this->context->controller->addJS($this->_path.'views/js/layerslider.transitions.js');
		$this->context->controller->addJS($this->_path.'views/js/layerslider.kreaturamedia.jquery.js');
	}

	public function getWidgetVariables($hookName = null, array $configuration = [])
    {
		
				$slier_option_arr = array();
				$slier_op = new WtSlideshowOption();
				$slier_options = $slier_op->getSliderOptions(1);
				if ($slier_options)
				{
					$slier_option_str = $slier_options[0]['options'];
					$slier_option_arr = Tools::jsonDecode($slier_option_str, true);
				}
				
				$caption_obj = new CaptionClass();
			$slide_list = array();
			$slides = $this->getSlides(true);
			if (!$slides)
			return false;
		
		foreach ($slides as $key => $slide)
		{
			$id_slide = $slide['id_wtslideshow'];
			$captions = $caption_obj->getCaptions($id_slide);
			$caption_list = array();
			foreach ($captions as $key => $caption)
			{
				$caption['params'] = Tools::jsonDecode($caption['params'], true);
				$caption['paramstr'] = $caption_obj->strParams($caption['params']);
				$captiontext = $caption_obj->getLayerText($caption['id_caption']);
				foreach ($captiontext as $ct)
				{
					$id_lang = $ct['id_lang'];
					$caption['captext'][$id_lang] = $ct['captext'];
					$caption['capimage'][$id_lang] = $ct['capimage'];
					$caption['capvideo'][$id_lang] = $ct['capvideo'];
					$caption['link'][$id_lang] = $ct['link'];
				}
				$caption_list[] = $caption;
			}
			$slide['caption'] = $caption_list;
			$slide['transition2d'] = $this->transitionHandling($slide['transition2d']);
			$slide['transition3d'] = $this->transitionHandling($slide['transition3d']);
			$slide_list[] = $slide;
		}
		
				 return [
            'slier_option_arr' => $slier_option_arr,
			'wtslideshow_slides' => $slide_list,
			'wtslideshow_path' => $this->_path
			];
		
				
				
		
	}
	
	public function renderWidget($hookName = null, array $configuration = [])
    {
		if ($this->context->controller->php_self == 'index')
		{
			
		
			$this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

			return $this->fetch('module:'.$this->name.'/views/templates/hook/'.$this->name.'.tpl');
		}
        
    }

	public function clearCache()
	{
		$this->_clearCache('wtslideshow.tpl');
	}

	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtslideshow_shop (id_wtslideshow, id_shop, position, slidedelay, transition2d, transition3d, timeshift, active)
			SELECT id_wtslideshow, '.(int)$params['new_id_shop'].', position, slidedelay, transition2d, transition3d, timeshift, active
			FROM '._DB_PREFIX_.'wtslideshow_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtslideshow_lang (id_wtslideshow, id_lang, id_shop, title, url, image, thumbnail) 
			SELECT id_wtslideshow, id_lang, '.(int)$params['new_id_shop'].', title, url, image, thumbnail
			FROM '._DB_PREFIX_.'wtslideshow_lang
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtslideshow_caption_shop (`id_caption`, `id_wtslideshow`, `id_shop`, `type`, `order`, `params`) 
			SELECT `id_caption`, `id_wtslideshow`, '.(int)$params['new_id_shop'].', `type`, `order`, `params`
			FROM '._DB_PREFIX_.'wtslideshow_caption_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtslideshow_caption_lang (id_caption, id_shop, id_lang, captext, capimage, capvideo, link)
			SELECT id_caption, '.(int)$params['new_id_shop'].', id_lang, captext, capimage, capvideo, link
			FROM '._DB_PREFIX_.'wtslideshow_caption_lang
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtslideshow_options_shop (id_wtslideshow_op, id_shop, options)
			SELECT id_wtslideshow_op, '.(int)$params['new_id_shop'].', options
			FROM '._DB_PREFIX_.'wtslideshow_options_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		$this->clearCache();
	}
	
	public function hookActionObjectLanguageAddAfter($params)
	{
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtslideshow_lang (id_wtslideshow, id_lang, id_shop, title, url, image, thumbnail)
			SELECT id_wtslideshow, '.(int)$params['object']->id.', id_shop, title, url, image, thumbnail
			FROM '._DB_PREFIX_.'wtslideshow_lang
			WHERE id_lang = '.(int)Configuration::get('PS_LANG_DEFAULT')
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtslideshow_caption_lang (id_caption, id_shop, id_lang, captext, capimage, capvideo, link)
			SELECT id_caption, id_shop, '.(int)$params['object']->id.', captext, capimage, capvideo, link
			FROM '._DB_PREFIX_.'wtslideshow_caption_lang
			WHERE id_lang = '.(int)Configuration::get('PS_LANG_DEFAULT')
		);
		$this->clearCache();
	}
	
	public function headerHTML()
	{
		if (Tools::getValue('controller') != 'AdminModules' && Tools::getValue('configure') != $this->name)
			return;

		$this->context->controller->addJqueryUI('ui.sortable');
		
		$this->context->smarty->assign(
			array(
				'name_module' => $this->name,
				'secure_key' => $this->secure_key,
				'base_uri' => $this->context->shop->physical_uri.$this->context->shop->virtual_uri
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/header_admin.tpl');
	}

	public function getSlides($active = null)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT cs.*,cl.*
			FROM '._DB_PREFIX_.'wtslideshow_shop cs
			LEFT JOIN '._DB_PREFIX_.'wtslideshow_lang cl ON (cs.id_wtslideshow = cl.id_wtslideshow AND cs.id_shop = cl.id_shop)
			WHERE cl.id_shop = '.$id_shop.' AND cl.id_lang = '.$id_lang.
			($active ? ' AND cs.`active` = 1' : ' ').'
			ORDER BY cs.position'
		);
	}

	public function displayStatus($id_slide, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		$html = '<a class="btn '.$class.'" href="'.AdminController::$currentIndex.
			'&configure='.$this->name.'
				&token='.Tools::getAdminTokenLite('AdminModules').'
				&changeStatus&id_slide='.(int)$id_slide.'" title="'.$title.'"><i class="'.$icon.'"></i> '.$title.'</a>';

		return $html;
	}

	public function slideExists($id_slide)
	{
		$req = 'SELECT cs.`id_wtslideshow` as id_slide
				FROM `'._DB_PREFIX_.'wtslideshow` cs
				WHERE cs.`id_wtslideshow` = '.(int)$id_slide;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);

		return ($row);
	}

	public function renderList()
	{
		$slides = $this->getSlides();
		foreach ($slides as $key => $slide)
			$slides[$key]['status'] = $this->displayStatus($slide['id_wtslideshow'], $slide['active']);

		$this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'slides' => $slides,
				'image_baseurl' => $this->_path.'views/img/sliderimages/'
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/list.tpl');
	}

	public function renderAddForm()
	{
		$this->context->controller->addCSS($this->_path.'views/css/layerslider.css');
		$this->context->controller->addJS($this->_path.'views/js/greensock.js');
		$this->context->controller->addJS($this->_path.'views/js/layerslider.transitions.js');
		$this->context->controller->addJS($this->_path.'views/js/layerslider.kreaturamedia.jquery.js');
		$this->context->controller->addJs($this->_path.'views/js/admin/wtadmin.js');
		$this->context->controller->addJs($this->_path.'views/js/admin/layerslider.transitions.js');
		$this->context->controller->addJQueryPlugin('fancybox');
		
		if (Tools::getValue('id_slide'))
			$class_button = '';
		else
			$class_button = 'layer-disable';
		
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Slide informations'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'file_lang',
						'label' => $this->l('Image Slider'),
						'name' => 'image',
						'lang' => true
					),
					array(
						'type' => 'text',
						'label' => $this->l('Title'),
						'name' => 'title',
						'lang' => true,
					),
					array(
						'type' => 'text',
						'label' => $this->l('URL'),
						'name' => 'url',
						'lang' => true,
					),
					array(
						'type' => 'text',
						'label' => $this->l('Slide delay'),
						'desc' => $this->l('The total duration in milliseconds while slides are being displayed'),
						'name' => 'slidedelay'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Timeshift'),
						'name' => 'timeshift',
						'desc' => $this->l('Advance or postpone layer timings relative to slide transitions.')
					),
					array(
						'type' => 'select',
						'label' => $this->l('Transition2d'),
						'multiple' =>true,
						'name' => 'transition2d[]',
						'id' => 'transition2d',
						'class' => 'cs-fixed-width-xxl',
						'options' => array(
							'query' => $this->optransition2d,
							'id' => 'key',
							'name' => 'name'
						)
					),
					array(
						'type' => 'select',
						'label' => $this->l('Transition3d'),
						'multiple' =>true,
						'name' => 'transition3d[]',
						'id' => 'transition3d',
						'class' => 'cs-fixed-width-xxl',
						'options' => array(
							'query' => $this->optransition3d,
							'id' => 'key',
							'name' => 'name'
						)
					),
					array(
						'type' => 'thumb_lang',
						'label' => $this->l('Thumbnail'),
						'name' => 'thumbnail',
						'lang' => true,
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Active'),
						'name' => 'active_slide',
						'is_bool' => true,
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
				),
				'submit' => array(
					'title' => $this->l('Save'),
				),
				'buttons' => array(
					array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
					'title' => $this->l('Back to list'),
					'icon' => 'process-icon-back'
					),
					array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_slide='.(int)Tools::getValue('id_slide').'&addlayer=1',
					'title' => $this->l('Add Layers'),
					'icon' => 'process-icon-new',
					'class' => 'pull-right '.$class_button
					)
				)
			),
		);

		if (Tools::isSubmit('id_slide') && $this->slideExists((int)Tools::getValue('id_slide')))
		{
			$slide = new WtSlideshowClass((int)Tools::getValue('id_slide'));
			$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_slide');
			$fields_form['form']['images'] = $slide->image;
			$fields_form['form']['thumbnail'] = $slide->thumbnail;
		}

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitSlide';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
			'fields_value' => $this->getAddFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
			'image_baseurl' => $this->_path.'views/img/',
			'module_dir_url' => $this->_path,
			'link_controler_add_thumb_image' => $this->context->link->getAdminLink('AdminAddThumbnailImage'),
			'link_controler_add_image' => $this->context->link->getAdminLink('AdminAddImage')
		);
		$helper->override_folder = '/';

		return $helper->generateForm(array($fields_form));
	}
	public function renderAddCaption()
	{
		$this->context->controller->addCss($this->_path.'views/css/admin/caption.css', 'all');
		$this->context->controller->addCss($this->_path.'views/css/dynamic-captions.css', 'all');
		$this->context->controller->addJqueryUI('ui.draggable');
		$this->context->controller->addJqueryUI('ui.droppable');
		$this->context->controller->addJs($this->_path.'views/js/caption.js');
		$this->context->controller->addJs($this->_path.'views/js/caption_lib.js');
		$this->context->controller->addJs($this->_path.'views/js/htmlspecialchars_decode.js');
		$this->context->controller->addJQueryPlugin('fancybox');
		$this->context->controller->addJs($this->_path.'views/js/admin/heartcode-canvasloader-min-0.9.1.js');
		$languages = $this->context->controller->getLanguages();
		$layer_style = Tools::file_get_contents(dirname(__FILE__).'/option/option_layer_style.html');
		$layer_easing = Tools::file_get_contents(dirname(__FILE__).'/option/option_layer_easing.html');
		$id_shop = (int)$this->context->shop->id;
		$lang_id_arr = array();
		foreach ($languages as $lang)
			$lang_id_arr[] = $lang['id_lang'];
		$id_slide = Tools::getValue('id_slide');
		$caption_obj = new CaptionClass();
		$captions = $caption_obj->getCaptions($id_slide);
		$max_order_arr = $caption_obj->getOrderMax($id_slide);
		if (isset($max_order_arr) && count($max_order_arr) > 0)
			$max_order = (int)$max_order_arr['maxorder'] + 300;
		else
			$max_order = 500;
		$oders_str = $caption_obj->getOrders($id_slide);
		$caption_list = array();
		$caption_list1 = array();
		$slide_obj = new WtSlideshowClass();
		$slide_arr = $slide_obj->getSlideById($id_slide);
		$slide = $slide_arr[0];
		foreach ($captions as $key => $caption)
		{
			$caption['params'] = Tools::jsonDecode($caption['params'], true);
			$captiontext = $caption_obj->getLayerText($caption['id_caption']);
			foreach ($captiontext as $ct)
			{
				$id_lang = $ct['id_lang'];
				$caption['captext'][$id_lang] = $ct['captext'];
				$caption['capimage'][$id_lang] = $ct['capimage'];
				$caption['capvideo'][$id_lang] = $ct['capvideo'];
				$caption['link'][$id_lang] = $ct['link'];
			}
			$caption_list[] = $caption;
		}
		
		foreach ($captions as $key => $caption1)
		{
			$caption1['params'] = Tools::jsonDecode($caption1['params'], true);
			$captiontext = $caption_obj->getLayerText($caption1['id_caption']);
			foreach ($captiontext as $ct)
			{
				$id_lang = $ct['id_lang'];
				$caption1['captext'][$id_lang] = htmlspecialchars($ct['captext'], ENT_COMPAT);
				$caption1['capimage'][$id_lang] = $ct['capimage'];
				$caption1['capvideo'][$id_lang] = $ct['capvideo'];
				$caption1['link'][$id_lang] = $ct['link'];
			}
			$caption_list1[] = $caption1;
		}
		
		$layers = Tools::jsonEncode($caption_list1);
		$layers = str_replace('\n', '', $layers);
		$layers = str_replace('\t', '', $layers);
		$lang_id_str = Tools::jsonEncode($lang_id_arr);
		$slier_option_arr = array();
		$slier_op = new WtSlideshowOption();
		$slier_options = $slier_op->getSliderOptions(1);
		if ($slier_options)
		{
			$slier_option_str = $slier_options[0]['options'];
			$slier_option_arr = Tools::jsonDecode($slier_option_str, true);
		}
		$layer_default = $caption_obj->setLayerDefault($id_slide, $id_shop, $max_order);
		$this->context->smarty->assign(
			array(
				'id_slide' => $id_slide,
				'slide' => $slide,
				'captions' => $caption_list,
				'layers' => $layers,
				'oders_str' => $oders_str,
				'lang_id_str' => $lang_id_str,
				'layer_default' => $layer_default,
				'image_baseurl' => $this->_path.'views/img/sliderimages/',
				'image_layerurl' => $this->_path.'views/img/layers/',
				'languages' => $languages,
				'id_language' => $this->context->language->id,
				'token' => Tools::getAdminTokenLite('AdminModules'),
				'cs_ajax_link' => $this->_path.'ajax_wtslideshow.php',
				'slier_option_arr' => $slier_option_arr,
				'layer_style' => $layer_style,
				'layer_easing' => $layer_easing,
				'link_controler_add_layer_image' => $this->context->link->getAdminLink('AdminAddLayerImage'),
				'link_controler_add_layer_video' => $this->context->link->getAdminLink('AdminAddVideo')
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/caption.tpl');
	}

	public function renderForm()
	{
		$this->context->controller->addCss($this->_path.'views/css/admin/wtadmin.css', 'all');
		$slier_op = new WtSlideshowOption();
		$slier_options = $slier_op->getSliderOptions(1);
		if ($slier_options)
			$slier_option_str = $slier_options[0]['options'];
		else
			$slier_option_str = '';
		$slier_option = Tools::jsonDecode($slier_option_str, 1);
		$this->context->smarty->assign(
			array('slier_option' => $slier_option)
		);
		return $this->display(__FILE__, 'views/templates/admin/slider_option.tpl');
	}

	public function getAddFieldsValues()
	{
		$fields = array();
		$languages = Language::getLanguages(false);
		if (Tools::isSubmit('id_slide') && $this->slideExists((int)Tools::getValue('id_slide')))
		{
			$slide = new WtSlideshowClass((int)Tools::getValue('id_slide'));
			$transition2d_arr = Tools::jsonDecode($slide->transition2d);
			$transition3d_arr = Tools::jsonDecode($slide->transition3d);
			$fields['id_slide'] = (int)Tools::getValue('id_slide', $slide->id);
			$fields['active_slide'] = Tools::getValue('active_slide', $slide->active);
			$fields['slidedelay'] = Tools::getValue('slidedelay', $slide->slidedelay);
			$fields['transition2d[]'] = Tools::getValue('transition2d', $transition2d_arr);
			$fields['transition3d[]'] = Tools::getValue('transition3d', $transition3d_arr);
			$fields['timeshift'] = Tools::getValue('timeshift', $slide->timeshift);
			foreach ($languages as $lang)
			{
				$fields['image'][$lang['id_lang']] = Tools::getValue('image_'.(int)$lang['id_lang'], $slide->image[$lang['id_lang']]);
				$fields['title'][$lang['id_lang']] = Tools::getValue('title_'.(int)$lang['id_lang'], $slide->title[$lang['id_lang']]);
				$fields['url'][$lang['id_lang']] = Tools::getValue('url_'.(int)$lang['id_lang'], $slide->url[$lang['id_lang']]);
			}
		}
		else
		{
			$slide = new WtSlideshowClass();
			$fields['active_slide'] = Tools::getValue('active_slide', 1);
			$fields['slidedelay'] = Tools::getValue('slidedelay', 4000);
			$fields['transition2d[]'] = Tools::getValue('transition2d', '["1"]');
			$fields['transition3d[]'] = Tools::getValue('transition3d', '["0"]');
			$fields['timeshift'] = Tools::getValue('timeshift', 0);
			foreach ($languages as $lang)
			{
				$fields['image'][$lang['id_lang']] = Tools::getValue('image_'.(int)$lang['id_lang'], '');
				$fields['title'][$lang['id_lang']] = Tools::getValue('title_'.(int)$lang['id_lang'], 'Slider title');
				$fields['url'][$lang['id_lang']] = Tools::getValue('url_'.(int)$lang['id_lang'], '#');
			}
		}
		return $fields;
	}
	public function saveCaptions($layer_obj)
	{
		$errors = array();
		if (is_array($layer_obj))
		{
			foreach ($layer_obj as $layer)
			{
				if (isset($layer['id_caption']))
					$caption = new CaptionClass($layer['id_caption']);
				else
					$caption = new CaptionClass();
				$caption->id_wtslideshow = $layer['id_wtslideshow'];
				$caption->type = $layer['type'];
				$caption->order = $layer['params']['delayin'];
				$caption->captext = $layer['captext'];
				$caption->capimage = $layer['capimage'];
				$caption->capvideo = $layer['capvideo'];
				$caption->link = $layer['link'];
				$caption->params = Tools::jsonEncode($layer['params']);
				if (isset($layer['id_caption']))
					if (!$caption->update())
						$errors[] = $this->displayError($this->l('The Caption could not be update.'));
					else
						echo 'ok';
				else
					if (!$caption->add())
						$errors[] = $this->displayError($this->l('The Caption could not be Add new.'));
					else
						echo 'ok';
			}
			die();
		}
	}
	public function deleteCaptions($id_caption_del)
	{
		$caption = new CaptionClass($id_caption_del);
		if (!$caption->delete())
			echo $this->l('The Caption could not be delete.');
		else
			echo $id_caption_del;
		die;
	}
	public function deleteAllCaptions($id_slide)
	{
		$caption = new CaptionClass($id_slide);
		if (!$caption->alldelete($id_slide))
			echo $this->l('The Caption could not be delete.');
		else
			echo $id_slide;
		die;
	}
	public function deleteImage($img_del, $folder)
	{
		$result = true;
		if (strpos($img_del, 'thumbnail') !== false)
		{
			$img_root = str_replace('thumbnail_', '', $img_del);
			$img_root = trim($img_root);
			$result &= unlink(_PS_MODULE_DIR_.'wtslideshow/views/img/'.$folder.'/'.$img_root);
		}
		$result &= unlink(_PS_MODULE_DIR_.'wtslideshow/views/img/'.$folder.'/'.$img_del);
		if ($result)
			die('1');
		else
			die('0');
	}
}