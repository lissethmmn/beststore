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

class WTComment extends ObjectModel
{
	public $id_wt_blog_comment;
	public $id_wt_blog_post;
	public $id_shop;
	public $active;
	public $author_name;
	public $author_email;
	public $date_add;
	public $title;
	public $content;
	public static $definition = array(
		'table' => 'wt_blog_comment',
		'primary' => 'id_wt_blog_comment',
		'multilang' => true,
		'fields' => array(
			'id_wt_blog_post' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'id_shop' =>		array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'author_name' =>			array('type' => self::TYPE_STRING,'required' => true, 'size' => 100),
			'author_email' =>			array('type' => self::TYPE_STRING,'required' => true, 'size' => 100),
			'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isString'),
			'active'  => array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
			'title' =>			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 200),
			'content' => 	array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
		)
	);
	public	function __construct($wt_blog_comment = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($wt_blog_comment, $id_lang);
	}
	public function getFieldLang($field)
	{
		$id_lang = (int)Context::getContext()->language->id;
		$sql = 'SELECT cml.'.$field.' FROM '._DB_PREFIX_.'wt_blog_comment cm
		LEFT JOIN '._DB_PREFIX_.'wt_blog_comment_lang cml ON (cm.id_wt_blog_comment = cml.id_wt_blog_comment)
		WHERE cm.id_wt_blog_comment = '.$this->id_wt_blog_comment.' AND cml.id_lang = '.$id_lang.'';
		$result = Db::getInstance()->getValue($sql);
		return $result;
	}
	public function isEmail($email)
	{
		return (empty($email) || preg_match('/^[a-z0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z0-9]+[._a-z0-9-]*\.[a-z0-9]+$/ui', $email));
	}
	public function isName($name)
	{
		return preg_match('/^[^<>;=#{}]*$/u', $name);
	}
	public function validateController($using_captcha = 1, $htmlentities = true, $copy_post = false)
	{
		$error = array();
		$au_mail = Tools::getValue('author_email');
		$captcha = Tools::getValue('captcha');
		$cnt = Tools::getValue('content');
		$au_name = Tools::getValue('author_name');
		$tit = Tools::getValue('title');
		if (!$this->isEmail($au_mail))
			$error['author_email'] = 'Invalid e-mail address';	
		elseif (empty($au_mail))
			$error['author_email'] = 'Email address required';
		if (!$this->isName($au_name) || $au_name == null) 
			$error['author_name'] = 'Full name required';
		if (Tools::strlen($au_name) > 100)
			$error['author_name'] = 'Full name is too long (100 chars max)';
		if ($tit == null)
			$error['title'] = 'Title required';
		if ($cnt == null)
			$error['content'] = 'Comment required';
		if (isset($captcha) && $using_captcha == 1)
			if ('123654' != $captcha) 
				$error['captcha'] = 'Captcha invalid';
		if (Tools::strlen($cnt) > 1500)
			$error['content'] = 'Comment is too long (1500 chars max)';
		return $error;
	}
	public function copyFromPost()
	{
		$this->id_wt_blog_post = Tools::getValue('id_wt_blog_post');
		$this->author_name = Tools::getValue('author_name');
		$this->author_email = Tools::getValue('author_email');
		$this->title = Tools::getValue('title');
		$this->content = Tools::getValue('content');
		$this->id_shop = Tools::getValue('id_shop');
		$this->active = Tools::getValue('active');
		$this->captcha = Tools::getValue('captcha');
		$this->cssubmitcomment = Tools::getValue('cssubmitcomment');
	}
	public function getDateCreate()
	{
		return date('Y-m-d H:i:s');
	}
	public function add($autodate = true, $null_values = false)
	{
		$sql = 'INSERT INTO '._DB_PREFIX_.'wt_blog_comment (id_wt_blog_post, id_shop, active, author_name, author_email, date_add) VALUES ('.$this->id_wt_blog_post.','.$this->id_shop.', '.$this->active.', "'.$this->author_name.'","'.$this->author_email.'","'.$this->getDateCreate().'")';
		Db::getInstance()->execute($sql);
		
		$rs = Db::getInstance()->Executes('SELECT * FROM '._DB_PREFIX_.'wt_blog_comment ORDER BY id_wt_blog_comment DESC LIMIT 0,1');
		$row = $rs[0];
		$id_wt_blog_comment = $row['id_wt_blog_comment'];
		$langs = Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'lang');		
		foreach ($langs as $lang)
		{
			$id_lang = $lang['id_lang'];
			$sql = '
				INSERT INTO '._DB_PREFIX_.'wt_blog_comment_lang(id_wt_blog_comment, id_lang, title, content)
				VALUES('.$id_wt_blog_comment.','.$id_lang.', "'.$this->title.'" , "'.pSQL($this->content).'")';
			Db::getInstance()->execute($sql);
		}
		return 1;
	}
}