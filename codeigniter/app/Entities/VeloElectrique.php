<?php

namespace App\Entities;

class VeloElectrique extends ProductEntity
{
    public function caractéristiques() : string
    {
        return "Bonne puissance électrique jusqu'a 25km/h. ";
    }
}
