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
                    <fieldset>
                        <legend>Réserver une table</legend>
                        <div class="row" id="resaLigne1">
                            <p>
                                <div class="col-12 col-md-6">
                                    <div class="col-md-6" id="labelLastnameWidth">
                                        <label for="inputLastnameResa">Nom&nbsp;<span class="red-text">* <?= isset($arrayError['lastnameResaErr']) ? $arrayError['lastnameResaErr'] : ''; ?></span></label>
                                    </div>
                                    <div class="col-md-6" id="inputLastnameWidth">
                                        <input type="text" name="inputLastnameResa" class="form-control" id="inputLastnameResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_lastname : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-6" id="labelFirstnameWidth">
                                        <label for="inputFirstnameResa">Prénom&nbsp;<span class="red-text">* <?= isset($arrayError['firstnameResaErr']) ? $arrayError['firstnameResaErr'] : ''; ?></span></label>
                                    </div>
                                    <div class="col-12 col-md-6" id="inputFirstnameWidth">
                                        <input type="text" name="inputFirstnameResa" class="form-control" id="inputFirstnameResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_firstname : ''; ?>">
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="row" id="resaLigne2">
                            <p>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-6" id="labelTelResaWidth">
                                        <label for="inputTelResa">Numéro&nbsp;de&nbsp;téléphone&nbsp;<span class="red-text">* <?= isset($arrayError['telResaErr']) ? $arrayError['telResaErr'] : ''; ?></span></label>
                                    </div>
                                    <div class="col-12 col-md-6" id="inputTelResaWidth">
                                        <input type="text" name="inputTelResa" class="form-control" id="inputTelResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_numTel : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-6" id="labelMailWidth">
                                        <label for="inputMailResa">Adresse&nbsp;e-mail&nbsp;<span class="red-text">* <?= isset($arrayError['mailResaErr']) ? $arrayError['mailResaErr'] : ''; ?></span></label>
                                    </div>
                                    <div class="col-12 col-md-6" id="inputMailWidth">
                                        <input type="text" name="inputMailResa" class="form-control" id="inputMailResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_mail : ''; ?>">
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="row" id="resaLigne3">
                            <p>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-6" id="labelDateResaWidth">
                                        <label for="inputDateResa">Jour&nbsp;de&nbsp;réservation&nbsp;<span class="red-text">* <?= isset($arrayError['dateResaErr']) ? $arrayError['dateResaErr'] : ''; ?></span></label>
                                    </div>
                                    <div class="col-12 col-md-6" id="inputDateResaWidth">
                                        <input class="form-control" type="date" name="inputDateResa" id="inputDateResa" min="<?= $today ?>" max="<?= $oneDateLater ?>" value="<?= isset($_POST['inputDateResa']) ? $_POST['inputDateResa'] : '' ?>" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-6" id="labelHourResaWidth">
                                        <label for="selectHourResa">Heure&nbsp;de&nbsp;réservation</label>
                                        <span class="red-text">* <?= isset($arrayError['hourResaErr']) ? $arrayError['hourResaErr'] : ''; ?></span>
                                    </div>
                                    <div class="col-12 col-md-6" id="selectHourResaWidth">
                                        <select class="form-control" id="selectHourResa" name="selectHourResa">
                                            <option value="" disabled selected>Choisir une heure</option>
                                            <option value="MIDI" disabled>MIDI</option>
                                            <option value="11:30:00">11h30</option>
                                            <option value="12:00:00">12h00</option>
                                            <option value="12h30">12h30</option>
                                            <option value="13h00">13h00</option>
                                            <option value="13h30">13h30</option>
                                            <option value="14h00">14h00</option>
                                            <option value="14h30">14h30</option>
                                            <option value="15h00">15h00</option>
                                            <option value="SOIR" disabled>SOIR</option>
                                            <option value="18h00">18h00</option>
                                            <option value="18h30">18h30</option>
                                            <option value="19h00">19h00</option>
                                            <option value="19h30">19h30</option>
                                            <option value="20h00">20h00</option>
                                            <option value="20h30">20h30</option>
                                            <option value="21h00">21h00</option>
                                            <option value="21h30">21h30</option>
                                            <option value="22h00">22h00</option>
                                        </select>
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="row" id="resaLigne4">
                            <p>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-6" id="labelNbPersResaWidth">
                                        <label for="inputNbPersResa">Nombre&nbsp;de&nbsp;personnes&nbsp;</label><span class="amber-text">*</span>
                                        <span class="red-text">* <?= isset($arrayError['nbPersResaErr']) ? $arrayError['nbPersResaErr'] : ''; ?></span>
                                    </div>
                                    <div class="col-12 col-md-6" id="inputNbPersResaWidth">
                                        <input type="text" name="inputNbPersResa" class="form-control" id="inputNbPersResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_hourResa : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-6" id="labelNumTableWidth">
                                        <label for="selectNumTable">Numéro&nbsp;de&nbsp;table</label>
                                        <span class="red-text">* <?= isset($arrayError['numTableErr']) ? $arrayError['numTableErr'] : ''; ?></span>
                                    </div>
                                    <div class="col-12 col-md-6" id="selectNumTableWidth">
                                        <select class="form-control" id="selectNumTable" name="selectNumTable">
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
                            </p>
                        </div>
                        <div class="col-12 col-md-12" align="center" id="btnSubmitResa2">
                            <p>
                                <button type="submit" class="btn btn-blue-grey" id="submitResaResponsive" name="submitResaResponsive" style="display:none;">Valider la<br>réservation</button>
                                <button type="submit" class="btn btn-blue-grey" id="submitResa2" name="submitResa2">Valider la réservation</button>
                            </p>
                            <p><span class="amber-text">*&nbsp;À partir de 7 personnes, veuillez nous appeler pour prendre une réservation.</span></p>
                        </div>
                    </fieldset>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'footer_back.php'; ?>
