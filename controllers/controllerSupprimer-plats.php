<?php
    require_once '../models/database.php';
    require_once '../models/modelPlats.php';
    
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $dishesOBJ = new dishes();
    $dishes = $dishesOBJ->listDishes(); //Tableau qui reprend la liste des rdvs
    $success = true;
    if (isset($_GET['idDishes'])) {
        $dishesOBJ->id = $_GET['idDishes']; //Récupère id initialisé comme idAppointments
        if($dishesOBJ->deleteDishes()){//Suppression du rdv
            $success;
        }
    }
?>