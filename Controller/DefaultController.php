<?php 
class DefaultController  {
    private $motomanager;
    public function __construct() {
    $this->motomanager = new MotoManager;
     
    }
    public function home() {
        
        require('View/home.php');
    }

    public function notFound() {
        header('HTTP/1.0 404 Not Found');
        require('View/errors/404.php');
    }
}