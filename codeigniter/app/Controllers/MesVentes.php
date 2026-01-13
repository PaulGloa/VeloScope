<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;

class MesVentes extends BaseController
{
    function index() {
        $dbProduct = new DbProductModel();

        $data['categories'] = $dbProduct->getCategories();
        $data['mode'] = 'vendeur';
        $data['commandes'] = $this->getCommandes(session('id'));
        
        return view('gerer_commande_view', $data);
    }

    function getCommandes($userId) {
        $dbCommandes = new DbCommandeModel();
        $dbUser = new DbUserModel();
        $dbProduct = new DbProductModel();

        $produits = $dbProduct->where('vendeur', $userId)->findAll();
        $commandesBrut = [];
        $commandes = [];

        foreach ($produits as $produit) {
            $commandesBrut = array_merge($commandesBrut, $dbCommandes->where('produit', $produit->id)->findAll());
        }

        foreach ($commandesBrut as $commande) {
            $product = $dbProduct->where('id', $commande->produit)->first();
            $client = $dbUser->where('id', $commande->client)->first();

            $commandes[] = ['commande' => $commande, 'produit' => $product, 'client' => $client];
        }

        return $commandes;
    }
}