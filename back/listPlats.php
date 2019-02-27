<?php 
    require_once '../controllers/controllerListe-plats_back.php';
    require_once '../controllers/controllerSupprimer-plats.php';
    include 'header_back.php';
?>
<!-- CONTENT PAGE -->
<div class="container marginTop" id="margListPlats">
    <div class="row">
        <div class="col align-self-center">
            <table class="table table-striped" id="tableListPlats">
                <thead>
                    <tr>
                        <th scope="col" class="name"> Nom </th>
                        <th scope="col" class="price" id="priceBack"> Prix </th>
                        <th scope="col" class="desc" id="descBack"> Description </th>
                        <th scope="col" class="cat"> Catégories </th>
                        <th scope="col" class="subCat"> Sous-catégories </th>
                        <th scope="col" class="process"> Processus </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arrayDishes as $dishes) { ?>
                        <tr>
                            <th scope="row"> <?= $dishes->dishes_name ?> </th>
                            <th scope="row" id="priceBackForeach"><?= $dishes->dishes_price ?></th>
                            <th scope="row" id="descBackForeach"><?= $dishes->dishes_description ?></th>
                            <th scope="row"><?= $dishes->categories_name ?></th>
                            <th scope="row"><?= $dishes->subcategories_name ?></th>
                            <th scope="row">
                                <a href="affiche-plat.php?id=<?= $dishes->dishes_id ?>" class="btn btn-warning" id="affPlatsBack" style="display: none;">Afficher</a>
                                <a href="modifier-plats.php?id=<?= $dishes->dishes_id ?>" class="btn btn-warning" id="modPlatsBack">Modifier</a>
                                <a href="supprimer-plats.php?id=<?= $dishes->dishes_id ?>" class="btn btn-danger" id="supPlatsBack">Supprimer</a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer_back.php'; ?>