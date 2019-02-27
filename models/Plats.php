<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plats
 *
 * @author pc1
 */
class Plats extends database{
    
    private $id;
    
    private $name;
    
    private $description;
    
    private $price;
    
    public function __construct($id = false) {
        if($id) {
            $req = $this->database->prepare('SELECT * FROM lcdh_dishes');
            $req->execute();
            if($req->rowCount() > 0) {
                $fetch = $req->fetch(PDO::FETCH_OBJ);
                $this->id = $fetch->dishes_id;
                $this->name = $fetch->dishes_name;
            }
        }
    }
    
    public function getPlats($order = false, $limit = false) {
        $order = $order ? ' ' . $order : '';
        $limit = $limit ? ' LIMIT ' . $limit : '';
        $req = $this->database->prepare('SELECT dishes_id FROM lcdh_dishes' . $order . $limit);
        $req->execute();
        $dishes = [];
        while($dish = $req->fetch(PDO::FETCH_OBJ)) {
            $dishes[] = new Plats($dish->dishes_id);
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getCategory() {
        return new CategoryPlats($this->categories_id);
    }
    
    public function getPrice() {
        if(is_float($this->price)) {
            return str_replace('.', '€', $this->price);
        }
        return $this->price . '€00';
    }
}

$plats = new Plats();
$dishes = $plats->getPlats('ORDER BY id DESC');


foreach($dishes as $dish) {
    echo $dish->getId();
    echo $dish->getPrice();
    echo $dish->getCategory()->getName();
}

