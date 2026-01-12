<?php

namespace App\Libraries\Shipping;

use App\Entities\ProductEntity;

class LivraisonPointRelais implements CalculFraisLivraison
{
    public function calculer(ProductEntity $produit, int $quantite): float
    {
        $base = 2.99;
        return $base;
    }
}
