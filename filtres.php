<?php include "inc/header.php" ?>
<form action="projets.php" method="post">
    <select id="filterCrit" class="select-filter-criteria" name="filterCriteria">
        <option value="1">Alphabétique</option>
        <option value="2">Assignation</option>
        <option value="3">Date d'échéance</option>
        <option value="4">Priorité</option>
    </select>
    <select id="filterOrder" class="select-filter-order" name="filterOrder">
        <option value="A">Croissant</option>
        <option value="D">Décroissant</option>
    </select>
    <input type="hidden" name="action" value="filter">
    <label for="submit"></label>
    <input type="submit" name="submit">
</form>


<?php include "inc/footer.php" ?>