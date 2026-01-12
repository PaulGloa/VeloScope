<?php

namespace App\Libraries\Shipping;

use App\Entities\ProductEntity;

interface CalculFraisLivraison
{
    public function calculer(ProductEntity $produit, int $quantite): float;
}
