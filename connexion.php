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
            <div class="Titrepage"><h1>Connexion</h1></div>
        </div>
        <div>
        <?php 
        //On vérifie si il y a une erreur
        if(isset($_GET['login_err'])){
            //On stock l'erreur
            $err = htmlspecialchars($_GET['login_err']);

            //On utilise un switch pour éviter d'utiliser trop de condition répétitive
            switch($err){
                //Le cas du mot de passe incorrect
                case 'password':
                    ?>
                    <p class='erreur'> Mot de passe incorrect </p>
                    <?php
                    break;

                //Le cas de l'email incorrect
                case 'email':
                    ?>
                    <p class='erreur'> Email incorrect </p>
                    <?php
                    break;

                //Le cas de l'utilisateur inexistant'
                case 'already':
                    ?>
                    <p class='erreur'> Utilisateur inexistant </p>
                    <?php
                    break;
                
                case 'passwordchanged':
                    ?>
                    <p class='erreur'> Mot de passe changé avec succès </p>
                    <?php
                    break;
            }
        }
        ?>
            <form class="formulaire_connexion" action="connexion_traitement.php" method="post">
                <input name="email" class="email" type="email" placeholder="E-mail" required="required"/>
                <input name="password" class="password" type="password" placeholder="Mot de passe" required="required"/>
                <button class="button_connexion_inscription" type="submit">Connexion</button>
            </form>
            <div class="oublie_mdp">
                <a id="oubli"href="forgotPassword.php">J'ai oublié mon mot de passe</a>
            </div>
        </div>
    </body>
</html>