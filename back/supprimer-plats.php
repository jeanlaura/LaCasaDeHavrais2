<?php require_once '../controllers/controllerSupprimer-plats.php'; ?>
<?php include 'header_back.php'; ?>
<!-- CONTENT PAGE -->
<div class="content-wrap marginTop" id="margSuppPlats">
    <div class="container">
        <div class="row">
            <?php
                if ($success){
            ?>
                <p>Votre plats à bien été supprimé !</p>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <a href="listPlats.php" class="btn btn-primary btnHomeBack">Retour à la liste des plats</a>
                    </div>
                    <div class="col-md-4" align="center">
                        <a href="index_back.php" class="btn btn-default btnHomeBack">Accueil</a>
                    </div>
                    <div class="col-md-4">
                        <a href="ajout-plats.php" class="btn btn-info btnHomeBack">Ajouter un plat</a>
                    </div>
                </div>
            <?php        
                }else{
                    echo 'Espèce de noob, t\'es nul, ça à pas marché ! ET BIM !';
                }
            ?>
        </div>
    </div>
</div>
<?php include 'footer_back.php'; ?>