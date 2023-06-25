<?php include ('View/parts/header.php');;?>
<div class="container">
<h1 class="text-center m-2">Annonce : <?php echo $moto->getName();?></h1>

<a  class=" btn btn-dark" href="index.php?controller=motos&action=list">Retour sur le listing</a><br>

    <div class="row d-flex justify-content-center">
    <img  class='img-fluid mt-3' src="<?php echo(is_null($moto->getImage()) ? 'uploads/no-picture.png':
    'uploads/'.$moto->getImage())?>" alt="image de <?php echo($moto->getImage());?>">
    <h2 class="text-center p-3  pb-3"> Les informations</h2>
    <h5 class="text-center"> Modele : <?php echo($moto->getModel())?></h5>
    <h5 class="text-center"> type : <?php echo($moto->getType())?></h5>
 
   

    </div>
</div> 
<?php include('View/parts/footer.php');?>
