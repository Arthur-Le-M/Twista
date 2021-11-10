<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location:connexion.php');
    }
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
        <p id="dev">Page de paramètre en développement</p>
        <div class="menu">
            <ul>
                <li class="btn">
                    <a href="landing.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class='image_menu' width="16" height="16" fill="currentColor" viewBox="0 0 16 16" color="white">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                    <br>
                    <a href ="landing.php">Accueil</a>
                </li>
                <li class="btn">
                    <a href="recherche.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class='image_menu' width="16" height="16" fill="currentColor" viewBox="0 0 16 16" color="white">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                    <br>
                    <a href="recherche.php">Recherche</a>
                </li>
                <li class="btn">
                    <a href="profil.php?user=<?php echo $_SESSION['user']?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class='image_menu' width="16" height="16" fill="currentColor" viewBox="0 0 16 16" color="white">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </a>
                </li>
                <li class="btn">
                    <a href="parametre.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class='image_menu' width="16" height="16" fill="currentColor" viewBox="0 0 16 16" color="white">
                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                        </svg>
                    </a>
                    <br>
                    <a href="parametre.php">Paramètres</a>
                </li>
                <li class="btn">
                    <a href="deconnexion.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class='image_menu' width="16" height="16" fill="currentColor" viewBox="0 0 16 16" color="red">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                    </a>
                    <br>
                    <a href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </body>
</html>