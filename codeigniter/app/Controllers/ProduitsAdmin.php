<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;

class ProduitsAdmin extends BaseController {
    function index() {

        session()->remove(['nom_produit', 'prix', 'stock', 'categorie', 'desc']);

        $dbProduct = new DbProductModel();

        $data['categories'] = $dbProduct->getCategories();
        $data['produits'] = $this->getProduits();

        return view('gerer_prod_view', $data);
    }

    function getProduits() {
        $dbProduct = new DbProductModel();

        $products = $dbProduct->findAll();

        $data = [];

        $dbUser = new DbUserModel();

        foreach ($products as $product) {
            $user = $dbUser->where('id', $product->vendeur)->first();

            $data[] = ['produit' => $product, 'vendeur' => $user];
        }

        return $data;
    }

    function deleteProduit($id) {
        $dbProductModel = new DbProductModel();
        $dbProductModel->delete($id);

        $dbCommande = new DbCommandeModel();

        $dbCommande->where('produit', $id)->delete();

        $imagePath = FCPATH . 'assets/imageProduit/' . $id . '.jpg';
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        return redirect()->to(base_url('MonMagasin'));
    }
}