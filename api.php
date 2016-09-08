<?php

/**
 * ajax "API-style" file to return server-side data
 *
 * PHP version 5.6
 *
 * @author  Kyree S. Williams <me@kyreeswilliams.com>
 */

/**
 * gather post values and dump them into a PHP-formatted array
 */
$postData = array();
$sendData = array();
foreach ($_POST as $key => $variable){
	$postData[$key] = $variable;
}

/**
 * if function getNumbers is called
 */
if($postData[$key] == "getNumbers"){
	require_once("structure/NumberGenerator.php");
	$generator = new NumberGenerator;
	$sendData = $generator->generateNumbers(1, 100);
}
/**
 * if no function is called
 */
else{
	$sendData["errors"] = array("The call was invalid or not specified");
}

/**
 * return data to AJAX call
 */
echo json_encode($sendData);

?>