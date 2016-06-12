<?php

function redirect(){
	$redirect = PATH;
	header("Location: $redirect");
	exit;
}