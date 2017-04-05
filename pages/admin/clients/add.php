<p><a href="admin.php">Retour zone admin</a></p>

<?php
if(isset($_POST['nom'],$_POST['prenom'],$_POST['birthdate'],$_POST['adresse'],$_POST['code_postal'],$_POST['telephone'])){
    App::getInstance()->getTable('Client')->create([
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "birthdate" => $_POST['birthdate'],
        "adresse" => $_POST['adresse'],
        "code_postal" => $_POST['code_postal'],
        "telephone" => $_POST['telephone'],
        "statusMarital_id" => $_POST['statut']
        ]);
    header('Location: admin.php?p=clients');
}
?>
<h2>Ajouter un nouveau client</h2>

<form action="admin.php?p=clients.add" method="post">
    <input class="text-center" type="text" name="nom" placeholder="Nom">
    <input class="text-center" type="text" name="prenom" placeholder="Prénom">
    <input class="text-center" type="date" name="birthdate" placeholder="Date de naissance">
    <input class="text-center" type="text" name="adresse" placeholder="Adresse complète">
    <input class="text-center" type="text" name="code_postal" placeholder="Code postal">
    <input class="text-center" type="text" name="telephone" placeholder="Numéro de téléphone">
    <select class="form-control" name="statut">
        <option>votre choix</option>
        <?php foreach(App::getInstance()->getTable('statusmarital')->all() as $status): ?>
            <option value="<?= $status->id ?>">
                <?= $status->status ?>
             </option>
        <?php endforeach; ?>
    </select>

    

    <input class="btn btn-success" type="submit" >
</form>