<?php
    class dishes extends database {
        // champs de la table patients
        public $dishes_id;
        public $dishes_name;
        public $dishes_description;
        public $dishes_price;
        public $categories_id;
        public $subCategories_id;
        /**
         * Méthode permettant d'ajouter un patient
         * @return exécute la requête pour ajouter un patient
         */
        function addDishes() {
            // Ajouter un plat
            $sql = $this->database->prepare('INSERT INTO `lcdh_dishes` (`dishes_name`, `dishes_description`, `dishes_price`, `categories_id`, `subCategories_id`) VALUES (:name, :description, :price, :categories, :sub_categories)');
            $sql->bindValue(':name',$this->dishes_name,PDO::PARAM_STR);
            $sql->bindValue(':description',$this->dishes_description,PDO::PARAM_STR);
            $sql->bindValue(':price',$this->dishes_price,PDO::PARAM_STR);
            $sql->bindValue(':categories',$this->categories_id,PDO::PARAM_INT);
            $sql->bindValue(':sub_categories',$this->subCategories_id,PDO::PARAM_INT);
            return $sql->execute();
        }
        // Liste des plats au total
        function listDishes() {
            $sql = $this->database->query('
                SELECT `dishes_id`, `dishes_name` AS Plats, `dishes_description` AS Description, `dishes_price` AS Prix, `categories_name` AS Categories, `subcategories_name` AS SousCategories FROM `lcdh_dishes`
                INNER JOIN `lcdh_categories` ON `lcdh_categories`.`categories_id` = `lcdh_dishes`.`categories_id`
                INNER JOIN `lcdh_subcategories` ON `lcdh_subcategories`.`subcategories_id` = `lcdh_dishes`.`subcategories_id` 
            ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        //ENTREES
        // Liste des plats en entrées
        function listDishesEntrees() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "1" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et vege
        function listDishesEntreesVege() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "1" AND `subcategories_id` = "1" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et viande
        function listDishesEntreesViande() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "1" AND `subcategories_id` = "2" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et volaille
        function listDishesEntreesVolaille() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "1" AND `subcategories_id` = "3" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et poisson
        function listDishesEntreesPoisson() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "1" AND `subcategories_id` = "4" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        //PLATS
        // Liste des plats en plats
        function listDishesPlats() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "2" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et vege
        function listDishesPlatsVege() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "2" AND `subcategories_id` = "1" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et viande
        function listDishesPlatsViande() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "2" AND `subcategories_id` = "2" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et volaille
        function listDishesPlatsVolaille() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "2" AND `subcategories_id` = "3" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        // Liste des plats en entrées et poisson
        function listDishesPlatsPoisson() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "2" AND `subcategories_id` = "4" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        //DESSERTS
        // Liste des plats en desserts
        function listDishesDesserts() {
            $sql = $this->database->query('SELECT * FROM `lcdh_dishes` WHERE `categories_id` = "3" ');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        //Liste de catégories
        function listCat() {
            $sql = $this->database->query('SELECT * FROM `lcdh_categories`');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        //Liste de sous-catégories
        function listSubCat() {
            $sql = $this->database->query('SELECT * FROM `lcdh_subCategories`');
            $result = $sql->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        // Montrer un seul plat mais je ne m'en servirais surement pas !
        function displayDishes() {
            $sql = $this->database->prepare('SELECT * FROM `lcdh_dishes` WHERE `dishes_id` = :id');
            $sql->bindValue(':id', $this->dishes_id, PDO::PARAM_INT);
            $sql->execute();
            $data = $sql->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        // Modifier le plat
        function ModifyDishes() {
            $sql = $this->database->prepare('UPDATE `lcdh_dishes` SET `dishes_name`=:name, `dishes_description`=:description, `dishes_price`=:price, `categories_id`=:categories, `subCategories_id`=:sub_categories WHERE `dishes_id` = :id');
            $sql->bindValue(':id', $this->dishes_id, PDO::PARAM_INT);
            $sql->bindValue(':name',$this->dishes_name,PDO::PARAM_STR);
            $sql->bindValue(':description',$this->dishes_description,PDO::PARAM_STR);
            $sql->bindValue(':price',$this->dishes_price,PDO::PARAM_STR);
            $sql->bindValue(':categories',$this->categories_id,PDO::PARAM_INT);
            $sql->bindValue(':sub_categories',$this->subCategories_id,PDO::PARAM_INT);
            return $sql->execute();
        }
        //Suppression du plat
        function deleteDishes() {
            $sql = $this->database->prepare('DELETE FROM `lcdh_dishes` WHERE `dishes_id` = :id');
            $sql->bindValue(':id', $this->dishes_id, PDO::PARAM_INT);
            return $sql->execute();
        }
    }
?>

