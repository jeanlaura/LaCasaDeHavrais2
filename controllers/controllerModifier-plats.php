<?php
    require_once '../models/database.php';
    require_once '../models/modelPlats.php';
    // Instanciation de l'objet Hospital contenant les méthodes utilisées
    $dishesOBJ = new dishes();
    if (isset($_GET['id'])) {
        $dishesOBJ->dishes_id = $_GET['id'];
        $dishes = $dishesOBJ->displayDishes();
    }
    $arrayCat = $dishesOBJ->listCat(); //Tableau qui reprend la liste des catégories
    $arraySousCat = $dishesOBJ->listSubCat(); //Tableau qui reprend la liste des sous-catégories
    $updateSuccess = false;

    // variable de récupération d'erreurs
    $arrayError = [];
    // Test des champs obligatoires
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // regex utilisées pour le contrôle de saisie
        $patternTxt = '/^[a-zA-ZÀ-ÿ œ\'-.,!]*$/';
        $patternPrice = '/^[0-9€0-9]*$/';
        //$patternName = '/^[a-zA-ZÀ-ÿ \'-]*$/';
        //$patternPhone = '/^0[0-9]([ .-]?[0-9]{2}){4}$/';
        //$patternBirthdate = '/^([0-2][0-9]|[0-1])(\/)(((0)[0-9])|([0-2]))(\/)\d{4}$/';
        
        // contrôle de saisie
        // NOM
        if (empty($_POST['inputNameDishes'])) {
            $arrayError['nameDishiesErr'] = 'Le nom est requis';
        } else {
            $dishesOBJ->dishes_name = test_input($_POST['inputNameDishes']);
            // vérifie si le champs contient des lettres et de la ponctuation
            if (!preg_match($patternTxt, $dishesOBJ->dishes_name)) {
                $arrayError['nameDishiesErr'] = 'Caractères incorrects';
            } else {
                unset($arrayError['nameDishiesErr']);
            }
        }
        // PRIX
        if (empty($_POST['inputPrice'])) {
            $arrayError['priceErr'] = 'Le prix est requis';
        } else {
            $dishesOBJ->dishes_price = test_input($_POST['inputPrice']);
            // vérifie si le champs contient des lettres et de la ponctuation
            if (!preg_match($patternPrice, $dishesOBJ->dishes_price)) {
                $arrayError['priceErr'] = 'Caractères incorrects.';
            } else {
                unset($arrayError['priceErr']);
            }
        }
        // DESCRIPTION
        if (empty($_POST['inputDesc'])) {
            $arrayError['descErr'] = 'La date de naissance est requise';
        } else {
            $dishesOBJ->dishes_description = test_input($_POST['inputDesc']);
            // vérifie si le champs contient une date de naissance plausible
            if (!preg_match($patternTxt,$dishesOBJ->dishes_description)) {
                $arrayError['descErr'] = 'Caractères invalide.';
            } else {
                unset($arrayError['descErr']);
            }
        }
        // CATEGORIES
        if (empty($_POST['selectCat'])) {
            $arrayError['catErr'] = 'L\'email est requis';
        } else {
            $dishesOBJ->categories_id = test_input($_POST['selectCat']);
        }
        // SOUS-CATEGORIES
        if (empty($_POST['selectSubCat'])) {
            $arrayError['subCatErr'] = 'Le téléphone est requis.';
        } else {
            $dishesOBJ->subCategories_id = test_input($_POST['selectSubCat']);
        }
        // VALIDER
        if (isset($_REQUEST['submit']) && count($arrayError) == 0) {
            $dishesOBJ->ModifyDishes();
            $updateSuccess = true;
        }
    }

    // fonction de sécurisation de la saisie, injection de code, espaces et antislashs
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // Exercice 3
    /*if(isset($_GET('id')==))){
        
    }*/
?>