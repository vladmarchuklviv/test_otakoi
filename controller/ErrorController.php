<?php

class Error extends App 
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function message($msg_text)
	{
		$this->view->render('error', $msg_text);
	}
}
