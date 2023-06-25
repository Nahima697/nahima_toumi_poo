<?php
class Moto {
   private $id;
   private $name;
   private $model;
   private $type;
   private $image;

   public function __construct($id,$name,$model,$type,$image)
   {
    $this->id= $id;
    $this->name= $name;
    $this->model = $model;
    $this->type = $type;
    $this->image = $image;
    
   }


   /**
    * Get the value of id
    */ 
   public function getId()
   {
      return $this->id;
   }

   /**
    * Set the value of id
    *
    * @return  self
    */ 
   public function setId($id)
   {
      $this->id = $id;

      return $this;
   }

 
   public function getModel()
   {
      return  htmlentities($this->model);
   }

   /**
    * Set the value of model
    *
    * @return  self
    */ 
   public function setModel($model)
   {
      $this->model = $model;

      return $this;
   }

  
   public function getType()
   {
      return  htmlentities($this->type);
   }

   /**
    * Set the value of energy
    *
    * @return  self
    */ 
   public function setType($type)
   {
      $this->type = $type;

      return $this;
   }


   /**
    * Get the value of image
    */ 
   public function getImage()
   {
      return $this->image;
   }

   /**
    * Set the value of image
    *
    * @return  self
    */ 
   public function setImage($image)
   {
      $this->image = $image;

      return $this;
   }

   /**
    * Get the value of name
    */ 
   public function getName()
   {
      return  htmlentities($this->name);
   }

   /**
    * Set the value of name
    *
    * @return  self
    */ 
   public function setName($name)
   {
      $this->name = $name;

      return $this;
   }
}
?>