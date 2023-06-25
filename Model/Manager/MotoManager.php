<?php

class MotoManager extends DbManager {

 public function __construct()
 {
    parent ::__construct ();
 }

 public function selectAll() 
 {
    $motos= [];
    $query =$this->bdd->prepare('SELECT * FROM moto');
    $query ->execute();
    $results = $query->fetchAll();

    foreach ($results as $result) {
        $motos[] = new Moto ($result['id'],$result['name'],$result['model'],$result['type'], $result['image']);
        
    }
    return $motos;
 }

 public function selectOne($id) 
 {
   
    $query =$this->bdd->prepare('SELECT * FROM moto WHERE id = :id');
    $query ->bindParam(':id', $id);
    $query ->execute();
    $result = $query->fetch();
    $moto = null;
    if($result) {
        $moto = new Moto ($result['id'], $result['name'], $result['model'],$result['type'], $result['image']);
    }
   return $moto;
    
 }

 public function getByType ($type) {

    $motos= [];
    $query =$this->bdd->prepare('SELECT * FROM moto WHERE type = :type');
    $query ->bindParam(':type', $type);
    $query ->execute();
    $results = $query->fetchAll();

    foreach ($results as $result) {
        $motos[] = new Moto ($result['id'],$result['name'],$result['model'],$result['type'], $result['image']);
        
    }
    return $motos;
 }

 public function add(Moto $moto) 
 {
     
     $name = $moto->getName();
     $model = $moto->getModel();
     $type = $moto->getType();
     $image = $moto->getImage();
 
     $query = $this->bdd->prepare('INSERT INTO moto (name,model,type, image) VALUES (:name, :model, :type,:image)');
     $query->bindParam(':name', $name);
     $query->bindParam(':model', $model);
     $query->bindParam(':type', $type);
     $query->bindParam(':image', $image);
     $query->execute();
 
     $moto->setId($this->bdd->lastInsertId());
 }
 
 

 public function delete($id) {
   $query = $this->bdd->prepare('DELETE FROM moto WHERE id = :id');
   $query->bindParam(':id', $id);
   $query->execute();
}


}


?>