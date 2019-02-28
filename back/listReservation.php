<?php 
    require_once '../controllers/controllerListe-resa_back.php';
    require_once '../controllers/controllerSupprimer-reservation.php';
    include 'header_back.php';
?>
<!-- CONTENT PAGE -->
<div class="container marginTop" id="margListResa">
    <div class="row">
        <div class="col align-self-center">
            <table class="table table-striped" id="tableListResa">
                <thead>
                    <tr>
                        <th scope="col" class="lastnameBack"> Nom </th>
                        <th scope="col" class="firstnameBack" id="fistnameResaBack"> Prénom </th>
                        <th scope="col" class="numTelBack"> Numéro de téléphone </th>
                        <th scope="col" class="mailBack"> Adresse mail </th>
                        <th scope="col" class="dateResaBack" id="dateResaBack"> Date de réservation </th>
                        <th scope="col" class="hourResaBack" id="hourResaBack"> Heure de réservation </th>
                        <th scope="col" class="nbPersBack" id="nbPersResaBack"> Nombre de personnes </th>
                        <th scope="col" class="numTableBack" id="numTableResaBack"> Numéro de la table </th>
                        <th scope="col" class="processusBack"> Processus </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arrayResa as $resa) { ?>
                        <tr>
                            <th scope="row"> <?= $resa->reservation_lastname ?> </th>
                            <th scope="row" id="fistnameResaBackForeach"><?= $resa->reservation_firstname ?></th>
                            <th scope="row"><?= $resa->reservation_numTel ?></th>
                            <th scope="row"> <?= $resa->reservation_mail ?> </th>
                            <th scope="row" id="dateResaBackForeach"><?= $resa->reservation_dateResa ?></th>
                            <th scope="row" id="hourResaBackForeach"><?= $resa->reservation_hourResa ?></th>
                            <th scope="row" id="nbPersResaBackForeach"><?= $resa->reservation_nbPers ?></th>
                            <th scope="row" id="numTableResaBackForeach"><?= $resa->tables_id ?></th>
                            <th scope="row">
                                <a href="affiche-resa.php?idResa=<?= $resa->reservation_id ?>" class="btn btn-warning" id="affResaBack" style="display: none;">Afficher</a>
                                <a href="modifier-reservation.php?idResa=<?= $resa->reservation_id ?>" class="btn btn-warning" id="modResaBack">Modifier</a>
                                <a href="supprimer-reservation.php?idResa=<?= $resa->reservation_id ?>" class="btn btn-danger" id="supResaBack">Supprimer</a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer_back.php'; ?>