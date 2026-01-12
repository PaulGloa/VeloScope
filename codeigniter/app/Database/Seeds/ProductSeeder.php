<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'nom' => 'VTT Rockrider ST 540',
                'prix' => 599,
                'stock' => 10,
                'desc' => 'VTT tout suspendu, idéal pour les sentiers techniques. Cadre en aluminium, freins à disque.',
                'vendeur' => 1,
                'categorie' => 'VTT',
            ],
            [
                'nom' => 'VTT Triban RC 500',
                'prix' => 799,
                'stock' => 5,
                'desc' => 'VTT semi-rigide, léger et réactif. Parfait pour les sorties en montagne.',
                'vendeur' => 2,
                'categorie' => 'VTT',
            ],
            [
                'nom' => 'VTC Riverside 500',
                'prix' => 499,
                'stock' => 8,
                'desc' => 'VTC polyvalent, confortable pour la ville et les chemins. Pneus larges et suspension avant.',
                'vendeur' => 1,
                'categorie' => 'VTC',
            ],
            [
                'nom' => 'VTC Hoprider C5',
                'prix' => 649,
                'stock' => 6,
                'desc' => 'VTC robuste, équipé pour les trajets quotidiens et les balades en forêt.',
                'vendeur' => 2,
                'categorie' => 'VTC',
            ],
            [
                'nom' => 'Vélo de Ville Elops 500',
                'prix' => 399,
                'stock' => 12,
                'desc' => 'Vélo urbain élégant, avec garde-boue, porte-bagages et éclairage intégré.',
                'vendeur' => 1,
                'categorie' => 'Vélo de Ville',
            ],
            [
                'nom' => 'Vélo de Ville B\'Twin Original 700',
                'prix' => 449,
                'stock' => 7,
                'desc' => 'Vélo confortable pour la ville, cadre en acier, 7 vitesses.',
                'vendeur' => 2,
                'categorie' => 'Vélo de Ville',
            ],
            [
                'nom' => 'Vélo Cargo Longtail Tilt',
                'prix' => 1999,
                'stock' => 3,
                'desc' => 'Vélo cargo longtail, idéal pour transporter enfants ou charges lourdes. Moteur électrique optionnel.',
                'vendeur' => 1,
                'categorie' => 'Cargo',
            ],
            [
                'nom' => 'Vélo Cargo Compact Moustache',
                'prix' => 2499,
                'stock' => 2,
                'desc' => 'Vélo cargo compact et maniable, avec caisse avant amovible. Parfait pour les livraisons.',
                'vendeur' => 2,
                'categorie' => 'Cargo',
            ],
        ];

        foreach ($products as $product) {
            $this->db->table('product')->insert($product);
        }
    }
}
