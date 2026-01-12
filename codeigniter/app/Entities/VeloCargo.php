<?php

namespace App\Entities;

class VeloCargo extends ProductEntity
{
    public function caractéristiques() : string
    {
        return "Cadre allongé et renforcé, capacité de charge jusqu'à 200 kg.";
    }
}
