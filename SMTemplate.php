<?php

require_once(__DIR__ . '/smarty/libs/Smarty.class.php');
require_once('AutoLoader.php');

class SMTemplate {

	private $smarty;

	function __construct() {
		$this->smarty = new Smarty();
		$this->smarty->setTemplateDir('./views');
        $this->smarty->setCompileDir('./smarty/templates_c');
        $this->smarty->setCacheDir('./smarty/cache');
        $this->smarty->setConfigDir('./smarty/configs');
        date_default_timezone_set('Australia/Sydney');
	}

	function render($template, $data = array()) {
		foreach ($data as $key => $value) {
			$this->smarty->assign($key, $value);
		}
		if (!$this->smarty->templateExists($template . '.tpl')) {
            die('Unable to render ' . $template . '.tpl');
        }
		$this->smarty->display($template . '.tpl');
	}

}