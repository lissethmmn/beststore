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

class AdminAddVideoController extends ModuleAdminController
{
	public function __construct()
	{
		$this->bootstrap = true;
		parent::__construct();
	}	
	public function setMedia()
	{
		parent::setMedia();
		$this->addJS(_MODULE_DIR_.'wtslideshow/views/js/admin/uploadvideo.js');
		$this->addCSS(_MODULE_DIR_.'wtslideshow/views/css/admin/layermedia.css');
	}
	public function postProcess()
	{
		$errors = array();
		if (!$this->redirect_after)
			parent::postProcess();
		if (Tools::isSubmit('submitUploadImage'))
		{
			$type = Tools::strtolower(Tools::substr(strrchr($_FILES['upload_image']['name'], '.'), 1));
				$imagesize = @getimagesize($_FILES['upload_image']['tmp_name']);
				if (isset($_FILES['upload_image']) && isset($_FILES['upload_image']['tmp_name']) && !empty($_FILES['upload_image']['tmp_name']) && !empty($imagesize) && in_array(
						Tools::strtolower(Tools::substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg','gif','jpeg','png')
					) && in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
				{
					$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
					$salt = sha1(microtime());
					if ($error = ImageManager::validateUpload($_FILES['upload_image']))
						$errors[] = $error;
					elseif (!$temp_name || !move_uploaded_file($_FILES['upload_image']['tmp_name'], $temp_name))
						return false;
					elseif (!ImageManager::resize($temp_name, _PS_MODULE_DIR_.'wtslideshow/views/img/sliderimages/'.$salt.'_'.$_FILES['upload_image']['name'], null, null, $type))
						$errors[] = Tools::displayError($this->l('An error occurred during the image upload process.'));
					elseif (!ImageManager::resize($temp_name, _PS_MODULE_DIR_.'wtslideshow/views/img/sliderimages/medium_'.$salt.'_'.$_FILES['upload_image']['name'], 300, 300, $type))
						$errors[] = Tools::displayError($this->l('An error occurred during the image upload process.'));
					elseif (!ImageManager::resize($temp_name, _PS_MODULE_DIR_.'wtslideshow/views/img/sliderimages/thumbnail_'.$salt.'_'.$_FILES['upload_image']['name'], 150, 150, $type))
						$errors[] = Tools::displayError($this->l('An error occurred during the image upload process.'));
					if (isset($temp_name))
						@unlink($temp_name);
				}
			if (count($errors))
				return $this->displayError(implode('<br />', $errors));
		}
	}
	public function display()
	{
		Tools::safePostVars();
		if ((Configuration::get('PS_CSS_THEME_CACHE') || Configuration::get('PS_JS_THEME_CACHE')) && is_writable(_PS_THEME_DIR_.'cache'))
		{
			// CSS compressor management
			if (Configuration::get('PS_CSS_THEME_CACHE'))
				$this->css_files = Media::cccCSS($this->css_files);
			//JS compressor management
			if (Configuration::get('PS_JS_THEME_CACHE'))
				$this->js_files = Media::cccJs($this->js_files);
		}
		$this->context->smarty->assign('css_files', $this->css_files);
		$this->context->smarty->assign('js_files', array_unique($this->js_files));
		if (Tools::getIsset('id_lang'))
			$id_lang = (int)Tools::getValue('id_lang');
		else
			$id_lang = 0;
		if (Tools::getIsset('id_video'))
			$id_video = Tools::getValue('id_video');
		else
			$id_video = '';
		if (Tools::getIsset('img_url'))
			$img_url = Tools::getValue('img_url');
		else
			$img_url = '';
			
		if (Tools::getIsset('widthv'))
			$widthv = (int)Tools::getValue('widthv');
		else
			$widthv = 0;
		
		if (Tools::getIsset('heightv'))
			$heightv = (int)Tools::getValue('heightv');
		else
			$heightv = 0;
		if (Tools::getIsset('typev'))
			$typev = (int)Tools::getValue('typev');
		else
			$typev = 0;
			
		$action_url = $this->context->link->getAdminLink('AdminAddVideo');
		$list_images = $this->readImages();
		$this->context->smarty->assign(
			array(
			'action_url' => $action_url,
			'list_images' => $list_images,
			'id_lang' => $id_lang,
			'id_video' => $id_video,
			'img_url' => $img_url,
			'widthv' => $widthv,
			'heightv' => $heightv,
			'typev' => $typev,
			'image_path'  => _MODULE_DIR_.'wtslideshow/views/img/sliderimages/',
			'cs_ajax_link' => _PS_BASE_URL_.__PS_BASE_URI__.'modules/wtslideshow/ajax_wtslideshow.php'
		));
		$this->smartyOutputContent(_PS_MODULE_DIR_.'wtslideshow/views/templates/admin/formvideo.tpl');
		return true;
	}
	public function readImages()
	{
		$list_images = array();
		$handle = opendir(_PS_MODULE_DIR_.'wtslideshow/views/img/sliderimages');
		if ($handle)
		{
			while (false !== ($entry = readdir($handle)))
			{
				if ($entry != '.' && $entry != '..')
				{
					if (file_exists(_PS_MODULE_DIR_.'wtslideshow/views/img/sliderimages/'.$entry))
						if (strpos($entry, 'medium_') === false && strpos($entry, 'thumbnail_') === false && strpos($entry, 'index') === false && strpos($entry, 'Thumbs') === false)
							$list_images[] = $entry;
				}
			}
			closedir($handle);	
		}
		return $list_images;
	}
}