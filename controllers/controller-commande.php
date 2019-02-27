<?php
    require_once 'models/database.php';
    require_once 'models/modelResa.php';
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $resaOBJ = new reservation();
    $addResaSuccess = false;
    
    $today = date('Y-m-d'); // variable servant à initialiser le calendrier à la date du jour
    $oneDateLater = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 month')); // variable servant à délimiter la fin du calendrier
    // variable de récupération d'erreurs
    $arrayError = [];
    // Test des champs obligatoires
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // regex utilisées pour le contrôle de saisie
        $patternTxt = '/^[a-zA-ZÀ-ÿ œ\'-.,]*$/';
        //$patternPrice = '/^[0-9€0-9]*$/';
        $patternPhone = '/^0[0-9]([ .-]?[0-9]{2}){4}$/';
        $patternDate = '/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/';
        $patternHour = '/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/';
        $patternNbPers = '/^[0-6]$/';
        $patternMail = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/'; 
        // contrôle de saisie
        // NOM
        if (empty($_POST['inputLastnameResa'])) {
            $arrayError['lastnameResaErr'] = 'Le nom pour la réservation est requis.';
        } else {
            $resaOBJ->reservation_lastname = test_input($_POST['inputLastnameResa']);
            // vérifie si le champs contient des lettres et de la ponctuation
            if (!preg_match($patternTxt, $resaOBJ->reservation_lastname)) {
                $arrayError['lastnameResaErr'] = 'Caractères incorrects, ex : DOE.';
            } else {
                unset($arrayError['lastnameResaErr']);
            }
        }
        // PRENOM
        if (empty($_POST['inputFirstnameResa'])) {
            $arrayError['firstnameResaErr'] = 'Le prénom pour la réservation est requis.';
        } else {
            $resaOBJ->reservation_firstname = test_input($_POST['inputFirstnameResa']);
            // vérifie si le champs contient des lettres et de la ponctuation
            if (!preg_match($patternTxt, $resaOBJ->reservation_firstname)) {
                $arrayError['firstnameResaErr'] = 'Caractères incorrects, ex : Jane.';
            } else {
                unset($arrayError['firstnameResaErr']);
            }
        }
        // TELEPHONE
        if (empty($_POST['inputTelResa'])) {
            $arrayError['telResaErr'] = 'Le numéro de téléphone est requis.';
        } else {
            $resaOBJ->reservation_numTel = test_input($_POST['inputTelResa']);
            // vérifie si le champs contient un numéro de téléphone
            if (!preg_match($patternPhone, $resaOBJ->reservation_numTel)) {
                $arrayError['telResaErr'] = 'Format de téléphone invalide, ex : 0607080910.';
            } else {
                unset($arrayError['telResaErr']);
            }
        }
        // MAIL
        if (empty($_POST['inputMailResa'])) {
            $arrayError['mailResaErr'] = 'Le mail est requis.';
        } else {
            $resaOBJ->reservation_mail = test_input($_POST['inputMailResa']);
            // vérifie si le champs contient un email
            if (!preg_match($patternMail, $resaOBJ->reservation_mail)) {
                $arrayError['mailResaErr'] = 'Format de mail invalide, ex : mail@mail.com.';
            } else {
                unset($arrayError['mailResaErr']);
            }
        }
        // DATE
        if (empty($_POST['inputDateResa']) || $_POST['inputDateResa'] < $today) {
            $arrayError['dateResaErr'] = 'Le jour de réservation est requis.';
        } else {
            $resaOBJ->reservation_dateResa = test_input($_POST['inputDateResa']);
            // vérifie si le champs contient une date
            if (preg_match($patternDate, $resaOBJ->reservation_dateResa)) {
                unset($arrayError['dateResaErr']);
            }
        }
        // HEURE
        if (empty($_POST['selectHourResa'])) {
            $arrayError['hourResaErr'] = 'L\'heure est requise.';
        } else {
            $resaOBJ->reservation_hourResa = $_POST['selectHourResa'];
            unset($arrayError['hourResaErr']);
        }
        // NOMBRE DE PERSONNE
        if (empty($_POST['inputNbPersResa'])) {
            $arrayError['nbPersResaErr'] = 'Le nombre de personne est requis.';
        } else {
            $resaOBJ->reservation_nbPers = test_input($_POST['inputNbPersResa']);
            // vérifie si le champs contient un nombre de personne
            if (!preg_match($patternNbPers, $resaOBJ->reservation_nbPers)) {
                $arrayError['nbPersResaErr'] = 'Format invalide, ex : 1. Il ne peut y avoir que jusqu\'à 6 personnes, au delà, merci d\'appeler le restaurant pour prendre la réservation.';
            } else {
                unset($arrayError['nbPersResaErr']);
            }
        }
        // NUMERO DE TABLE
        if (empty($_POST['selectNumTable'])) {
            $arrayError['numTableErr'] = 'Le numéro de la table est requis.';
        } else {
            $resaOBJ->tables_id = test_input($_POST['selectNumTable']);
            unset($arrayError['numTableErr']);
        }
        // VALIDER
        if (isset($_POST['submitResa2']) && count($arrayError) == 0) {
            $resaOBJ->addResa();
            $addResaSuccess = true;
        }
    }

    // fonction de sécurisation de la saisie, injection de code, espaces et antislashs
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    //Récupérer les infos de la réservation
    $reservation = $resaOBJ->displayResaInformations();
?>