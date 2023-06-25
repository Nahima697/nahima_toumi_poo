<?php include ('View/parts/header.php');?>
<h1> Ajouter une voiture</h1>
<a href= "index.php?controller=motos&action=list" class="btn btn-dark p-2"> Retour</a>
<div class="container">

<form method ="POST" enctype="multipart/form-data" class="row g-3" novalidate>
  <div class="col-md-4">
    <label for="name" class="form-label">Nom</label>
    <input type="text" class="form-control
    <?php if (isset($errors['name'])) { echo 'is-invalid'; } ?>" id="name" value="" name="name">
    <div class="invalid-feedback">
    <?php if (isset($errors['name'])) { echo ($errors['name']); } ?>
      </div>
  </div>
  <div class="col-md-4">
    <label for="model" class="form-label">Modèle</label>
    <textarea class="form-control
    <?php if (isset($errors['model'])) { echo 'is-invalid'; } ?>" id="model" value="model" name="model"></textarea>
    <div class="invalid-feedback">
    <?php if (isset($errors['model'])) { echo ($errors['model']); } ?>
      </div>
  </div>
  <div class="col-md-4 ">
  <label for="type" class="form-label">Type</label>
  <select class="form-select mb-3" name="type" aria-label="Default select example">
  <?php 
    foreach (MotoController::$types as $type) {
      if (isset($_POST['type']) && $_POST['type'] == $type) {
        $selected = 'selected';
      } else {
        $selected = '';
      }
      echo '<option '. $selected .'value="' . $type . '"' . $selected . '>' . $type . '</option>';
    }


    ?>
  </div>
  <div></div>
  <div class="col-md-6 p-3 ">
    <label for="validationCustom03" class="form-label">Image</label>
    <input type="file" name="image" class="form-control  <?php if (isset($errors['image'])) { echo 'is-invalid'; } ?>" id="validationCustom03" >
  </div>
  <div class="invalid-feedback">
    <?php if (isset($errors['image'])) { echo $errors['image']; } ?>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Valider</button>
  </div>
</form>
</div>
<?php include('View/parts/footer.php'); ?>