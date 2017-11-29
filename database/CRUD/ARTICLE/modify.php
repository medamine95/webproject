<?php
$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');

$sql = "UPDATE article SET nom= '".$_GET['title']."'
,description = '".$_GET['description']."' ,categorie='".$_GET['categorie']."'
WHERE id = '".$_GET['id']."'";
//$sql = "INSERT INTO article (nom,description,categorie) VALUES ('".$_GET['title']."','".$_GET['description']."','".$_GET['categorie']."')";
  
$result = $db->prepare($sql);
$result->execute();
$sql = "SELECT * FROM article WHERE id='".$_GET['id']."'"; 
$result = $db->prepare($sql);
$result->execute();
$data = $result->fetch();
//$name = $data['nom'];

echo json_encode($data);
//header("refresh:0;url=../../adminpanel/article.php");
?>