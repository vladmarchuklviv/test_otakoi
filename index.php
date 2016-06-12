<?php

	if (session_id() == "") session_start();
	require_once 'config.php';
	require_once 'libs/functions.php';
	require_once 'controller/AppController.php';
	require_once 'controller/ErrorController.php';
	require_once 'libs/View.php';
	require_once 'libs/Routing.php';
	require_once 'model/Post.php';
	require_once 'model/User.php';
	
	$rout = new Routing();
?>

</html>

