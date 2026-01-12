<?php

namespace App\Libraries\Pricing;

class OptionLivraisonMontee extends VeloOption
{
    public function getPrix(): float
    {
        return $this->velo->getPrix() + 30.0;
    }

    public function getDescription(): string
    {
        return parent::getDescription() . ' + livraison montée';
    }
}
