<?php 
class UserManager extends DbManager {

    public function getUserByName($name) {
        $query = $this->bdd->prepare('SELECT * FROM user WHERE name = :name');
        $query->bindParam(':name', $name); 
        $query->execute(); 
        $user = $query->fetch();
        return $user;

    }

    public function hashPassword($password) {
        $query = $this->bdd->query('SELECT * FROM user');
        $users = $query->fetchAll();
        foreach ($users as $user) {
            $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);
            $updateStmt = $this->bdd->prepare('UPDATE user SET password = :hashedPassword WHERE id = :id');
            $updateStmt->bindParam(':hashedPassword', $hashedPassword); 
            $updateStmt->bindParam(':id', $user['id']);
            $updateStmt->execute(); 
        }
    }
    
   
    
}


?>