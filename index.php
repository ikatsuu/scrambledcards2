<?php
	define('WEBROOT', str_replace('index.php', '', $_SERVER['HTTP_HOST']).$_SERVER['REQUEST_URI']);
	define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

	require(ROOT."config/conf.php");
	require(ROOT."core/model.php");
	require(ROOT."core/controller.php");
	require(ROOT."core/session.php");
	require(ROOT."core/debug.php");

	$path = explode("/", WEBROOT);

	define("WEBROOT2", "https://".$path[0]);

	if(!empty($path[1])) {
		$con = $path[1];
	}
	else {
		$con = 'home';
	}

	if(!empty($path[2])) {
		$act = $path[2];
	}
	else {
		$act = 'index';
	}

	if (file_exists(ROOT.'controller/'.$con.'.php')) {
		require(ROOT.'controller/'.$con.'.php');
		$con = new $con();
	}
	
	for($a = 0; $a < 3; $a++) {
		unset($path[$a]);
	}

	if(method_exists($con, $act)) {
		call_user_func_array(array($con, $act), $path);
	}
	else {
		//echo "DEBUG : pas d'action correspondante dans le controlleur<br>";
		echo '404 not found';
		//remplacer par un header vers une page 404;
	}
?>