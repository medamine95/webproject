<?php

$id  = $_GET["id"];

$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');

$getUsers = $db->prepare("DELETE FROM users WHERE id = '".$id."'");
$getUsers->execute();


 echo json_encode([$id]);


?>