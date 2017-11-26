<?php
session_start();

$errors = array();
//connection a la base

$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');


//si le button est cliqué 

if (isset($_POST['register'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $login=$_POST['login'];
    $password=$_POST['password'];

    
    //validation 
    if(empty($login))
    {
        array_push($errors,"Entrez votre login!");

    }
    if(empty($password))
    {
        array_push($errors,"Entrez votre mot de passe!");

    }
    if(empty($email))
    {
        array_push($errors,"Entrez votre email!");

    }
    if(empty($nom))
    {
        array_push($errors,"Entrez votre nom !");

    }
    if(empty($prenom))
    {
        array_push($errors,"Entrez votre prenom !");

    }
    //inscription
    if(count($errors)==0){
        $password=md5($password);
        $sql="INSERT INTO users(nom,prenom,email,login,pwd) VALUES(:nom,:prenom,:email,:login,:password)";
        $req = $db->prepare($sql);
        $req->execute(array(
                "nom" => $nom, 
                "prenom" => $prenom,
                "email" => $email,
                "login" => $login,
                "password"=>$password,
                ));
                $records2= $db->prepare('SELECT login,pwd,state FROM users WHERE login = :login');
                $records2->execute(array(
                    ':login' => $login
                    ));
                $data = $records2->fetch(PDO::FETCH_ASSOC);  
        $_SESSION['state'] = $data['state'];              
        $_SESSION['login'] = $login;
        $_SESSION['sucess']="Felicitations $login Vous etes maintenant connecté ";
        header('location:../index.php');
    }
}


?>