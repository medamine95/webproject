<?php
$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');
//$id  = $_GET["id"];


  $sql = "INSERT INTO article (nom,description,categorie) 

	VALUES ('".$_GET['title']."','".$_GET['description']."','".$_GET['categorie']."')";

$result = $db->prepare($sql);
$result->execute();
$sql = "SELECT * FROM article Order by id desc LIMIT 1"; 
$result = $db->prepare($sql);
$result->execute();
$data = $result->fetch();
//$name = $data['nom'];

echo json_encode($data);
//header("refresh:0;url=../../adminpanel/article.php");
?>