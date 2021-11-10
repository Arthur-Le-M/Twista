<?php
    require_once 'config.php';
    if (isset($_POST["email"])){
        //On définit dans un variable avec la fonction htmlspecialchar pour éviter une faille
        $email = htmlspecialchars($_POST['email']);
        //On va vérifier que l'email correspond à une ligne de la db
        $check = $bdd->prepare('SELECT pseudo FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        //fetch sont les ligne retourné par la requête
        $data = $check->fetch();
        //Rowcount nous renvoie le nombre de ligne dans data
        $row = $check->rowCount();
        if($row > 0){
            $token = uniqid();
            $url = "localhost/change_password.php?token=$token";
            $message = "Bonjour, vous avez demandez la réinitialisation de votre mot de passe, voici le lien pour changer votre mot de passe : $url";

            //On envoie un mail avec le message
            if(mail($_POST['email'], 'Réinitialisation de votre mot de passe', $message)){
                //On va update le token
                $req_majToken = $bdd->prepare("UPDATE utilisateurs SET token = ? WHERE email = ?");
                $req_majToken->execute(array($token, $_POST['email']));
            }
            

        }
        else{
            header('Location:forgotPassword.php?forgot_password_err=mail');
        }
    }
    else{
        header('Location:forgotPassword.php?forgot_password_err=empty');
    }
    
?>