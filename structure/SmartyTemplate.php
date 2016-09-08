<?php

/**
 * SmartyTemplate_Class calls Smarty templates and passes data to them
 *
 * PHP version 5.6
 *
 * Example usage:
 * $data = array($name => "Kyree S. Williams");
 * $tpl = new SmartyTemplate();
 * $tpl->render("template", $data);
 *
 * @author	Kyree S. Williams <me@kyreeswilliams.com>
 */

require_once('/../smarty/Smarty.class.php');
	
class SmartyTemplate{

	private $_smarty;
	
	function __construct(){
		$this->_smarty = new Smarty();

		global $smtemplate_config;
		$this->_smarty->template_dir ="templates";
	}

	/**
    * returns a rendered Smarty template
    *
    * @param 	string $template: the sample data
    * @param 	optional array $data: the key => value pairs to be passed to the Smarty teplate
    * @return 	HTML: The rendered Smarty template
    * @access 	public
    */
	function render($template, $data = array()){
		foreach($data as $key => $value){
	        $this->_smarty->assign($key, $value);
	    }
		$this->_smarty->display($template . '.tpl');
	}
}

?>