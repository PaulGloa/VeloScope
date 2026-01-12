<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ProductEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public static function fabrique(string $categorie): ProductEntity
    {
        if ($categorie == "VTC") {
            return new VTC();
        } else if ($categorie == "Velo de Ville") {
            return new VeloRoute();
        } else if ($categorie == "Cargo") {
            return new VeloCargo();
        } 
        return new VTT();
    }
}
