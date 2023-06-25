<?php include ('parts/header.php'); ?>

<section class="type mt-6 pb-6 home">
  <div class="container-fluid text-center">
    <h1 class="text-center ">Bienvenue chez Park Moto</h1>
    <div class="container text-center">
      <div class="row ">
        <?php foreach (MotoController::$types as $type) :  ?>
          <div class="col-md-6">
            <div class="card bg-image mt-3">
              <img src="uploads/<?php echo $type; ?>.jpg" class="card-img-top" alt="<?php echo $type; ?>">
              <a href="index.php?controller=motos&action=type&type=<?php echo $type; ?>" class="overlay-link"></a>
              <div class="overlay-content">
                <h2><?php echo $type; ?></h2>
                <h4>Découvrez notre moto de type <?php echo $type; ?></h4>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php include('View/parts/footer.php');?>