<?php
    $app = App::getInstance();
    $id = $_GET['id'];

    $client = $app->getTable('client')->findClient($id);
    if ($client===false) {
        $app->notFound();
    }
    $credits = $app->getTable('credit')->all();
?>

<div class="row">
    <div class="col-md-12">
        <h2>Informations détaillés sur le client</h2>
        <hr class="my-separator">

        <p><strong>Nom:</strong> <?= $client->nom ?></p>
        <p><strong>Prénom:</strong> <?= $client->prenom ?></p>
        <p><strong>Âge:</strong> <?= $client->age ?></p>
        <p><strong>Date de naissance:</strong> <?= $client->birthdate ?></p>
        <p><strong>Adresse:</strong> <?= $client->adresse ?></p>
        <p><strong>Code postal:</strong> <?= $client->code_postal ?></p>
        <p><strong>Téléphone:</strong> <?= $client->telephone ?></p>
        <p><strong>Situation familiale:</strong> <?= $client->statusmaritals ?></p>
        <p>
            <strong>Organisation:</strong>
            <?php
                foreach($credits as $credit){
                    if($credit->client_id == $client->id){
                        echo $credit->organisme;
                    }
                }
            ?>
        </p>
        <p>
            <strong>Montant:</strong>
            <?php
                foreach($credits as $credit){
                    if($credit->client_id == $client->id){
                        echo $credit->montant.' €';
                    }
                }
            ?>
        </p>
    </div>
</div>