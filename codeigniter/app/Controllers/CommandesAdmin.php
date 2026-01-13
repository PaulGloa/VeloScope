<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;

class CommandesAdmin extends BaseController
{
    function index() {

        $dbProduct = new DbProductModel();

        $userId = session('id');

        $data['categories'] = $dbProduct->getCategories();
        $data['commandes'] = $this->getCommandes();
        $data['mode'] = 'admin';

        return view('gerer_commande_view', $data);
    }

    function getCommandes() {
        $dbCommandes = new DbCommandeModel();
        $dbProduct = new DbProductModel();

        $commandesBrut = $dbCommandes->findAll();
        $commandes = [];

        foreach ($commandesBrut as $commande) {
            $product = $dbProduct->where('id', $commande->produit)->first();

            $commandes[] = ['commande' => $commande, 'produit' => $product, 'vendeur' => $product->vendeur, 'client' => $commande->client];
        }
        return $commandes;
    }
}