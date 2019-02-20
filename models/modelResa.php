<?php
    class reservation extends database {
        // champs de la table patients
        public $reservation_id;
        public $reservation_lastname;
        public $reservation_firstname;
        public $reservation_numTel;
        public $reservation_mail;
        public $reservation_dateResa;
        public $reservation_hourResa;
        public $reservation_nbPers;
        public $reservation_arrive;
        public $reservation_mailConfirm;
        public $reservation_smsConfirm;
        /**
         * Méthode permettant d'ajouter un patient
         * @return exécute la requête pour ajouter un patient
         */
        function addResa() {
            // Ajouter une réservation
            $sql = $this->database->prepare('
                    INSERT INTO `lcdh_reservation` (`reservation_lastname`, `reservation_firstname`, `reservation_numTel`, `reservation_mail`, `reservation_dateResa`, `reservation_hourResa`, `reservation_nbPers`)
                    VALUES (:lastnameResa, :firstnameResa, :numTelResa, :mailResa, :dateResa, :hourResa, :nbPersResa)
                ');
            $sql->bindValue(':lastnameResa',$this->reservation_lastname,PDO::PARAM_STR);
            $sql->bindValue(':firstnameResa',$this->reservation_firstname,PDO::PARAM_STR);
            $sql->bindValue(':numTelResa',$this->reservation_numTel,PDO::PARAM_STR);
            $sql->bindValue(':mailResa',$this->reservation_mail,PDO::PARAM_STR);
            $sql->bindValue(':dateResa',$this->reservation_dateResa,PDO::PARAM_STR);
            $sql->bindValue(':hourResa',$this->reservation_hourResa,PDO::PARAM_STR);
            $sql->bindValue(':nbPersResa',$this->reservation_nbPers,PDO::PARAM_INT);
            return $sql->execute();
        }
        // Liste des réservation au total
        function listResa() {
            $sql = $this->database->query('
                SELECT `reservation_id`, `reservation_lastname`, `reservation_firstname`, `reservation_numTel`, `reservation_mail`, `reservation_dateResa`, `reservation_hourResa`, `reservation_nbPers`
                FROM `lcdh_reservation`
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
                    SET `reservation_lastname`=:lastnameResa, `reservation_firstname`=:firstnameResa, `reservation_numTel`=:numTelResa, `reservation_mail`=:mailResa, `reservation_dateResa`=:dateResa, `reservation_hourResa`=:hourResa, `reservation_nbPers`=:nbPersResa
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
            return $sql->execute();
        }
        //Suppression d'une réservation
        function deleteDishes() {
            $sql = $this->database->prepare('DELETE FROM `lcdh_reservation` WHERE `reservation_id` = :idResa');
            $sql->bindValue(':idResa', $this->reservation_id, PDO::PARAM_INT);
            return $sql->execute();
        }
    }
?>

