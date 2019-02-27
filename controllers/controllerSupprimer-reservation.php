<?php
    require_once '../models/database.php';
    require_once '../models/modelResa.php';
    
    // Instanciation de l'objet Réservation contenant les méthodes utilisées
    $resaOBJ = new reservation();
    $resa = $resaOBJ->listResa(); //Tableau qui reprend la liste des rdvs
    $success = true;
    if (isset($_GET['idResa'])) {
        $resaOBJ->id = $_GET['idResa']; //Récupère id initialisé comme idAppointments
        if($resaOBJ->deleteResa()){//Suppression du rdv
            $success;
        }
    }
?>