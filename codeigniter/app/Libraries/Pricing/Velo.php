<?php

namespace App\Libraries\Pricing;

interface Velo
{
    public function getPrix(): float;
    public function getDescription(): string;
}
