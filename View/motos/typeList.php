<?php include('View/parts/header.php'); ?>
<div class="container">
<h1 class = "text-center" >Liste des motos de type <?php echo ($_GET['type'])?></h1>
<div class="d-flex justify-content-space-evenly">

<br>
<a href="index.php?controller=default&action=home" class="btn btn-dark p-2 m-3">Retour</a>
</div>
<table class="table table-striped table-hover mt-3">
    <thead >
        <tr>
            <th scope="col"class="text-center">#</th>
            <th scope="col"class="text-center">Nom</th>
            <th scope="col" class="text-center">Modele</th>
            <th scope="col" class="text-center">Image</th>
            <th scope="col"class="text-center">Type</th>
        </tr>
    </thead>
    <tbody class ="m-3">
        <?php foreach ($motos as $moto) { ?>
            <tr>0
                <th class=" align-middle text-center">
                    <?php echo $moto->getId() ?>
                </th>
                <td class="align-middle text-center">
                    <?php echo $moto->getName() ?>
                </td>
                <td class="col-description align-middle text-center"><?php echo $moto->getModel() ?></td>
                <td class="align-middle text-center">
                    <img src="<?php echo(is_null($moto->getImage()) ? 'uploads/no-picture.png':
                    'uploads/'.$moto->getImage())?>" width="250" height="150">
                </td>
                <td class="col-description align-middle text-center"><?php echo $moto->getType() ?></td>
                
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>

<?php include('View/parts/footer.php'); ?>
