<?php
        require_once 'config.php';
        
        if(isset($_GET['token']) && $_GET['token'] != ''){
            //On récupère l'email du compte à partir du token
            $req_tok = $bdd->prepare('SELECT email FROM utilisateurs WHERE token = ?');
            $req_tok->execute(array($_GET['token']));
            $data = $req_tok->fetch();
            $email = $data['email'];

            if($email){
                ?>
                <!DOCTYPE html>
                <html>
                    <head>
                        <!-- En-tête de la page -->
                        <meta charset="utf-8" />
                        <link rel="stylesheet" href= "style.css"/>
                        <title>Twista</title>
                        <link size="78x78" rel="icon" type="image/png" href="images/favicon.png" />
                    </head>

                    <body>
                        <!-- Corps de la page-->
                        <div id= "hautpage">
                            <div class="logo">
                                <img src="images/logowhiteversion.png" alt="Logo twista" id="logo_twista">
                                <p id="twista">TWISTA</p>
                            </div>
                            <div class="Titrepage"><h1>Rénitialisation de mot de passe</h1></div>
                        </div>
                        <div>
                            <form id="formulaire" method="post">
                                <input name="password" class="password" type="password" placeholder="Nouveau mot de passe" required="required"/>
                                <input name="password_retype" class="password" type="password" placeholder="Confirmer mot de passe" required="required"/>
                                <button class="button_connexion_inscription" type="submit">Suivant</button>
                            </form>
                        </div>
                    </body>
                </html>
                <?php

            }
            else{
                ?>
                <p class='erreur'> Une erreur est survenue</p>
                <?php
            }

        }
        else{
            ?>
            <p class='erreur'> Une erreur est survenue</p>
            <?php
        }

        if(isset($_POST['password']) && isset($_POST['password_retype'])){
            $password = $_POST['password'];
            $password_retype = $_POST['password_retype'];
            if($password == $password_retype){
                $password = hash('sha256', $password);
                $req_majPassword = $bdd->prepare("UPDATE utilisateurs SET password = ?, token = NULL WHERE token = ?");
                $req_majPassword->execute(array($password, $_GET['token']));
                header('Location:connexion.php?login_err=passwordchanged');
            }
            else{
                ?>
                <p class='erreur'> Les mots de passe ne correspondent pas</p>
                <?php
            }
        }
        else{
            echo 'Veuillez entrer des mot de de passe';
        }

        ?>


