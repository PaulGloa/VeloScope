<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;

class MesCommandes extends BaseController
{
    function index() {

        $userId = session('id');

        $data['commandes'] = $this->getCommandes($userId);
        $data['mode'] = 'client';

        return view('gerer_commande_view', $data);
    }

    function getCommandes($userId) {
        $dbCommandes = new DbCommandeModel();
        $dbUser = new DbUserModel();
        $dbProduct = new DbProductModel();

        $commandesBrut = $dbCommandes->where('client', $userId)->findAll();
        $commandes = [];

        foreach ($commandesBrut as $commande) {
            $product = $dbProduct->where('id', $commande->produit)->first();
            $vendeur = $dbUser->where('id', $product->vendeur)->first();

            $commandes[] = ['commande' => $commande, 'produit' => $product, 'vendeur' => $vendeur];
        }

        return $commandes;
    }

    function annulerCommande() {
        $commandeId = $_POST['commandeId'];
        $dbCommandes = new DbCommandeModel();

        $dbCommandes->where('id', $commandeId)->delete();

        return redirect()->to(base_url('public/MesCommandes'));
    }
}