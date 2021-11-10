<?php
    // on démarre la session
    session_start();
    require_once 'config.php';

    //On verifie que les info existent
    if(isset($_POST['email']) && isset($_POST['password'])){
        //on définie des fonction en utilisant htmlspecialchar() pour éviter une faille SQL
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        //on vérifie que les information existent dans la base de donnée
        //On définit la requête SQL
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        //On execute la requête SQL
        $check->execute(array($email));
        //On récupère les données renvoyé par la requête
        $data = $check->fetch();
        //On vérifie le nombre de lignes renvoyé par la requête
        $row = $check->rowCount();

        if($row == 1){
            //On verifie que l'adresse est valide
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                //On hash le mot de passe pour plus de sécurité
                $password = hash('sha256', $password);

                //On verifie que le mot de passe est correspondant à celui dans la base de donnée ===
                if($data['password'] === $password){
                    //Les vérif sont effectué, on créer la session de l'utilisateur
                    $_SESSION['user'] = $data['pseudo'];
                    header('Location:landing.php');
                }
                else{
                    header('Location:connexion.php?login_err=password');
                }
            }
            else{
                header('Location:connexion.php?login_err=email');
            }
        }
        else{
            header('Location:connexion.php?login_err=already');
        }
    }
    else{
        header('Location:connexion.php');
    }
?>