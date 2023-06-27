<?php 
    class MotoController extends SecurityController{
        private $motomanager;

        public static $types = [
            "Enduro",
            "Sportive",
            "Custom",
            "Roadster",
            ];

            public static $allowedFile = [
                "image/jpeg",
                "image/png",
                "image/gif",
                "image/webp"
                
            ];
    
        public function __construct()
        {
            parent :: __construct();
            $this->motomanager = new MotoManager;
        }
        public function displayAll() {
            $this->isLoggedIn();
            $motomanager = $this->motomanager ; 
            $motos = $motomanager->selectAll();   
            require('View/motos/list.php');
    
        }
    
        public function displayOne($id) {
            $motomanager= $this->motomanager; 
            $moto = $motomanager->selectOne($id);
            if(empty($moto)) {
                header("Location: index.php?controller=default&action=not-found"); 
                exit();
            }
            require('View/motos/detail.php');
        }
        public function displayByType($type) {
            $motomanager = $this->motomanager;
            $motos = $motomanager->getByType($type);
            if (empty($motos)) {
                header("Location: index.php?controller=default&action=not-found"); 
                exit();
            }
            require('View/motos/typeList.php');
        }
            
        public function ajout(){
            $this->isLoggedIn();
            $errors = [];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["model"])){
                    $errors["model"] = 'Veuillez saisir un modele';
                }
                if(strlen($_POST["model"])>250){
                    $errors["model"] = 'Veuillez choisir un modèle';
                }
                if(!in_array($_POST["type"], self::$types)){
                    $errors["type"] = "Veuillez choisir un type de moto disponible";
                }


                if(count($errors) == 0){
                    $moto = new moto(null, $_POST["name"], $_POST["model"], $_POST["type"], null);

                    if($_FILES["image"]["error"] != 4){
                      if(!in_array($_FILES["image"]['type'], self::$allowedFile)){
                          $errors["image"] = "Nous acceptons seulement les JPEG / PNG";
                      }

                      if($_FILES["image"]['error'] != 0){
                          $errors["image"] = "Une erreur s'est produite pendant l'upload";
                      }

                      if($_FILES["image"]["size"] >1000000){
                          $errors["image"] = "L'image est trop lourde elle doit faire moins de 1Mo";
                      }

                      if(count($errors) == 0){
                          $filename = uniqid().explode("/",$_FILES["image"]['type'])[1];
                          move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/'.$filename);
                          $moto->setImage($filename);
                      }
                    }

                    if(count($errors) == 0){
                        $this->motomanager->add($moto);
                        header("Location: index.php?controller=motos&action=list");
                        die();
                    }

                }
        }
        require('View/motos/form-add.php');
    }

        public function delete($id) {
            $this->isLoggedIn();
            $motomanager = $this->motomanager; 
            $moto = $motomanager->selectOne($id);
            $errors = [];
            if (empty($moto)) {
                header("Location: index.php?controller=default&action=not-found"); 
                exit();
            } else {
                    unlink("uploads/".$moto->getImage());
                    $this->motomanager->delete($moto->getId());
                    header("Location: index.php?controller=motos&action=list"); 
                    exit();
                }

        }

    }
?>