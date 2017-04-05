<h2>Liste des clients</h2>


<table class="table table-bordered text-center col-md-12">
    <thead>
        <tr>
            <td>Nom Prénom</td>
            <td>âge</td>
            <td>adresse</td>
            <td>numero de téléphone</td>
            <td>statut marital</td>
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

    </tr>


<?php endforeach; ?>

</table>