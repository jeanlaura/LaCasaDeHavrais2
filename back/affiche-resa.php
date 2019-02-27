<?php
    require_once '../controllers/controllerAffiche-resa.php';
?>
<?php include 'header_back.php'; ?>
<!-- CONTENT PAGE -->
<div class="container marginTop" id="margAffResa">
    <div class="row">
        <div class="col align-self-center">
            <?php if(!$idResaExist){ ?>
                <h1>Cette réservation n'existe pas !</h1>
                <a href="listReservation.php" class="btn btn-primary">Retour à la liste des réservations</a>
            <?php }else{ ?>
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header headerCard">
                        <!-- Title -->
                        <h2 class="card-title" align="center">
                            <a><?= $resa->reservation_lastname ?> <?= $resa->reservation_firstname ?></a>
                        </h2>
                    </div>
                    <!-- Card content -->
                    <div class="card-body table-responsive">
                        <table class="table table-striped" id="tableAffPlats">
                            <tbody>
                                <tr>
                                    <th>Nom </th>
                                    <td><?= $resa->reservation_lastname ?></td>
                                </tr>
                                <tr>
                                    <th>Prénom </th>
                                    <td><?= $resa->reservation_firstname ?></td>
                                </tr>
                                <tr>
                                    <th>Numéro de téléphone </th>
                                    <td><?= $resa->reservation_numTel ?></td>
                                </tr>
                                <tr>
                                    <th>Adresse mail </th>
                                    <td><?= $resa->reservation_mail ?></td>
                                </tr>
                                <tr>
                                    <th>Date de réservation </th>
                                    <td><?= $resa->reservation_dateResa ?></td>
                                </tr>
                                <tr>
                                    <th>Heure de réservation </th>
                                    <td><?= $resa->reservation_hourResa ?></td>
                                </tr>
                                <tr>
                                    <th>Nombre de personnes </th>
                                    <td><?= $resa->reservation_nbPers ?></td>
                                </tr>
                                <tr>
                                    <th>Numéro de la table </th>
                                    <td><?= $resa->tables_id ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" align="right">
                        <a href="modifier-reservation.php?id=<?= $resa->reservation_id ?>" class="btn btn-warning">Modifier</a>
                        <a href="supprimer-reservation.php?id=<?= $resa->reservation_id ?>" class="btn btn-danger">Supprimer</a>
                        <a href="listReservation.php" class="btn btn-primary">Retour à la liste des réservations</a>
                    </div>
                </div>
                <!-- Card -->
            <?php } ?>
        </div>
    </div>    
</div>
<?php include 'footer_back.php'; ?>