<?php
require '../../models/database.php';

$db = new database();
$req = $db->database->prepare('SELECT * FROM lcdh_dishes');
$req->execute();
echo json_encode($req->fetchAll());
    
    ?>