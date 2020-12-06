<?php 
function loadClass($class)
{
 require './classes/' . $class . '.class.php';
}

spl_autoload_register('loadClass');
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&family=Sansita+Swashed:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Todoist</title>
</head>

<body>
    <main class="margin_auto">
        <header>
            <nav class="containerMenu justify_center">
                <ul class="flex justify_center">
                    <li class="menu flex button_class"><a href="index.php">Accueil</a></li>
                    <li class="menu flex button_class"><a href="projets.php">Projets</a></li>
                    <li class="menu flex button_class"><a href="calendrier.php">Calendrier</a></li>
                    <li class="menu flex button_class"><a href="filtres.php">Filtrer</a></li>
                    <li class="menu flex button_class"><a href="profil_data.php"> Mes infos</a></li>
                    <?php
                    if (isset($_SESSION["client"]))
                    {
                        echo '<li class="menu flex button_class"><a href="traitement.php?deconnect=true">Déconnexion</a></li>';
                    }
                    else
                    {
                        echo '<li class="menu flex button_class"><a href="connection.php">Connexion</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>