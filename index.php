<?php

/**
 * main index file for the entire FizzBuzz application
 *
 * PHP version 5.6
 *
 * @author  Kyree S. Williams <me@kyreeswilliams.com>
 */

require_once("structure/SmartyTemplate.php");

$tpl = new SmartyTemplate;
$tpl->render("main");


?>
