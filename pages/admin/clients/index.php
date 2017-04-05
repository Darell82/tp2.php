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
        <td><?= $client->birthdate ?></td>
        <td><?= $client->adresse.' '.$client->code_postal ?></td>
        <td><?= $client->telephone ?></td>
        <td><?= $client->statusmaritals ?></td>

        <td>
            <a class="btn btn-info btn-xs" href="admin.php?p=clients.detail&id=<?= $client->id ?>">Détail</a>
        </td>
    </tr>


<?php endforeach; ?>

</table>