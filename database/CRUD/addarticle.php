<?php
$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');
//$id  = $_GET["id"];

  $sql = "INSERT INTO article (nom,description,categorie) 

	VALUES ('".$_POST['title']."','".$_POST['description']."','".$_POST['categorie']."')";

$result = $db->prepare($sql);
$result->execute();
$sql = "SELECT * FROM items Order by id desc LIMIT 1"; 
$result = $db->prepare($sql);
$result->execute();
$data = $result->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);

?>