<?php

namespace App\Libraries\Pricing;

abstract class VeloOption implements Velo
{
    protected Velo $velo;

    public function __construct(Velo $velo)
    {
        $this->velo = $velo;
    }

    public function getDescription(): string
    {
        return $this->velo->getDescription();
    }
}
