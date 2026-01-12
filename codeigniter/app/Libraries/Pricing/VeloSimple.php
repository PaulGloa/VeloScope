<?php

namespace App\Libraries\Pricing;

use App\Entities\ProductEntity;

class VeloSimple implements Velo
{
    private ProductEntity $produit;

    public function __construct(ProductEntity $produit)
    {
        $this->produit = $produit;
    }

    public function getPrix(): float
    {
        $prix = $this->produit->prix ?? 500;
        return (float) $prix;
    }

    public function getDescription(): string
    {
        return (string) ($this->produit->desc ?? 'Vélo simple');
    }
}
