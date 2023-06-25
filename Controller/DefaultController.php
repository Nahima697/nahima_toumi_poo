<?php 
class DefaultController extends SecurityController {
   
  
    public function __construct() {
          parent :: __construct();

    }
  
    public function home() {
     require('View/home.php');
    }

    public function notFound() {
        header('HTTP/1.0 404 Not Found');
        require('View/errors/404.php');
    }
}