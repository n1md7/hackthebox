<?php

session_start();

require('config.php');
require('constants.php');

error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

foreach (['functions', 'Messages', 'Bootstrap', 'Controller', 'Model'] as $file) 
	require("classes/$file.php");

foreach (['user', 'home'] as $file):
	require("controllers/$file.php");
	require("models/$file.php");	
endforeach;

$controller = (new Bootstrap($_GET))->createController();
if($controller)
	$controller->executeAction();
