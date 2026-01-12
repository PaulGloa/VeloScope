<?php

namespace App\Libraries\Shipping;

use App\Entities\ProductEntity;

class LivraisonExpress implements CalculFraisLivraison
{
    public function calculer(ProductEntity $produit, int $quantite): float
    {
        $base = 12.99;
        return $base;
    }
}
