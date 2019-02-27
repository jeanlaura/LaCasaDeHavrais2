<?php require_once '../controllers/controllerModifier-reservation.php'; ?>
<?php include 'header_back.php'; ?>
<!-- CONTENT PAGE -->
<div class="container marginTop" id="margModifResa">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($updateSuccess) { ?>
                <p>Réservation bien modifié !</p>
                <a href="listResa.php" class="btn btn-primary btnHomeBack">Retour à la liste des réservations</a>
            <?php } else { ?>
                <form class="form" name="form" id="dishesForm" method="post" enctype="multipart/form-data">
                    <div class="card" id="updateDishes">
                        <!-- Card header -->
                        <div class="card-header headerCard" role="tab" id="heading1" align="center">
                            <h2 class="mb-0 mt-3">Modifier une réservation</h2>
                        </div>
                        <!-- Card body -->
                        <div class="card-body pt-0 lighten-1">
                            <div class="form-row" id="modifNamePrice">
                                <div class="md-form col-md-6">
                                    <label for="inputLastnameResa">Nom&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['lastnameResaErr']) ? $arrayError['lastnameResaErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" id="inputLastnameResa" type="text" name="inputLastnameResa" value="<?= isset($_POST['inputLastnameResa']) ? $_POST['inputLastnameResa'] : $resaOBJ->reservation_lastname ?>" />
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="inputFirstnameResa">Prénom&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['firstnameResaErr']) ? $arrayError['firstnameResaErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" id="inputFirstnameResa" type="text" name="inputFirstnameResa" value="<?= isset($_POST['inputFirstnameResa']) ? $_POST['inputFirstnameResa'] : $resaOBJ->reservation_firstname ?>" />
                                </div>
                            </div>
                            
                            <div class="form-row" id="resaLigne2">
                                <div class="md-form col-md-6">
                                    <label for="inputTelResa">Numéro&nbsp;de&nbsp;téléphone&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['telResaErr']) ? $arrayError['telResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputTelResa" class="form-control" id="inputTelResa" value="<?= isset($_POST['inputTelResa']) ? $_POST['inputTelResa'] : $resaOBJ->reservation_numTel ?>">
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="inputMailResa">Adresse&nbsp;e-mail&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['mailResaErr']) ? $arrayError['mailResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputMailResa" class="form-control" id="inputMailResa" value="<?= isset($_POST['inputMailResa']) ? $_POST['inputMailResa'] : $resaOBJ->reservation_mail ?>">
                                </div>
                            </div>
                            <div class="form-row" id="resaLigne3">
                                <div class="md-form col-md-6">
                                    <label for="inputDateResa" id="labelInputDateResa">Jour&nbsp;de&nbsp;réservation&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['dateResaErr']) ? $arrayError['dateResaErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" type="date" name="inputDateResa" id="inputDateResa" min="<?= $today ?>" max="<?= $oneDateLater ?>" value="<?= isset($_POST['inputDateResa']) ? $_POST['inputDateResa'] : $resaOBJ->reservation_dateResa ?>" />
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="selectHourResa" id="labelSelectHourResa">Heure&nbsp;de&nbsp;réservation
                                        <span class="red-text">* <?= isset($arrayError['hourResaErr']) ? $arrayError['hourResaErr'] : ''; ?></span>
                                    </label>
                                    <select class="browser-default custom-select" id="selectHourResa" name="selectHourResa">
                                        <?php foreach ($arrayHour as $hour) { ?>
                                            <option value="<?= $hour->reservation_hourResa ?>" <?= $hour->reservation_hourResa = 'selected' ?>><?= $hour->reservation_hourResa ?></option>
                                        <?php } ?>
                                        <!--<option value="" disabled selected>Choisir une heure</option>
                                        <option value="MIDI" disabled>MIDI</option>
                                        <option value="11:30:00">11h30</option>
                                        <option value="12:00:00">12h00</option>
                                        <option value="12:30:00">12h30</option>
                                        <option value="13:00:00">13h00</option>
                                        <option value="13:30:00">13h30</option>
                                        <option value="14:00:00">14h00</option>
                                        <option value="14:30:00">14h30</option>
                                        <option value="15:00:00">15h00</option>
                                        <option value="SOIR" disabled>SOIR</option>
                                        <option value="18:00:00">18h00</option>
                                        <option value="18:30:00">18h30</option>
                                        <option value="19:00:00">19h00</option>
                                        <option value="19:30:00">19h30</option>
                                        <option value="20:00:00">20h00</option>
                                        <option value="20:30:00">20h30</option>
                                        <option value="21:00:00">21h00</option>
                                        <option value="21:30:00">21h30</option>
                                        <option value="22:00:00">22h00</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-row" id="resaLigne4">
                                <div class="md-form col-md-6">
                                    <label for="inputNbPersResa">Nombre&nbsp;de&nbsp;personnes&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['nbPersResaErr']) ? $arrayError['nbPersResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputNbPersResa" class="form-control" id="inputNbPersResa" value="<?= isset($_POST['inputNbPersResa']) ? $_POST['inputNbPersResa'] : $resaOBJ->reservation_nbPers ?>">
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="selectNumTable" id="labelSelectNumTable">Numéro&nbsp;de&nbsp;table
                                        <span class="red-text">* <?= isset($arrayError['numTableErr']) ? $arrayError['numTableErr'] : ''; ?></span>
                                    </label>
                                    <select class="browser-default custom-select" id="selectNumTable" name="selectNumTable">
                                        <?php foreach ($arrayNumTable as $numTable) { ?>
                                            <option value="<?= $numTable->tables_id ?>" <?= $numTable->tables_id = 'selected' ?>><?= $numTable->tables_id ?></option>
                                        <?php } ?>
<!--                                        <option value="" disabled selected>Choisir une table</option>
                                        <option value="1">Table n°1</option>
                                        <option value="2">Table n°2</option>
                                        <option value="3">Table n°3</option>
                                        <option value="4">Table n°4</option>
                                        <option value="5">Table n°5</option>
                                        <option value="6">Table n°6</option>
                                        <option value="7">Table n°7</option>
                                        <option value="8">Table n°8</option>-->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer" role="tab" id="footing1">
                            <div class="form-row">
                                <div class="md-form col-md-12">
                                    <button type="submit" name="submit" class="btn btn-success validate">Envoyer</button>
                                    <span class="red-text" id="requiredField">* champs requis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'footer_back.php'; ?>