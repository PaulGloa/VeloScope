<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;
use CodeIgniter\Database\Exceptions\DataException;

class Dashboard extends BaseController
{
    function index($error = null) {
        $role = session()->get('role');
        
        if (!isset($role)) {

            return redirect()->to(base_url('Home'));

        } elseif ($role == 'vendeur') {

            $productModel = new DbProductModel();
            $productsVendeur = $productModel->where('vendeur', session()->get('id'))->findAll();
            $data['productsVendeur'] = $productsVendeur;
        }

        $dbCommandes = new DbCommandeModel();
        $dbUser = new DbUserModel();
        $dbProduits = new DbProductModel();

        $user = $dbUser->where('mail', session()->get('mail'))->first();
        $commandes = $dbCommandes->where('client',$user->id)->findAll();

        $produits = array();

        foreach ($commandes as $commande) {
            $produit = $dbProduits->where('id', $commande->produit)->first();

            if ($produit) {
                $vendeur = $dbUser->where('id', $produit->vendeur)->first();

                $produits[] = array('produit' => $produit, 'vendeur' => $vendeur, 'commande' => $commande);
            }
        }

        $data['error'] = $error;
        $data['produits'] = $produits;
        $data['user'] = $user;

        return view('dashboard_view', $data);
    }

    function devenirVendeur() {
        
        $mail = session()->get('mail');
        
        $dbUser = new DbUserModel();
        $user = $dbUser->where('mail', $mail)->first();
        $user->role = 'vendeur';

        try {
            $dbUser->update($user->id, $user);
        } catch (DataException $e) {}

        session()->set('role', $user->role);

        return $this->index();
    }
}