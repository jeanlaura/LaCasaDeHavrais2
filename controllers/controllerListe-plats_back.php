<?php
    require_once '../models/database.php';
    require_once '../models/modelPlats.php';
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $dishesOBJ = new dishes();
    
    //TOUS
    $arrayDishes = $dishesOBJ->listDishes();
?>