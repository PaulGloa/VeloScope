<?php

namespace App\Libraries\Shipping;

use App\Entities\ProductEntity;

class ShippingContext
{
    private CalculFraisLivraison $strategie;

    public function __construct(CalculFraisLivraison $strategie)
    {
        $this->strategie = $strategie;
    }

    public function setStrategie(CalculFraisLivraison $strategie): void
    {
        $this->strategie = $strategie;
    }

    public function calculerFrais(ProductEntity $produit, int $quantite): float
    {
        return $this->strategie->calculer($produit, $quantite);
    }
}
