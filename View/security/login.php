<?php include('View/parts/header.php'); ?>
    <div class="container">
    <h1>Se connecter</h1>
<form method="post">
    <div class="col-md-2">
        <label for="name">Identifiant*</label>
        <input type="text" id="name" name="name" class="form-control <?php if (isset($errors['name'])) { echo 'is-invalid'; } ?>" value="<?php if (isset($_POST['name'])) { echo $_POST['name']; } ?>">
        <div class="invalid-feedback">
            <?php if (isset($errors['name'])) { echo $errors['name']; } ?>
        </div>
    </div>
    <div class="col-md-2">
        <label for="password">Mot de passe*</label>
        <input type="password" id="password" name="password" class="form-control <?php if (isset($errors['password'])) { echo 'is-invalid'; } ?>">
        <div class="invalid-feedback">
            <?php if (isset($errors['password'])) { echo $errors['password']; } ?>
        </div>
    </div>
    
    <input type="submit" class="btn btn-success m-2">
</form>
</div>
    
    <?php include('View/parts/footer.php'); ?>

