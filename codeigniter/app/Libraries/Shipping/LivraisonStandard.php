<?php

namespace App\Libraries\Shipping;

use App\Entities\ProductEntity;

class LivraisonStandard implements CalculFraisLivraison
{
    public function calculer(ProductEntity $produit, int $quantite): float
    {
        $base = 4.99;
        return $base;
    }
}
