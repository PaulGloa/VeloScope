<?php

namespace App\Models;

use CodeIgniter\Model;
class DbUserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = \App\Entities\UserEntity::class;  // Retourne une instance de UserEntity
    protected $allowedFields = ['mail', 'nom', 'prenom', 'mdp', 'role'];
}