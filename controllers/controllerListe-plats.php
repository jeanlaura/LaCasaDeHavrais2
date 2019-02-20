<?php
    require_once 'models/database.php';
    require_once 'models/modelPlats.php';
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $dishesOBJ = new dishes();
    
    //ENTREES
    $arrayDishesEntreesVege = $dishesOBJ->listDishesEntreesVege();
    $arrayDishesEntreesViande = $dishesOBJ->listDishesEntreesViande();
    $arrayDishesEntreesVolaille = $dishesOBJ->listDishesEntreesVolaille();
    $arrayDishesEntreesPoisson = $dishesOBJ->listDishesEntreesPoisson();
    
    //PLATS
    $arrayDishesPlatsVege = $dishesOBJ->listDishesPlatsVege();
    $arrayDishesPlatsViande = $dishesOBJ->listDishesPlatsViande();
    $arrayDishesPlatsVolaille = $dishesOBJ->listDishesPlatsVolaille();
    $arrayDishesPlatsPoisson = $dishesOBJ->listDishesPlatsPoisson();
    
    //DESSERTS
    $arrayDishesDessert = $dishesOBJ->listDishesDesserts();
?>