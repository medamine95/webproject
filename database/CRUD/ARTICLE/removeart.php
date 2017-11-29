<?php

$id  = $_GET["id"];

$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');

$getUsers = $db->prepare("SELECT * FROM article WHERE id = '".$id."'");
$getUsers->execute();
$result = $getUsers->fetch();
 echo json_encode($result);

$getUsers = $db->prepare("DELETE FROM article WHERE id = '".$id."'");
$getUsers->execute();




?>