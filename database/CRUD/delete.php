<?php

$id  = $_GET["id"];

$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');
<<<<<<< HEAD
/*$getUsers = $db->prepare(select id FROM users WHERE id = '".$id."');
$getUsers->mysql_fetch_row();
echo $getUsers['id'];
*/
=======
>>>>>>> 3f418ea6f34719dbceec2ee367df498842445d84

$getUsers = $db->prepare("DELETE FROM users WHERE id = '".$id."'");
$getUsers->execute();


 echo json_encode([$id]);


?>