<?php

namespace App\Models;

use CodeIgniter\Model;
class DbCommandeModel extends Model
{

    protected $table = 'commandes';
    protected $primaryKey = 'id';
    protected $returnType = \App\Entities\CommandeEntity::class;  // Retourne une instance de CommandeEntity
    protected $allowedFields = ['produit', 'client', 'quantite', 'etat'];

}