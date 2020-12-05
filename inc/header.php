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