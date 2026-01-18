<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;

class ProduitsAdmin extends BaseController {
    function index($produits = null) {

        session()->remove(['nom_produit', 'prix', 'stock', 'categorie', 'desc', 'etat']);

        $dbProduct = new DbProductModel();

        $data['categories'] = $dbProduct->getCategories();

        if ($produits != null){
            $data['produits'] = $this->getProduits($produits);    
        } else {
            $data['produits'] = $this->getProduits();
        }

        return view('gerer_prod_view', $data);
    }

    function getProduits($produits = null) {
        $dbProduct = new DbProductModel();

        if ($produits != null) {
            $products = $produits;
        } else {
            $products = $dbProduct->findAll();
        }
        
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

    function recherche() {
        $dbProduct = new DbProductModel();

        $categorie = $_POST['categorie'] ?? "tout";
        $productName = $_POST['productName'] ?? "";

        $produits = $dbProduct->findAll();

        if ($productName != "") {
            $produits = $dbProduct->searchbar($productName);
        }

        $finalProducts = [];

        if ($categorie != "tout") {
            foreach ($produits as $produit) {
                if ($produit->categorie == $categorie) {
                    array_push($finalProducts, $produit);
                }
            }
        } else {
            $finalProducts = $produits;
        }

        return $this->index($finalProducts);
    }
}