<?php include "inc/header.php" ?>

<div id="div_connection" class="flex justify_center">
    <form action="traitement.php" method="POST" id="form_connection">
        <label for="courriel_user">Votre courriel</label>
        <input type="courriel" id="courriel_user">
        <br><br>
        <label for="mdp_user">Mot de passe</label>
        <input type="password" id="mdp_user">
        <br><br>
        <button id="button_connection" type="submit">Se connecter</button>
    </form>
</div>

<?php include "inc/footer.php" ?>