<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryPlats
 *
 * @author pc1
 */
class CategoryPlats {
    //put your code here
    private $id;
    
    private $name;
    
    public function __construct($id = false) {
        if($id) {
            $req = $this->database->prepare('SELECT * FROM lcdh_categories');
            $req->execute();
            if($req->rowCount() > 0) {
                $fetch = $req->fetch(PDO::FETCH_OBJ);
                $this->id = $fetch->categories_id;
                $this->name = $fetch->categories_name;
            }
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
}
