<?php
    require_once '../models/database.php';
    require_once '../models/modelResa.php';
    
    // Instanciation de l'objet Réservation contenant les méthodes utilisées
    $resaOBJ = new reservation();
    $resa = $resaOBJ->listResa(); //Tableau qui reprend la liste des réservations
    $success = true;
    if (isset($_GET['idResa'])) {
        $resaOBJ->reservation_id = $_GET['idResa']; //Récupère id initialisé comme idResa
        if($resaOBJ->deleteResa()){//Suppression du rdv
            $success;
        }
    }
?>