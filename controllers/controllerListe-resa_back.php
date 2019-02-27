<?php
    require_once '../models/database.php';
    require_once '../models/modelResa.php';
    // Instanciation de l'objet Réservation contenant les méthodes utilisées
    $resaOBJ = new reservation();
    
    //TOUS
    if(isset($_POST['search'])){
        $arrayResa = $resaOBJ->searchResa($_POST['inputSearchNavAdminDishes']);
    }else{
        $arrayResa = $resaOBJ->listResa();
    }
    
?>