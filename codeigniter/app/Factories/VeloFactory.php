<?php

namespace App\Factories;

use App\Entities\Accessoire;
use App\Entities\ProductEntity;
use App\Entities\VeloElectrique;
use App\Entities\VeloRoute;

class VeloFactory
{
    public static function fromArray(array $row): ProductEntity
    {
        $type = null;
        if (isset($row['type'])) {
            $type = strtolower((string) $row['type']);
        } elseif (isset($row['categorie'])) {
            $type = strtolower((string) $row['categorie']);
        }

        if (is_string($type)) {
            if (str_contains($type, 'elect') || str_contains($type, 'élect')) {
                return new VeloElectrique($row);
            }
            if (str_contains($type, 'route')) {
                return new VeloRoute($row);
            }
            if (str_contains($type, 'access') || str_contains($type, 'casque') || str_contains($type, 'equip')) {
                return new Accessoire($row);
            }
        }

        return new ProductEntity($row);
    }
}
