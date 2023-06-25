<?php 
class SecurityController {

    private $userManager;
    protected $currentUser;

    public function __construct(){
        $this->userManager = new UserManager();
        $this->currentUser= null;
        if(isset($_SESSION ['user'])) {
            $this->currentUser = unserialize($_SESSION['user']);
        }
    } 
    
    protected function isLoggedIn() {
     if(!$this->currentUser) {
        header("Location: index.php?controller=security&action=login");
        die();
     }
     
    }

    public function login() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['name'])) {
                $errors['name'] = "Veuillez saisir un identifiant";
            }
            if (empty($_POST['password'])) {
                $errors['password'] = "Veuillez saisir votre mot de passe";
            }
           
            if (count($errors) == 0) {
                $user = $this->userManager->getUserByName($_POST['name']);
                // $haspassword = $this->userManager->hashPassword($user['password']);
                if (is_null($user) || !password_verify($_POST['password'], $user['password'])) {
                    $errors['password'] = "identifiant ou mot de passe invalides";
                  
                } else {
                    $this->currentUser = $user;
                    $_SESSION['user'] = serialize($user);
                    header("Location: index.php?controller=default&action=home");
                    die();
                   
                }
            }
        
        }
        require('View/security/login.php');
    }
    
    
 


    public function logout() {
        session_destroy();
        $this->currentUser = null;
        header("Location: index.php?controller=security&action=login");
        die();
    }

    
    }



?>