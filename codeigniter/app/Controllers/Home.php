<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;
use CodeIgniter\Database\Exceptions\DataException;

class Home extends BaseController
{
    public function index($products = null)
    {   
        $productModel = new DbProductModel();

        $session = \Config\Services::session();

        if ($products === null) {
            session()->remove('keyword');
            session()->remove('selectedCategorie');
            $data['products'] = $productModel->findAll();
        } else {
            $data['products'] = $products;
        }

        $data['categories'] = $productModel->getCategories();
        $data['session'] = $session;
        return view('home_view', $data);
    }

    public function recherche() {

        $productModel = new DbProductModel();
        $products = $productModel->findAll();

        $keyword = $_POST['keyword'] ?? session()->get('keyword');

        if ($keyword != NULL) {
            session()->set('keyword', $keyword);
            $products = $productModel->searchbar($keyword);
        } else {
            session()->remove('keyword');
        }

        $selectedCategorie = $_POST['categorie'] ?? session()->get('selectedCategorie');

        if ($selectedCategorie != NULL and $selectedCategorie != "tout" and $selectedCategorie != "") {

            session()->set('selectedCategorie', $selectedCategorie);

            $temp_products = array();

            foreach ($products as $product) {
                if ($product->categorie == $selectedCategorie) {
                    $temp_products[] = $product;
                }
            }

            $products = $temp_products;
        } elseif ($selectedCategorie == "tout") {
            session()->remove('selectedCategorie');
        }

        $tri = $_POST['tri'] ?? "";

        if ($tri != NULL) {
            for($i = 0; $i < count($products); $i++) {
                $mini = $i;
                for ($j = $i + 1; $j < count($products); $j++) {
                    if ($this->comp($products[$j], $products[$mini], $tri)) {
                        $mini = $j;
                    }
                }
                $temp = $products[$i];
                $products[$i] = $products[$mini];
                $products[$mini] = $temp;
            }
        }

        return $this->index($products);
    }

    function comp($a, $b, $tri) {
        switch ($tri) {
            case 'croissant':
                return $a->prix < $b->prix;
            case 'decroissant':
                return $a->prix > $b->prix;
            case 'az':
                return $a->nom < $b->nom;
            case 'za':
                return $a->nom > $b->nom;
        }

        return $a->nom < $b->nom;
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

        return redirect()->to(base_url('Home'));
    }

    function credits(){
        return view('credits');
    }

    function supprProfil() {
        $id = session('id');

        $dbUser = new DbUserModel();
        $dbCommande = new DbCommandeModel();
        $dbProduct = new DbProductModel();

        $products = $dbProduct->where('vendeur', $id)->findAll();

        foreach ($products as $prod) {
            $dbCommande->where('produit', $prod->id)->delete();
        }

        $dbCommande->where('client', $id)->delete();
        $dbProduct->where('vendeur', $id)->delete();
        $dbUser->where('id', $id)->delete();

        session()->destroy();

        return redirect()->to(base_url('Home'));
    }
}
