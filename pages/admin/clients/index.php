<p><a href="admin.php">Retour zone admin</a></p>

<h2>Liste des clients</h2>

<p><a href="admin.php?p=clients.add">Ajouter un client</a></p>

<table class="table table-bordered text-center col-md-12">
    <thead>
        <tr>
            <td>Nom, prénom</td>
            <td>âge</td>
            <td>adresse</td>
            <td>numero de téléphone</td>
            <td>statut marital</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        
    </tbody>

<?php foreach (App::getInstance()->getTable("Client")->all() as $client): ?>
    <tr>
        <td><?= $client->identite ?></td>
        <td><?= $client->age ?></td>
        <td><?= $client->adresse.' '.$client->code_postal ?></td>
        <td><?= $client->telephone ?></td>
        <td><?= $client->statusmaritals ?></td>

        <td>
            <a class="btn btn-info btn-xs" href="admin.php?p=clients.detail&id=<?= $client->id ?>">Détail</a>
            <form style="display: inline-block;" action="admin.php?p=clients.delete" method="post">
                <input type="hidden" name="id" value="<?= $client->id; ?>">
                <input type="submit" class="btn btn-xs btn-danger" name="OK" value="X">
             </form>


        </td>
    </tr>

<?php endforeach; ?>

</table>