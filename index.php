<?php
    require 'controllers/controllerListe-plats.php';
    require 'controllers/controller-reservation.php';
    require 'header.php';
    echo '<br /><br/><br/><br/><br/>';
?>

<!--MODAL PANIER-->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Panier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cartItems" class="modal-body">
      </div>
        <p id="totalPrice">0</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Valider la commande</button>
      </div>
    </div>
  </div>
</div>


<!--FIN MODAL PANIER-->

<div class="bgimg-1">
    <div class="caption">
        <span class="border">BIENVENUE À LA CASA DE HAVRAIS</span>
    </div>
</div>
<div id="accueil">
    <h1>Le restaurant où se poser</h1>
    <p>La Casa De Havrais est un restaurant gastronomique espagnol, avec que des spécialités espagnol. Nous vous accueillons du lundi au samedi de 11h30 à 15h et de 18h à 22h. Venez profiter en famille d'une ambiance relaxante sur les banquettes prévues à cet effet.</p>
</div>
<div class="bgimg-2">
    <div class="caption">
	<span class="border bgimg-2-carte">CARTE</span>
    </div>
</div>
<div id="divCarte">
    <div id="carte">
	<div class="container-fluid" id="cartes">
            <div class="row" id="entrees">
		<div class="col-md-12">
                    <h1 id="title_cartes">CARTES</h1>
                    <h2>ENTR&Eacute;ES</h2>
                    <p><br></p>
                    <h3>V&Eacute;G&Eacute;TARIEN</h3>
                    <?php foreach ($arrayDishesEntreesVege as $dishesEntreesVege) { ?>
                    <div>
                        <div>
                        <p>
                            <strong><?= $dishesEntreesVege->dishes_name ?></strong><i><?= $dishesEntreesVege->dishes_price ?></i>
                            <br><?= $dishesEntreesVege->dishes_description ?>
                        </p>
                        <button class="addProduct" id="add<?= $dishesEntreesVege->dishes_id ?>">Ajouter au panier</button>
                        </div>
                    </div>
                    <?php } ?>
                    <hr class="hr_entrees">
                    <h3>VIANDE</h3>
                    <?php foreach ($arrayDishesEntreesViande as $dishesEntreesViande) { ?>
                        <p>
                            <strong><?= $dishesEntreesViande->dishes_name ?></strong><i><?= $dishesEntreesViande->dishes_price ?></i>
                            <br><?= $dishesEntreesViande->dishes_description ?>
                        </p>
                    <?php } ?>
                    <hr class="hr_entrees">
                    <h3>VOLAILLE</h3>
                    <?php foreach ($arrayDishesEntreesVolaille as $dishesEntreesVolaille) { ?>
                        <p>
                            <strong><?= $dishesEntreesVolaille->dishes_name ?></strong><i><?= $dishesEntreesVolaille->dishes_price ?></i>
                            <br><?= $dishesEntreesVolaille->dishes_description ?>
                        </p>
                    <?php } ?>
                    <hr class="hr_entrees">
                    <h3>POISSON</h3>
                    <?php foreach ($arrayDishesEntreesPoisson as $dishesEntreesPoisson) { ?>
                        <p>
                            <strong><?= $dishesEntreesPoisson->dishes_name ?></strong><i><?= $dishesEntreesPoisson->dishes_price ?></i>
                            <br><?= $dishesEntreesPoisson->dishes_description ?>
                        </p>
                    <?php } ?>
		</div>
            </div>
            <div class="row" id="plats">
		<div class="col-md-12">
                    <h2>PLATS</h2>
                    <p><br></p>
                    <h3>V&Eacute;G&Eacute;TARIEN</h3>
                    <?php foreach ($arrayDishesPlatsVege as $dishesPlatsVege) { ?>
                        <p>
                            <strong><?= $dishesPlatsVege->dishes_name ?></strong><i><?= $dishesPlatsVege->dishes_price ?></i>
                            <br><?= $dishesPlatsVege->dishes_description ?>
                        </p>
                    <?php } ?>
                    <hr class="hr_plats">
                    <h3>VIANDE</h3>
                    <?php foreach ($arrayDishesPlatsViande as $dishesPlatsViande) { ?>
                        <p>
                            <strong><?= $dishesPlatsViande->dishes_name ?></strong><i><?= $dishesPlatsViande->dishes_price ?></i>
                            <br><?= $dishesPlatsViande->dishes_description ?>
                        </p>
                    <?php } ?>
                    <hr class="hr_plats">
                    <h3>VOLAILLE</h3>
                    <?php foreach ($arrayDishesPlatsVolaille as $dishesPlatsVolaille) { ?>
                        <p>
                            <strong><?= $dishesPlatsVolaille->dishes_name ?></strong><i><?= $dishesPlatsVolaille->dishes_price ?></i>
                            <br><?= $dishesPlatsVolaille->dishes_description ?>
                        </p>
                    <?php } ?>
                    <hr class="hr_plats">
                    <h3>POISSON</h3>
                    <?php foreach ($arrayDishesPlatsPoisson as $dishesPlatsPoisson) { ?>
                        <p>
                            <strong><?= $dishesPlatsPoisson->dishes_name ?></strong><i><?= $dishesPlatsPoisson->dishes_price ?></i>
                            <br><?= $dishesPlatsPoisson->dishes_description ?>
                        </p>
                    <?php } ?>
		</div>
            </div>
            <div class="row" id="desserts">
		<div class="col-md-12">
                    <h2>DESSERTS</h2>
                    <p><br></p>
                    <?php foreach ($arrayDishesDessert as $dishesDessert) { ?>
                        <p>
                            <strong><?= $dishesDessert->dishes_name ?></strong><i><?= $dishesDessert->dishes_price ?></i>
                            <br><?= $dishesDessert->dishes_description ?>
                        </p>
                    <?php } ?>
		</div>
            </div>
	</div>
    </div>
</div>
<div class="bgimg-5">
    <div class="caption">
        <span class="border bgimg-5-menus">MENUS</span>
    </div>
</div>
<div id="divMenus">
    <div id="menus">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" align="center">
            <div id="carousel_menu" class="carousel-inner">
                <div class="carousel-item active">
                    <img class="mySlides img-responsive" src="img/menu_vege3.png">
                </div>
                <div class="carousel-item">
                    <img class="mySlides img-responsive" src="img/menu_viande.png">
                </div>
                <div class="carousel-item">
                    <img class="mySlides img-responsive" src="img/menu_poulet.png">
                </div>
                <div class="carousel-item">
                    <img class="mySlides img-responsive" src="img/menu_poisson.png">
                </div>
                <div class="carousel-item">
                    <img class="mySlides img-responsive" src="img/menu_enfant.png">
                </div>
            </div>
            <a id="previous" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a id="next" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="color: #fff;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </div>
</div>
<div class="bgimg-3">
    <div class="caption">
        <span class="border bgimg-3-reservation">RESERVATION</span>
    </div>
</div>
<div id="divReservation">
    <div id="reservation">
        <div class="container-fluid">
            <div class="row" id="pageWebOrdinateur">
                <div class="col-12 col-md-6" align="center" id="planWidth">
                    <h3 id="pPlanResa">Veuillez choisir une table grâce au plan suivant :</h3>
                    <img class="imgPlan img-responsive" id="imgPlanResa" src="img/plan_resto2.png" alt="">
                </div>
                <div class="col-12 col-md-6" id="formWidth">
                    <?php if ($addResaSuccess){
                        ?>
                            <p>Réservation n°<?= $reservation->reservation_id ?> enregistrer au nom de <?= $reservation->reservation_lastname ?> <?= $reservation->reservation_firstname ?> à <?= $reservation->reservation_hourResa ?>.</p>
                            <p>
                                Un mail de confirmation vous a été envoyés à l'adresse que vous avez indiqué : <?= $reservation->reservation_mail ?>.
                            </p>
                            <p>
                                Nous pouvons vous joindre au numéro suivant : <?= $reservation->reservation_numTel ?>.
                            </p>
                            <p>
                                À bientôt dans notre restaurant.
                            </p>
                        <?php
                        } else { ?>
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
        <!---->
    </div>
</div>
<?php require 'footer.php' ?>