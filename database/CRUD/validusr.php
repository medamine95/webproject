<?php

$id  = $_GET["id"];

$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');


$getUsers = $db->prepare("UPDATE users SET state = 'approved' WHERE id = '".$id."'");
$getUsers->execute();


$getUsers = $db->prepare("SELECT nom,prenom FROM users WHERE id = '".$id."'");
$getUsers->execute();
$result = $getUsers->fetch();
$lastname = $result['nom'];
$name = $result['prenom'];
 echo json_encode($lastname." ".$name);
 

?>