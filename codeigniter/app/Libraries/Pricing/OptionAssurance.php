<?php

namespace App\Libraries\Pricing;

class OptionAssurance extends VeloOption
{
    public function getPrix(): float
    {
        return $this->velo->getPrix() + 50.0;
    }

    public function getDescription(): string
    {
        return parent::getDescription() . ' + assurance';
    }
}
