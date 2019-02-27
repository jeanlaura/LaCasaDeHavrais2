<?php
    require_once '../models/database.php';
    require_once '../models/modelPlats.php';
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $idPlatExist = false;
    $dishesOBJ = new dishes();
    if(isset($_GET['id'])){
    	$dishesOBJ->dishes_id = $_GET['id'];
    	if (!$dishesOBJ->displayDishes()) {
            $idPlatExist = false;
    	} else {
            $dishes = $dishesOBJ->displayDishes();
            $idPlatExist = true;
    	}
    }
    //$arrayPatientRDV = $appointmentsOBJ->listAppointmentsByPatients();
?>