<?php
    class customers extends database {
        // champs de la table patients
        public $customers_id;
        public $customers_lastname;
        public $customers_firstname;
        public $customers_mail;
        public $customers_phone;
        public $customers_readyHour;
        public $customersToDishes_quantity;
        public $dishes_id;
        /**
         * Méthode permettant d'ajouter un patient
         * @return exécute la requête pour ajouter un patient
         */
        function addResa() {
            // Ajouter une réservation
            $sql = $this->database->prepare('
                    INSERT INTO `lcdh_customers` (`customers_lastname`, `customers_firstname`, `customers_mail`, `customers_phone`, `customers_readyHour`, `customersToDishes_quantity`, `dishes_id`)
                    VALUES (:lastnameCusto, :firstnameCusto, :mailCusto, :phoneCusto, :readyHourCusto, :customersToDishes_quantity, :dishes_id)
                    INNER JOIN `lcdh_customers` ON `lcdh_customers`.`customers_id` = `lcdh_customerstodishes`.`customers_id`
                ');
            $sql->bindValue(':lastnameCusto',$this->customers_lastname,PDO::PARAM_STR);
            $sql->bindValue(':firstnameCusto',$this->customers_firstname,PDO::PARAM_STR);
            $sql->bindValue(':mailCusto',$this->customers_mail,PDO::PARAM_STR);
            $sql->bindValue(':phoneCusto',$this->customers_phone,PDO::PARAM_STR);
            $sql->bindValue(':readyHourCusto',$this->customers_readyHour,PDO::PARAM_STR);
            $sql->bindValue(':$customersToDishes_quantity',$this->customersToDishes_quantity,PDO::PARAM_INT);
            $sql->bindValue(':dishes_id',$this->dishes_id,PDO::PARAM_INT);
            return $sql->execute();
        }
        // Liste des réservation au total
        function listCusto() {
            $sql = $this->database->query('
                SELECT `customers_id`, `customers_lastname`, `customers_firstname`, `customers_mail`, `customers_phone`, `customers_readyHour`, `customersToDishes_quantity`, `dishes_id`
                FROM `lcdh_customers`
                INNER JOIN `lcdh_customers` ON `lcdh_customers`.`$customers_id` = `lcdh_customerstodishes`.`$customers_id`
            ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }        
        // Montrer une seule réservation
        function displayResa() {
            $sql = $this->database->prepare('SELECT * FROM `lcdh_reservation` WHERE `reservation_id` = :id');
            $sql->bindValue(':id', $this->reservation_id, PDO::PARAM_INT);
            $sql->execute();
            $data = $sql->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        // Montrer la réservation après l'envoi du formulaire et l'envoyer par mail
        function displayResaInformations() {
            $sql = $this->database->prepare('SELECT * FROM `lcdh_reservation` ORDER BY `reservation_id` DESC');
            $sql->execute();
            $data = $sql->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        
        // Modifier une réservation
        function ModifyResa() {
            $sql = $this->database->prepare('
                    UPDATE `lcdh_reservation`
                    SET `reservation_lastname`=:lastnameResa, `reservation_firstname`=:firstnameResa, `reservation_numTel`=:numTelResa, `reservation_mail`=:mailResa, `reservation_dateResa`=:dateResa, `reservation_hourResa`=:hourResa, `reservation_nbPers`=:nbPersResa, `tables_id`=:tables_id
                    WHERE `reservation_id` = :idResa
                ');
            $sql->bindValue(':idResa', $this->reservation_id, PDO::PARAM_INT);
            $sql->bindValue(':lastnameResa',$this->reservation_lastname,PDO::PARAM_STR);
            $sql->bindValue(':firstnameResa',$this->reservation_firstname,PDO::PARAM_STR);
            $sql->bindValue(':numTelResa',$this->reservation_numTel,PDO::PARAM_STR);
            $sql->bindValue(':mailResa',$this->reservation_mail,PDO::PARAM_STR);
            $sql->bindValue(':dateResa',$this->reservation_dateResa,PDO::PARAM_STR);
            $sql->bindValue(':hourResa',$this->reservation_hourResa,PDO::PARAM_STR);
            $sql->bindValue(':nbPersResa',$this->reservation_nbPers,PDO::PARAM_INT);
            $sql->bindValue(':tables_id',$this->reservation_tablesId,PDO::PARAM_INT);
            return $sql->execute();
        }
        //Suppression d'une réservation
        function deleteResa() {
            $sql = $this->database->prepare('DELETE FROM `lcdh_reservation` WHERE `reservation_id` = :idResa');
            $sql->bindValue(':idResa', $this->reservation_id, PDO::PARAM_INT);
            return $sql->execute();
        }
        //Recherche des plats
        function searchResa($search) {
            $sql = $this->database->prepare('SELECT * FROM `lcdh_reservation` WHERE `lastnameResa` LIKE :search OR `mailResa` LIKE :search OR `tables_id` LIKE :search');
            $sql->bindValue(':search', '%'.$search.'%', PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>

