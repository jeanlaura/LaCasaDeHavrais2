<?php
    session_start();
//    unset($_SESSION);
//    session_destroy();
    $_SESSION['totalCart'] = count($_SESSION['cart']);
    require 'controllers/controllerListe-plats.php';
    require 'controllers/controller-reservation.php';
    require 'header.php';
?>

<!--MODAL PANIER-->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Panier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="cartItems" class="modal-body">
                <?php if(count($_SESSION['cart']) === 0){ ?>
                    <p>Il n'y a actuellement pas d'article dans le panier !</p>
                <?php }else{ ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="tableCart">
                            <thead class="white-text" id="theadTableCart">
                                <tr>
                                    <th class="th-sm">Nom</th>
                                    <th class="th-sm">Quantité</th>
                                    <th class="th-sm">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($_SESSION['cart'])) {
                                    $dishes = [];
                                    $quantity = [];
                                    
                                    foreach($_SESSION['cart'] as $dishOnCart) {
                                        $dish = $dishesOBJ->getDish($dishOnCart);
                                        if($dish) {  
                                            if(!in_array($dish->dishes_id, $dishes)) {
                                                $quantity[$dish->dishes_id] = 0;
                                                foreach($_SESSION['cart'] as $qty) {
                                                    if($qty === $dish->dishes_id) {
                                                        $quantity[$dish->dishes_id]++;
                                                    }
                                                }
                                                $dishes[] = $dish->dishes_id; ?>
                                                <tr>
                                                    <th scope="row"><?= $dish->dishes_name; ?></th>
                                                    <th scope="row"><?= $quantity[$dish->dishes_id]; ?></th>
                                                    <th scope="row"><?= is_float($dish->dishes_price) ? str_replace('.', '€', $dish->dishes_price) : $dish->dishes_price . '€00'; ?></th>
                                                </tr>
                                            <?php }
                                        }
                                    }
                                    $total = 0;
                                    foreach($quantity as $dish => $qty) {
                                        $plat = $dishesOBJ->getDish($dish);
                                        if($plat) {
                                            $total += $plat->dishes_price * $qty;
                                        }
                                    }
                                } ?>
                            <tr id="trTotal" class="white-text">
                                <th><b>Total</b></th>
                                <th align="center" colspan="2" id="totalPrice"><?= is_float($total) ? str_replace('.', '€', $total) : $total . '€00'; ?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
            
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
                    <h2 id="Entrees">ENTR&Eacute;ES</h2>
                    <p><br></p>
                    <h3 id="entreesVege">V&Eacute;G&Eacute;TARIEN</h3>
                    <?php foreach ($arrayDishesEntreesVege as $dishesEntreesVege) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesEntreesVege->dishes_name ?></strong><i><?= is_float($dishesEntreesVege->dishes_price) ? str_replace('.', '€', $dishesEntreesVege->dishes_price) : $dishesEntreesVege->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesEntreesVege->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#entreesVege">
                                    <div align="center">
                                        <button id="btnDishesEntreesVege" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesEntreesVege->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <hr class="hr_entrees" id="hr_entreesViande">
                    <h3>VIANDE</h3>
                    <?php foreach ($arrayDishesEntreesViande as $dishesEntreesViande) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesEntreesViande->dishes_name ?></strong><i><?= is_float($dishesEntreesViande->dishes_price) ? str_replace('.', '€', $dishesEntreesViande->dishes_price) : $dishesEntreesViande->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesEntreesViande->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#hr_entreesViande">
                                    <div align="center">
                                        <button id="btnDishesEntreesViande" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesEntreesViande->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <hr class="hr_entrees" id="hr_entreesVolaille">
                    <h3>VOLAILLE</h3>
                    <?php foreach ($arrayDishesEntreesVolaille as $dishesEntreesVolaille) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesEntreesVolaille->dishes_name ?></strong><i><?= is_float($dishesEntreesVolaille->dishes_price) ? str_replace('.', '€', $dishesEntreesVolaille->dishes_price) : $dishesEntreesVolaille->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesEntreesVolaille->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#hr_entreesVolaille">
                                    <div align="center">
                                        <button id="btnDishesEntreesVolaille" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesEntreesVolaille->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <hr class="hr_entrees" id="hr_entreesPoisson">
                    <h3>POISSON</h3>
                    <?php foreach ($arrayDishesEntreesPoisson as $dishesEntreesPoisson) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesEntreesPoisson->dishes_name ?></strong><i><?= is_float($dishesEntreesPoisson->dishes_price) ? str_replace('.', '€', $dishesEntreesPoisson->dishes_price) : $dishesEntreesPoisson->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesEntreesPoisson->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#hr_entreesPoisson">
                                    <div align="center">
                                        <button id="btnDishesEntreesPoisson" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesEntreesPoisson->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
		</div>
            </div>
            <div class="row" id="plats">
		<div class="col-md-12">
                    <h2>PLATS</h2>
                    <p><br></p>
                    <h3 id="platsVege">V&Eacute;G&Eacute;TARIEN</h3>
                    <?php foreach ($arrayDishesPlatsVege as $dishesPlatsVege) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesPlatsVege->dishes_name ?></strong><i><?= is_float($dishesPlatsVege->dishes_price) ? str_replace('.', '€', $dishesPlatsVege->dishes_price) : $dishesPlatsVege->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesPlatsVege->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#platsVege">
                                    <div align="center">
                                        <button id="btnDishesPlatsVege" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesPlatsVege->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <hr class="hr_plats" id="hr_platsViande">
                    <h3>VIANDE</h3>
                    <?php foreach ($arrayDishesPlatsViande as $dishesPlatsViande) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesPlatsViande->dishes_name ?></strong><i><?= is_float($dishesPlatsViande->dishes_price) ? str_replace('.', '€', $dishesPlatsViande->dishes_price) : $dishesPlatsViande->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesPlatsViande->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#hr_platsViande">
                                    <div align="center">
                                        <button id="btnDishesPlatsViande" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesPlatsViande->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <hr class="hr_plats" id="hr_platsVolaille">
                    <h3>VOLAILLE</h3>
                    <?php foreach ($arrayDishesPlatsVolaille as $dishesPlatsVolaille) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesPlatsVolaille->dishes_name ?></strong><i><?= is_float($dishesPlatsVolaille->dishes_price) ? str_replace('.', '€', $dishesPlatsVolaille->dishes_price) : $dishesPlatsVolaille->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesPlatsVolaille->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#hr_platsVolaille">
                                    <div align="center">
                                        <button id="btnDishesPlatsVolaille" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesPlatsVolaille->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                        <hr class="hr_plats" id="hr_platsPoisson">
                    <h3>POISSON</h3>
                    <?php foreach ($arrayDishesPlatsPoisson as $dishesPlatsPoisson) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesPlatsPoisson->dishes_name ?></strong><i><?= is_float($dishesPlatsPoisson->dishes_price) ? str_replace('.', '€', $dishesPlatsPoisson->dishes_price) : $dishesPlatsPoisson->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesPlatsPoisson->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#hr_platsPoisson">
                                    <div align="center">
                                        <button id="btnDishesPlatsPoisson" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesPlatsPoisson->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
		</div>
            </div>
            <div class="row" id="desserts">
		<div class="col-md-12">
                    <h2>DESSERTS</h2>
                    <p><br></p>
                    <?php foreach ($arrayDishesDessert as $dishesDessert) { ?>
                        <div>
                            <div>
                                <p>
                                    <strong><?= $dishesDessert->dishes_name ?></strong><i><?= is_float($dishesDessert->dishes_price) ? str_replace('.', '€', $dishesDessert->dishes_price) : $dishesDessert->dishes_price . '€00'; ?></i>
                                    <br><?= $dishesDessert->dishes_description ?>
                                </p>
                                <form method="post" action="./index.php#desserts">
                                    <div align="center">
                                        <button id="btnDishesDessert" name="addOnCart" class="addProduct btn btn-light btn-block" value="<?= $dishesDessert->dishes_id ?>">Ajouter au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                            <p>Réservation n°<?= $reservation->reservation_id ?> enregistrer au nom de <?= $reservation->reservation_lastname ?> <?= $reservation->reservation_firstname ?> le <?= $reservation->reservation_dateResa ?> à <?= $reservation->reservation_hourResa ?>.</p>
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
                                            <label for="inputLastnameResa">Nom&nbsp;
                                                <span class="red-text">* <?= isset($arrayError['lastnameResaErr']) ? $arrayError['lastnameResaErr'] : ''; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6" id="inputLastnameWidth">
                                            <input type="text" name="inputLastnameResa" class="form-control" id="inputLastnameResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_lastname : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="col-12 col-md-6" id="labelFirstnameWidth">
                                            <label for="inputFirstnameResa">Prénom&nbsp;
                                                <span class="red-text">* <?= isset($arrayError['firstnameResaErr']) ? $arrayError['firstnameResaErr'] : ''; ?></span>
                                            </label>
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
                                            <label for="inputTelResa">Numéro&nbsp;de&nbsp;téléphone&nbsp;
                                                <span class="red-text">* <?= isset($arrayError['telResaErr']) ? $arrayError['telResaErr'] : ''; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-6" id="inputTelResaWidth">
                                            <input type="text" name="inputTelResa" class="form-control" id="inputTelResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_numTel : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="col-12 col-md-6" id="labelMailWidth">
                                            <label for="inputMailResa">Adresse&nbsp;e-mail&nbsp;
                                                <span class="red-text">* <?= isset($arrayError['mailResaErr']) ? $arrayError['mailResaErr'] : ''; ?></span>
                                            </label>
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
                                            <label for="inputDateResa">Jour&nbsp;de&nbsp;réservation&nbsp;
                                                <span class="red-text">* <?= isset($arrayError['dateResaErr']) ? $arrayError['dateResaErr'] : ''; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-6" id="inputDateResaWidth">
                                            <input class="form-control" type="date" name="inputDateResa" id="inputDateResa" min="<?= $today ?>" max="<?= $oneDateLater ?>" value="<?= isset($_POST['inputDateResa']) ? $_POST['inputDateResa'] : '' ?>" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="col-12 col-md-6" id="labelHourResaWidth">
                                            <label for="selectHourResa">Heure&nbsp;de&nbsp;réservation
                                                <span class="red-text">* <?= isset($arrayError['hourResaErr']) ? $arrayError['hourResaErr'] : ''; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-6" id="selectHourResaWidth">
                                            <select class="form-control" id="selectHourResa" name="selectHourResa">
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
                                </p>
                            </div>
                            <div class="row" id="resaLigne4">
                                <p>
                                    <div class="col-12 col-md-6">
                                        <div class="col-12 col-md-6" id="labelNbPersResaWidth">
                                            <label for="inputNbPersResa">Nombre&nbsp;de&nbsp;personnes&nbsp;
                                                <span class="amber-text">*</span>
                                                <span class="red-text">* <?= isset($arrayError['nbPersResaErr']) ? $arrayError['nbPersResaErr'] : ''; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-6" id="inputNbPersResaWidth">
                                            <input type="text" name="inputNbPersResa" class="form-control" id="inputNbPersResa" value="<?= count($arrayError) != 0 ? $resaOBJ->reservation_hourResa : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="col-12 col-md-6" id="labelNumTableWidth">
                                            <label for="selectNumTable">Numéro&nbsp;de&nbsp;table
                                                <span class="red-text">* <?= isset($arrayError['numTableErr']) ? $arrayError['numTableErr'] : ''; ?></span>
                                            </label>
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