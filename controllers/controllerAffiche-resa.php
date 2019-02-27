<?php
    require_once '../models/database.php';
    require_once '../models/modelResa.php';
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $idResaExist = false;
    $resaOBJ = new reservation();
    if(isset($_GET['idResa'])){
    	$resaOBJ->reservation_id = $_GET['idResa'];
    	if (!$resaOBJ->displayResa()) {
            $idResaExist = false;
    	} else {
            $resa = $resaOBJ->displayResa();
            $idResaExist = true;
    	}
    }
    //$arrayPatientRDV = $appointmentsOBJ->listAppointmentsByPatients();
?>