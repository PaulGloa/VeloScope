<?php

namespace App\Libraries\Pricing;

class OptionGravage extends VeloOption
{
    public function getPrix(): float
    {
        return $this->velo->getPrix() + 20.0;
    }

    public function getDescription(): string
    {
        return parent::getDescription() . ' + gravage';
    }
}
