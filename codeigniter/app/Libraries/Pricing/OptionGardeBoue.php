<?php

namespace App\Libraries\Pricing;

class OptionGardeBoue extends VeloOption
{
    public function getPrix(): float
    {
        return $this->velo->getPrix() + 10.0;
    }

    public function getDescription(): string
    {
        return parent::getDescription() . ' + garde-boue';
    }
}
