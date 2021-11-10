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
        <?php
        if(isset($_GET['forgot_password_err'])){
            $err = htmlspecialchars($_GET['forgot_password_err']);
            switch($err){
                //Le cas du mot de passe incorrect
                case 'mail':
                    ?>
                    <p class='erreur'> Email incorrect </p>
                    <?php
                    break;

                //Le cas de l'email incorrect
                case 'empty':
                    ?>
                    <p class='erreur'> Veuillez rentrer votre adresse mail </p>
                    <?php
                    break;
                }
        } 
        ?>
            <form id="formulaire" action="forgotPassword_traitement.php" method="post">
                <input name='email' class="email" type="email" placeholder="E-mail" required="required"/>
                <button class="button_connexion_inscription" type="submit">Envoyer un mail</button>
            </form>
            
        </div>
    </body>
</html>