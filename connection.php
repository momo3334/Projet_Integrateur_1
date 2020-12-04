<?php include "inc/header.php" ?>

<div id="div_connection" class="flex justify_center">
    <form action="traitement.php" method="post" id="form_connection">
        <label for="courriel_user">Votre courriel</label>
        <input type="courriel" id="courriel_user">
        <br><br>
        <label for="mdp_user">Mot de passe</label>
        <input type="password" id="mdp_user">
        <br><br>
        <div class="flex justify_center">
            <button id="button_connection" class="button_class" type="submit">Se connecter</button>
        </div>
    </form>
</div>

<?php include "inc/footer.php" ?>