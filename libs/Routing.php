<?php

class Routing 
{
  public function __construct() 
  {
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = str_replace('-', "", $url);
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    if (empty($url[0])) {
      require 'controller/HomeController.php';
      $controller = new Home();
      $controller->index();
      return false;
    } 
    
    $url[0] = ucfirst($url[0]);

    $file = 'controller/'.$url[0].'Controller.php';

    if (file_exists($file)) {
      require $file;
    } else {
      $msg_text = "Такої сторінки не існує";
      $error = new Error();
      $error->message($msg_text);
      return false;
    }

    $controller = new $url[0];

    if (isset($url[2])) {
      if (method_exists($url[0], $url[1])) {
          $controller->$url[1]($url[2]);
        } else{
          $msg_text = "Такої сторінки не існує";
          $error = new Error();
          $error->message($msg_text);
          return false;
        }
    } elseif (isset($url[1])) {
        if (method_exists($url[0], $url[1])) {
          $controller->$url[1]();
        } else{
          $msg_text = "Такої сторінки не існує";
          $error = new Error();
          $error->message($msg_text);
          return false;
        }
    } else{
        $msg_text = "Такої сторінки не існує";
        $error = new Error();
        $error->message($msg_text);
        return false;
    }
  }
}
