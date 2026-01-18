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
                'prix' => 599.00,
                'stock' => 10,
                'desc' => 'VTT tout suspendu, idéal pour les sentiers techniques. Cadre en aluminium, freins à disque.',
                'vendeur' => 1,
                'categorie' => 'VTT',
            ],
            [
                'nom' => 'VTT Triban RC 500',
                'prix' => 799.00,
                'stock' => 5,
                'desc' => 'VTT semi-rigide, léger et réactif. Parfait pour les sorties en montagne.',
                'vendeur' => 2,
                'categorie' => 'VTT',
            ],
            [
                'nom' => 'VTC Riverside 500',
                'prix' => 499.00,
                'stock' => 8,
                'desc' => 'VTC polyvalent, confortable pour la ville et les chemins. Pneus larges et suspension avant.',
                'vendeur' => 1,
                'categorie' => 'VTC',
            ],
            [
                'nom' => 'VTC Hoprider C5',
                'prix' => 649.00,
                'stock' => 6,
                'desc' => 'VTC robuste, équipé pour les trajets quotidiens et les balades en forêt.',
                'vendeur' => 2,
                'categorie' => 'VTC',
            ],
            [
                'nom' => 'Vélo de Ville Elops 500',
                'prix' => 399.00,
                'stock' => 12,
                'desc' => 'Vélo urbain élégant, avec garde-boue, porte-bagages et éclairage intégré.',
                'vendeur' => 1,
                'categorie' => 'Velo de Ville',
            ],
            [
                'nom' => 'Vélo de Ville B\'Twin Original 700',
                'prix' => 449.00,
                'stock' => 7,
                'desc' => 'Vélo confortable pour la ville, cadre en acier, 7 vitesses.',
                'vendeur' => 2,
                'categorie' => 'Velo de Ville',
            ],
            [
                'nom' => 'Vélo Cargo Longtail Tilt',
                'prix' => 1999.00,
                'stock' => 3,
                'desc' => 'Vélo cargo longtail, idéal pour transporter enfants ou charges lourdes. Moteur électrique optionnel.',
                'vendeur' => 1,
                'categorie' => 'Cargo',
            ],
            [
                'nom' => 'Vélo Cargo Compact Moustache',
                'prix' => 2499.00,
                'stock' => 2,
                'desc' => 'Vélo cargo compact et maniable, avec caisse avant amovible. Parfait pour les livraisons.',
                'vendeur' => 2,
                'categorie' => 'Cargo',
            ],
            [
                "nom" => "Vtt électrique adulte E-Summit 700",
                "prix" => 1199.99,
                "stock" => 15,
                "desc" => "Le vélo électrique E-Summit 700 de Nakamura est le vélo idéal pour se lancer dans la pratique du VTT. Son rapport qualité prix imbattable offre un équilibre entre confort et performance.",
                "vendeur" => 1,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vélo de route adulte ALLROAD 125",
                "prix" => 499.50,
                "stock" => 8,
                "desc" => "Le ALLROAD 125 vous permettra de découvrir la pratique gravel. Assez polyvalent pour s’adapter parfaitement au quotidien et pour vos sorties du week-end.",
                "vendeur" => 2,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vtt électrique adulte E-Summit 700 (Blanc)",
                "prix" => 1199.99,
                "stock" => 5,
                "desc" => "Le vélo électrique E-SUMMIT 700 est le vélo idéal pour se lancer dans la pratique du VTT. Son rapport qualité prix imbattable offre un équilibre entre confort et performance.",
                "vendeur" => 1,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vtt électrique adulte E-Summit 700 (Noir)",
                "prix" => 1250.00,
                "stock" => 10,
                "desc" => "Le vélo électrique Nakamura E-Summit 700 est le vélo idéal pour se lancer dans la pratique du VTT avec un équilibre parfait.",
                "vendeur" => 1,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vélo de ville électrique CROSSCITY",
                "prix" => 1299.00,
                "stock" => 20,
                "desc" => "Le vélo électrique Nakamura Crosscity est un modèle robuste, au look affirmé pour les déplacements quotidiens ou les balades.",
                "vendeur" => 2,
                "categorie" => "Velo de Ville"
            ],
            [
                "nom" => "Vélo de ville électrique ECROSSCITY",
                "prix" => 1299.99,
                "stock" => 12,
                "desc" => "Le E-CROSSCITY est un vélo robuste au look affirmé pour les déplacements quotidiens ou les balades. Confort, praticité et design.",
                "vendeur" => 2,
                "categorie" => "Velo de Ville"
            ],
            [
                "nom" => "Vtc électrique adulte CROSSOVER V LTD",
                "prix" => 1899.00,
                "stock" => 7,
                "desc" => "Le CROSSOVER V LTD est l’allié idéal de toutes vos sorties. Il vous permet d'emprunter routes et chemins avec confort et agilité.",
                "vendeur" => 1,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vélo de route adulte CENTURY TEAM",
                "prix" => 2599.00,
                "stock" => 3,
                "desc" => "Le CENTURY TEAM est le vélo de route hautes performances de NAKAMURA, doté de technologies innovantes et de composants légers.",
                "vendeur" => 1,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vtt électrique adulte E-Summit 730",
                "prix" => 1599.50,
                "stock" => 9,
                "desc" => "Ce VTT électrique Nakamura E-Summit 730 a été conçu pour les pratiquants avérés en quête d’un VTTAE à moteur central au meilleur rapport prix/équipement.",
                "vendeur" => 2,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vélo gravel adulte Allroad 250",
                "prix" => 1299.00,
                "stock" => 6,
                "desc" => "Le vélo gravel Allroad 250 de Nakamura vous permet de prendre de nouvelles directions entre routes, chemins et sentiers.",
                "vendeur" => 2,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vélo électrique pliant E-FLEX 2.0",
                "prix" => 1099.00,
                "stock" => 15,
                "desc" => "Le E-FLEX 2.0 est léger et compact. Pour vos trajets urbains ou en vacances ce vélo électrique pliable vous accompagnera partout.",
                "vendeur" => 1,
                "categorie" => "Velo de Ville"
            ],
            [
                "nom" => "Vtc électrique adulte E-Crossover S",
                "prix" => 1199.99,
                "stock" => 18,
                "desc" => "Le E-CROSSOVER S est le vélo polyvalent électrique pour adulte de la marque NAKAMURA permettant d'emprunter routes et chemins.",
                "vendeur" => 2,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vtc électrique adulte Crossover S",
                "prix" => 1199.00,
                "stock" => 25,
                "desc" => "Le VTC électrique Crossover S vous propose la poussée supplémentaire d'un moteur électrique dans le moyeu arrière, donnant un vélo vif et facile à conduire.",
                "vendeur" => 1,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vélo enfant 26 pouces Cliff Evo Max",
                "prix" => 229.99,
                "stock" => 30,
                "desc" => "Ce VTT enfant Nakamura Cliff Evo Max est idéal pour des sorties en forêt ou chemin pour les 9-13 ans.",
                "vendeur" => 2,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vtt adulte Cliff 700",
                "prix" => 259.99,
                "stock" => 40,
                "desc" => "Le VTT Nakamura Cliff 700 rend le vélo plus accessible à tous. Conçu pour les balades sur chemins et sentiers avec une position agréable.",
                "vendeur" => 1,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vtt électrique adulte E-SUMMIT 740 OPEN",
                "prix" => 1599.99,
                "stock" => 4,
                "desc" => "Le E-Summit 740 OPEN s'adresse à toutes et tous. Son cadre ouvert permet un enjambement bas tout en gardant son esprit sportif.",
                "vendeur" => 2,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vtc électrique adulte Crossover Longtail",
                "prix" => 2999.00,
                "stock" => 2,
                "desc" => "Découvrez une nouvelle ère de mobilité urbaine avec notre VTC électrique adulte Nakamura Crossover Longtail, conçu pour simplifier votre vie quotidienne.",
                "vendeur" => 1,
                "categorie" => "Cargo"
            ],
            [
                "nom" => "Vtc électrique adulte CROSSOVER V",
                "prix" => 1699.99,
                "stock" => 14,
                "desc" => "Le CROSSOVER V (pour Voyage) est une nouvelle génération de vélo électrique polyvalent permettant tout à la fois : vélotaf, balade ou voyage.",
                "vendeur" => 2,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vtt adulte SUMMIT 705",
                "prix" => 399.99,
                "stock" => 22,
                "desc" => "Que ce soit pour des randonnées dynamiques ou des descentes techniques, le SUMMIT 705 s'adapte à toutes les envies.",
                "vendeur" => 1,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vélo enfant 20 pouces Mystic Evo Kid",
                "prix" => 159.99,
                "stock" => 50,
                "desc" => "Le vélo Nakamura Mystic Evo Kid convient aux enfants de 5-8 ans qui veulent découvrir la pratique du vélo sur routes, chemins ou sentiers.",
                "vendeur" => 2,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vtt adulte Cliff 700 (Bleu)",
                "prix" => 259.99,
                "stock" => 35,
                "desc" => "Le VTT Nakamura Cliff 700 rend le vélo plus accessible à tous. Conçu pour les balades sur chemins et sentiers.",
                "vendeur" => 1,
                "categorie" => "VTT"
            ],
            [
                "nom" => "Vtc électrique adulte Crossover V (Noir)",
                "prix" => 1699.00,
                "stock" => 11,
                "desc" => "Le VTC électrique Nakamura Crossover V est une nouvelle génération de vélo électrique polyvalent permettant tout à la fois.",
                "vendeur" => 2,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vtc adulte Crossland Balade",
                "prix" => 349.99,
                "stock" => 28,
                "desc" => "Conçu pour être à l’aise en ville comme en tout chemin, le VTC Nakamura Crossland B propose simplicité et confort.",
                "vendeur" => 1,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vélo gravel adulte ALLROAD TEAM",
                "prix" => 2199.99,
                "stock" => 5,
                "desc" => "Le ALLROAD TEAM est le modèle Gravel hautes performances de NAKAMURA. Ce vélo sera le meilleur allié pour vos sorties longues en Bikepacking.",
                "vendeur" => 2,
                "categorie" => "VTC"
            ],
            [
                "nom" => "Vtc électrique adulte Crosscity +",
                "prix" => 2199.00,
                "stock" => 8,
                "desc" => "Le parfait équilibre entre performance, confort et praticité. Ce biplace est l'allié idéal pour vos sorties en ville, seul ou à deux.",
                "vendeur" => 1,
                "categorie" => "Velo de Ville"
            ],
            [
                "nom" => "Vtt électrique adulte E-SUMMIT 740 OPEN (Gris)",
                "prix" => 1599.99,
                "stock" => 6,
                "desc" => "Le E-Summit 740 OPEN s'adresse à toutes et tous, il repousse les limites de la polyvalence en VTT avec son cadre ouvert.",
                "vendeur" => 2,
                "categorie" => "VTT"
            ]
        ];

        foreach ($products as $product) {
            $this->db->table('product')->insert($product);
        }
    }
}