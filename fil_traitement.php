<?php
    session_start();
    require_once 'config.php';
    if(!isset($_SESSION['user'])){
        header('Location:connexion.php');
    }
    $pseudo = $_SESSION['user'];
    $message = $_POST['message_poster'];
    $req_ajout = $bdd->prepare('INSERT INTO messages(pseudo_auteur, contenue) VALUES(?,?)');
    $req_ajout->execute(array($pseudo,$message));
    header('Location:landing.php');
?>