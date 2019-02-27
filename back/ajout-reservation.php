<?php require_once '../controllers/controllerAjout-reservation.php'; ?>
<?php include 'header_back.php'; ?>
<!-- CONTENT PAGE -->
<div class="container marginTop">
    <div class="row justify-content-center" id="margAjoutResa">
        <div class="col-md-12">
            <?php if ($addResaSuccess) { ?>
                <p>Plats bien ajouté !</p>
                <a href="ajout-reservation.php" class="btn btn-primary btnHomeBack">Ajouter une nouvelle réservation</a>
                <a href="listReservations.php" class="btn btn-amber btnHomeBack">Liste des réservations</a>
            <?php } else { ?>
                <form class="formResa" id="formResa" name="formResa" method="POST" action="">
                    <div class="card" id="addResa">
                        <!-- Card header -->
                        <div class="card-header headerCard" role="tab" id="heading1" align="center">
                            <h2 class="mb-0 mt-3">Réserver une table</h2>
                        </div>
                        <div class="card-body pt-0 lighten-1">
                            <!---------PRENOM ET NOM----------->
                            <div class="form-row" id="firstnameLastname resaLigne1">
                                <div class="md-form col-md-6">
                                    <label for="inputLastnameResa">Nom&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['lastnameResaErr']) ? $arrayError['lastnameResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputLastnameResa" class="form-control" id="inputLastnameResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_lastname : ''; ?>">
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="inputFirstnameResa">Prénom&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['firstnameResaErr']) ? $arrayError['firstnameResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputFirstnameResa" class="form-control" id="inputFirstnameResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_firstname : ''; ?>">
                                </div>
                            </div>
                            <!---------TELEPHONE ET MAIL----------->
                            <div class="form-row" id="resaLigne2">
                                <div class="md-form col-md-6">
                                    <label for="inputTelResa">Numéro&nbsp;de&nbsp;téléphone&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['telResaErr']) ? $arrayError['telResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputTelResa" class="form-control" id="inputTelResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_numTel : ''; ?>">
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="inputMailResa">Adresse&nbsp;e-mail&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['mailResaErr']) ? $arrayError['mailResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputMailResa" class="form-control" id="inputMailResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_mail : ''; ?>">
                                </div>
                            </div>
                            <!---------DATE ET HEURE----------->
                            <div class="form-row" id="resaLigne3">
                                <div class="md-form col-md-6">
                                    <label for="inputDateResa" id="labelInputDateResa">Jour&nbsp;de&nbsp;réservation&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['dateResaErr']) ? $arrayError['dateResaErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" type="date" name="inputDateResa" id="inputDateResa" min="<?= $today ?>" max="<?= $oneDateLater ?>" value="<?= isset($_POST['inputDateResa']) ? $_POST['inputDateResa'] : '' ?>" />
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="selectHourResa" id="labelSelectHourResa">Heure&nbsp;de&nbsp;réservation
                                        <span class="red-text">* <?= isset($arrayError['hourResaErr']) ? $arrayError['hourResaErr'] : ''; ?></span>
                                    </label>
                                    <select class="browser-default custom-select" id="selectHourResa" name="selectHourResa">
                                        <option value="" disabled selected>Choisir une heure</option>
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
                                        <option value="22:00:00">22h00</option>
                                    </select>
                                </div>
                            </div>
                            <!---------NOMBRE PERSONNE ET NUMERO DE TABLE----------->
                            <div class="form-row" id="resaLigne4">
                                <div class="md-form col-md-6">
                                    <label for="inputNbPersResa">Nombre&nbsp;de&nbsp;personnes&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['nbPersResaErr']) ? $arrayError['nbPersResaErr'] : ''; ?></span>
                                    </label>
                                    <input type="text" name="inputNbPersResa" class="form-control" id="inputNbPersResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_hourResa : ''; ?>">
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="selectNumTable" id="labelSelectNumTable">Numéro&nbsp;de&nbsp;table
                                        <span class="red-text">* <?= isset($arrayError['numTableErr']) ? $arrayError['numTableErr'] : ''; ?></span>
                                    </label>
                                    <select class="browser-default custom-select" id="selectNumTable" name="selectNumTable">
                                        <option value="" disabled selected>Choisir une table</option>
                                        <option value="1">Table n°1</option>
                                        <option value="2">Table n°2</option>
                                        <option value="3">Table n°3</option>
                                        <option value="4">Table n°4</option>
                                        <option value="5">Table n°5</option>
                                        <option value="6">Table n°6</option>
                                        <option value="7">Table n°7</option>
                                        <option value="8">Table n°8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" role="tab" id="footing1">
                            <div class="form-row">
                                <div class="col-12 col-md-12" align="center" id="btnSubmitResa2">
                            <p>
                                <button type="submit" class="btn btn-blue-grey" id="submitResaResponsive" name="submitResaResponsive" style="display:none;">Valider la<br>réservation</button>
                                <button type="submit" class="btn btn-blue-grey" id="submitResa2" name="submitResa2">Valider la réservation</button>
                            </p>
                            <p>
                                <span class="red-text">*&nbsp;Champs requis.</span>
                            </p>
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
