<?php
    require_once '../models/database.php';
    require_once '../models/modelPlats.php';
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $dishesOBJ = new dishes();
    
    //TOUS
    if(isset($_POST['search'])){
        $arrayDishes = $dishesOBJ->searchDishes($_POST['inputSearchNavAdminDishes']);
    }else{
        $arrayDishes = $dishesOBJ->listDishes();
    }
    
?>