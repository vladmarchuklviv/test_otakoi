<?php

	if (session_id() == "") session_start();
	$string = "";
	for ($i = 0; $i < 2; $i++){
		$string .= chr(rand(65, 90));
		$string .= chr(rand(48, 57));
		$string .= chr(rand(97, 122));
	}

	$_SESSION['rand_code'] = $string;

	$dir = "fonts/";

	$image = imagecreatetruecolor(220, 60);
	$black = imagecolorallocate($image, 0, 0, 0);
	$color = imagecolorallocate($image, 200, 100, 90);
	$white = imagecolorallocate($image, 255, 255, 255);

	imagefilledrectangle($image,0,0,399,99,$white);
	imagettftext ($image, 30, 0, 10, 40, $color, $dir."cour.ttf", $_SESSION['rand_code']);

	header("Content-type: image/png");
	imagepng($image);
?>