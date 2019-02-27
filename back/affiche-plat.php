<?php
    require_once '../controllers/controllerAffiche-plat.php';
?>
<?php include 'header_back.php'; ?>
<!-- CONTENT PAGE -->
<div class="container marginTop" id="margAffPlats">
    <div class="row">
        <div class="col align-self-center">
            <?php if(!$idPlatExist){ ?>
                <h1>Ce plat n'existe pas !</h1>
                <a href="listPlats.php" class="btn btn-primary">Retour liste des plats</a>
            <?php }else{ ?>
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header headerCard">
                        <!-- Title -->
                        <h2 class="card-title" align="center">
                            <a><?= $dishes->dishes_name ?></a>
                        </h2>
                    </div>
                    <!-- Card content -->
                    <div class="card-body table-responsive">
                        <table class="table table-striped" id="tableAffPlats">
                            <tbody>
                                <tr>
                                    <th>Nom </th>
                                    <td><?= $dishes->dishes_name ?></td>
                                </tr>
                                <tr>
                                    <th>Prix </th>
                                    <td><?= $dishes->dishes_price ?></td>
                                </tr>
                                <tr>
                                    <th>Description </th>
                                    <td><?= $dishes->dishes_description ?></td>
                                </tr>
                                <tr>
                                    <th>Catégorie </th>
                                    <td><?= $dishes->categories_name ?></td>
                                </tr>
                                <tr>
                                    <th>Sous_catégorie </th>
                                    <td><?= $dishes->subcategories_name ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" align="right">
                        <a href="modifier-plats.php?id=<?= $dishes->dishes_id ?>" class="btn btn-warning">Modifier</a>
                        <a href="supprimer-plats.php?id=<?= $dishes->dishes_id ?>" class="btn btn-danger">Supprimer</a>
                        <a href="listPlats.php" class="btn btn-primary">Retour à la liste des plats</a>
                    </div>
                </div>
                <!-- Card -->
            <?php } ?>
        </div>
    </div>    
</div>
<?php include 'footer_back.php'; ?>