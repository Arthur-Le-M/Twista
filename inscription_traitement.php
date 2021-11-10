<?php 
    // on se connecte à la base de données
    require_once 'config.php';

    //On vérifie que toute les information sont renseignées
    if(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_retype']) && isset($_POST['date_naissance']) && isset($_POST['sexe'])){
        //on définie des fonction en utilisant htmlspecialchar() pour éviter une faille SQL
        $email = htmlspecialchars($_POST['email']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $date_naissance = $_POST['date_naissance'];
        $sexe = $_POST['sexe'];

        //On vérifie si les informations existent déjà dans la base de données
        //On définit la requête SQL
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        //On execute la requête SQL
        $check->execute(array($email));
        //On récupère les données renvoyé par la requête
        $data = $check->fetch();
        //On vérifie le nombre de lignes renvoyé par la requête
        $row = $check->rowCount();

        if($row == 0){
            //On vérifie que l'utilisateur à plus de 13 ans
            if(age($date_naissance) > 13){
                //On vérifie que le pseudo contient moins de 100 caractères
                if(strlen($pseudo) <= 100){
                    //On vérifie que l'email contient moins de 100 caractères
                    if(strlen($email) <= 100){
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            //On vérifie que les deux password tapés correspondent
                            if($password == $password_retype){
                                //On hash le mot de passe
                                $password = hash('sha256', $password);
                                //On récupère l'IP
                                $ip = $_SERVER['REMOTE_ADDR'];;
                                //On définit la requête SQL d'insertion
                                $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, ip, date_inscription, date_naissance, sexe) VALUES(?, ?, ?, ?, NOW(), ?,?)');
                                //On execute la requête SQL à l'aide d'un tableau associatif
                                $insert->execute(array($pseudo, $email, $password, $ip, $date_naissance, $sexe));
                                $insert->closeCursor();
                                //l'insertion est réussi on renvoie un message de succès
                                header('Location:inscription.php?reg_err=success');
                            }
                            else{
                                header('Location:inscription.php?reg_err=password');
                            }
                        }
                        else{
                            header('Location:inscription.php?reg_err=email');
                        }

                    }
                    else{
                        header('Location:inscription.php?reg_err=email_len');
                    }
                }
                else{
                    header('Location:inscription.php?reg_err=pseudo_len');
                }
            }
            else{
                header("Location:inscription.php?reg_err=age");
            }

        }
        else{
            header('Location:inscription.php?reg_err=already');
        }
    }
?>
<?php 
function age($date) { 
    $age = date('Y') - $date; 
   if (date('md') < date('md', strtotime($date))) { 
       return $age - 1; 
   } 
   return $age;
}
   ?>