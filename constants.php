<?php
	
	
	if(defined('LOCALHOST') && LOCALHOST == True){
		define("ROOT_PATH", "/".basename(dirname(__FILE__))."/");
	}else{
		define("ROOT_PATH", "/");
	}

	/*
		Root url for webpage
	*/
	define("ROOT_URL", $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].ROOT_PATH);

	define("MAIN_PAGE", ROOT_URL);

	define('ADMIN_GUI', true);
	

	define('USER_SIGN_OUT', ROOT_PATH.'user/signout');
	define('USER_SIGN_IN', ROOT_PATH.'user/signin');
	define('USER_SIGN_UP', ROOT_PATH.'user/signup');
	define('USER_AJAX', ROOT_PATH.'user/ajax');
	define('HOME_AJAX', ROOT_PATH.'home/ajax');
	define('HOMEINDEX', ROOT_PATH.'home/index');
