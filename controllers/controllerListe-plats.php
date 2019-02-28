<?php
    $_SESSION['cart'] = !isset($_SESSION['cart']) ? [] : $_SESSION['cart'];
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
    
    if(isset($_POST['addOnCart'])){
        //var_dump($_POST['addOnCart']);
        if($dishesOBJ->getDish($_POST['addOnCart'])) {
            $_SESSION['cart'][] = $_POST['addOnCart'];
        }
    }
?>