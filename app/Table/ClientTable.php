<?php
namespace App\Table;
use Core\Table\Table;

/**
*class pour la table client**/

class ClientTable extends Table
{
    public function all(){
        return $this->query("SELECT clients.id,
                            clients.nom,
                            clients.prenom,
                            clients.adresse,
                            clients.birthdate,
                            clients.code_postal,
                            clients.telephone,
                            statusmaritals.status as statusmaritals
                            FROM clients
                            LEFT JOIN statusmaritals
                            ON statusMarital_id = statusmaritals.id");
    }
    public function allBystatusMarital($id){
        return $this->query("SELECT clients.id,
                            clients.nom,
                            clients.prenom,
                            clients.adresse,
                            clients.birthdate,
                            clients.code_postal,
                            clients.numero_de_telephone,
                            statusmaritals.status as statusmaritals
                            FROM clients
                            LEFT JOIN statusmaritals
                            ON statusMarital_id = statusmaritals.id
                            WHERE statusmaritals.id = ?",
                             [$id]);
    }

    public function findClient($id)
        {
            return $this->query(" SELECT clients.id,
                                         clients.nom,
                                         clients.prenom,
                                         clients.birthdate,
                                         clients.adresse,
                                         clients.code_postal,
                                         clients.telephone,
                                         statusmaritals.status  as statusmaritals
                                    FROM clients
                                    LEFT JOIN statusmaritals
                                           ON clients.statusMarital_id = statusmaritals.id
                                    WHERE clients.id = ?
                                ", [$id], true);
        }

}