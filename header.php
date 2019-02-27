<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<link rel="stylesheet" href="../css/styles.css" />
	<link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/mdb.css" />
        <link rel="stylesheet" href="../css/mdb.min.css" />
        <link rel="stylesheet" href="../css/mdb.lite.css" />
        <link rel="stylesheet" href="../css/mdb.lite.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee+Shade" />
	<title>LA CASA DE HAVRAIS</title>
    </head>
    <body>
        <nav id="navOrdi" class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark justify-content-between">
            <div class="navbar-header">
		<a class="navbar-brand" href="#accueil"><img src="../img/logo.png" alt="" width="250" height=""></a>
                <button class="navbar-toggler" id="navbarButtonResponsive" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
		</button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="nav_link1" href="#carte">Carte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav_link1" href="#menus">Menus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav_link2" href="#reservation">Réservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav_link3" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <button id="buttonOpenCart" type="button" class="btn" data-toggle="modal" data-target="#modalCart">Panier</button>
                    </li>
                </ul>
            </div>
	</nav>
        <nav id="navResp" class="navbar navbar-expand-lg fixed-bottom navbar-dark bg-dark justify-content-between" style="display: none;">
            <div class="" id="navbarSupportedContent">
		<ul class="ml-auto list-inline">
                    <li class="nav-item list-inline-item">
                        <a class="nav-link" id="nav_link1" href="#carte"><img id="imgNavRespCarte" src="../img/navbarResp/carte.png" /></a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link" id="nav_link1" href="#menus"><img id="imgNavRespMenus" src="../img/navbarResp/menus.png" /></a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link" id="nav_link2" href="#reservation"><img id="imgNavRespResa" src="../img/navbarResp/reservation.png" /></a>
                    </li>
                    <li class="nav-item list-inline-item">
                        <a class="nav-link" id="nav_link3" href="#contact"><img id="imgNavRespcontact" src="../img/navbarResp/contact.png" /></a>
                    </li>
                    <li class="nav-item list-inline-item" id="navPanier">
                        <button id="buttonOpenCart" type="button" class="btn" data-toggle="modal" data-target="#modalCart">
                            <img id="imgNavRespPanier" src="../img/navbarResp/panier.png" />
                            <?php if(isset($_SESSION['totalCart'])){ ?>
                                <span class="badge badge-pill badge-danger"><?= $_SESSION['totalCart'] ?></span>
                            <?php } ?>
                        </button>
                    </li>
                </ul>
            </div>
	</nav>