<?php

class View 
{
	public function render($name, $data, $noInclude = false) 
	{
		if($noInclude == true) {
		    require 'view/'.$name.'.php';
		   } else {
		    require 'view/inc/header.php';
		    require 'view/'.$name.'.php';
		    require 'view/inc/footer.php';
		   }
	}
}
