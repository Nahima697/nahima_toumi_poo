<?php
    session_start();
    require 'autoload.php';

    if (!isset($_GET['controller']) && !isset($_GET['action'])) {
        header('Location: index.php?controller=default&action=login');
    }

     if($_GET['controller'] == 'default') {
        $controller = new DefaultController;
        if($_GET['action'] == 'home') {
            $controller->home();
        }

        if($_GET['action'] == 'not-found') {
            $controller->notFound();
        }
      
    }

    if ($_GET['controller'] === 'security') {
        $controller = new SecurityController;  
        if($_GET['action'] === 'login') {
           
            $controller->login();
        }
         
        if ($_GET['action'] === 'logout') {
            $controller->logout();
        }
    
    } 

    if ($_GET['controller'] == 'motos') {
        $controller = new MotoController;
        if($_GET['action'] == 'list') {
            $controller->displayAll();
        }
        if($_GET['action'] == 'detail' && isset($_GET['id'])) {
            $controller->displayOne($_GET['id']);
        }

        if ($_GET['action'] == 'ajout') {
            $controller->ajout();
        }
        
        if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        if ($_GET['action'] == 'type' && isset($_GET['type'])) {
            $controller->displayByType($_GET['type']);
        }
        

}

    