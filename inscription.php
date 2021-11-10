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
            <div class="Titrepage"><h1>Inscription</h1></div>
        </div>
        <div>
        <?php 
        // On vérifie si il y a une erreur
        if(isset($_GET['reg_err'])){
            // On stock l'erreur
            $err = $_GET['reg_err'];

            //On utilise un switch pour éviter d'utiliser trop de condition répétitive
            switch($err){

                //le cas du succès 
                case 'success':
                    ?>
                    <p class='erreur'> Succès Inscription réussi </p>
                    <?php
                    header('Location:connexion.php');
                    break;

                //le cas des mots de passe pas correspondants 
                case 'password':
                    ?>
                    <p class='erreur'> Mots de passe non-correspondant </p>
                    <?php
                    break;
                
                //le cas de l'email
                case 'email':
                    ?>
                    <p class='erreur'> Email Invalide </p>
                    <?php
                    break;
                
                //le cas de la longueur de l'email
                case 'email_len':
                    ?>
                    <p class='erreur'> Email trop longue </p>
                    <?php
                    break;
                
                //le cas de la longueur du pseudo
                case 'pseudo_len':
                    ?>
                    <p class='erreur'> Pseudo trop long</p>
                    <?php
                    break;
                
                //le cas de la longueur de l'email
                case 'email_len':
                    ?>
                    <p class='erreur'> Utilisateur déjà existant </p>
                    <?php
                    break;
                    
                case 'age':
                    ?>
                    <p class='erreur'> Vous êtes trop jeune pour vous inscrire </p>
                    <?php
                    break;
            }
        }
        ?>
            <form class="form_inscription_connexion" action="inscription_traitement.php" method="post">
                <input name="pseudo" class="pseudo" type="text" placeholder="Pseudo" required/>
                <input name="email" class="email" type="email" placeholder="E-mail" required/>
                <input name="password" class="password" type="password" placeholder="Mot de passe" required/>
                <input name="password_retype" class="password" type="password" placeholder="Confirmer mot de passe" required/>
                <input name="date_naissance" class="date" type="date" placeholder="Date de naissance" required/>
                <select name="sexe" id="sexe">
                    <option value="M">M</option>
                    <option value="F">F</option>
                    <option value="Ne pas préciser">Ne pas préciser</option>
                </select>
                <div class="check">
                    <input type="checkbox" required>
                    <p class="RGPD">J'accepte</p>
                    <a href="Condition d'utilisation de Twista.pdf" class="pdf">les conditions d'utilisation ainsi que le rgpd de Twista</a>
                </div>
                <button class="button_connexion_inscription" type="submit">Inscription</button>
            </form>
                
        </div>
    </body>
</html>