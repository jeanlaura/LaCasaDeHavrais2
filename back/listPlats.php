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
                        <th scope="col" class="price"> Prix </th>
                        <th scope="col" class="desc"> Description </th>
                        <th scope="col" class="cat"> Catégories </th>
                        <th scope="col" class="subCat"> Sous-catégories </th>
                        <th scope="col" class="process"> Processus </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arrayDishes as $dishes) { ?>
                        <tr>
                            <th scope="row"> <?= $dishes->Plats ?> </th>
                            <th scope="row"><?= $dishes->Prix ?></th>
                            <th scope="row"><?= $dishes->Description ?></th>
                            <th scope="row"><?= $dishes->Categories ?></th>
                            <th scope="row"><?= $dishes->SousCategories ?></th>
                            <th scope="row">
                                <a href="modifier-plats.php?id=<?= $dishes->dishes_id ?>" class="btn btn-warning" >Modifier</a>
                                <a href="supprimer-plats.php?id=<?= $dishes->dishes_id ?>" class="btn btn-danger" >Supprimer</a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer_back.php'; ?>