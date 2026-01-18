<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;

class MesCommandes extends BaseController
{
    function index() {

        $dbProduct = new DbProductModel();

        $userId = session('id');

        $data['categories'] = $dbProduct->getCategories();
        $data['commandes'] = $this->getCommandes($userId);
        $data['mode'] = 'client';

        return view('gerer_commande_view', $data);
    }

    function getCommandes($userId) {
        $dbCommandes = new DbCommandeModel();
        $dbUser = new DbUserModel();
        $dbProduct = new DbProductModel();

        $commandesBrut = $dbCommandes->where('client', $userId)->findAll();
        $commandesLivre = [];
        $commandesEnCours = [];

        foreach ($commandesBrut as $commande) {
            $product = $dbProduct->where('id', $commande->produit)->first();
            $vendeur = $dbUser->where('id', $product->vendeur)->first();

            if ($commande->etat == 'livré' ) {
                $commandesLivre[] = ['commande' => $commande, 'produit' => $product, 'vendeur' => $vendeur];
            } else {
                $commandesEnCours[] = ['commande' => $commande, 'produit' => $product, 'vendeur' => $vendeur];
            }
        }

        return array_merge($commandesEnCours, $commandesLivre);
    }

    function annulerCommande() {
        $commandeId = $_POST['commandeId'];
        $dbCommandes = new DbCommandeModel();
        $dbProduct = new DbProductModel();

        $commande = $dbCommandes->where('id', $commandeId)->first();
        $product = $dbProduct->where('id', $commande->produit)->first();

        $product->stock += $commande->quantite;


        $dbProduct->save($product);
        $dbCommandes->where('id', $commandeId)->delete();

        return redirect()->to(base_url('MesCommandes'));
    }
}