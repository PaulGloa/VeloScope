<?php

namespace App\Controllers;

use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Models\DbUserModel;

class UsersAdmin extends BaseController {
    function index($users = null) {
        $dbProduct = new DbProductModel();
        
        $data['categories'] = $dbProduct->getCategories();

        if ($users != null) {
            $data['users'] = $users;
        }else {
            $dbUser = new DbUserModel();
            $data['users'] = $dbUser->findAll();
        }

        return view('gerer_user_view', $data);
    }

    function toClient($id) {

        $dbUser = new DbUserModel();
        $dbProduct = new DbProductModel();
        $dbCommande = new DbCommandeModel();
        
        $products = $dbProduct->where('vendeur', $id)->findAll();
        
        foreach($products as $product) {
            $dbCommande->where('produit', $product->id)->delete();
        }

        $dbProduct->where('vendeur', $id)->delete();
        
        $user = $dbUser->where('id', $id)->first();
        $user->role = 'client';
        $dbUser->save($user);

        return redirect()->to(base_url('UsersAdmin'));
    }

    function toVendeur($id) {
        $dbUser = new DbUserModel();
        $user = $dbUser->where('id', $id)->first();
        $user->role = 'vendeur';

        $dbUser->save($user);

        return redirect()->to(base_url('UsersAdmin'));
    }

    function ban($id) {
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

        return redirect()->to(base_url('UsersAdmin'));
    }

    function recherche() {
        $dbUser = new DbUserModel();

        $selectedRole = $_POST['selectedRole'] ?? "tous";
        $userName = $_POST['userName'] ?? "";

        $users = $dbUser->findAll();

        if ($userName != "") {
            $users = $dbUser->table('user')->like('prenom', $userName)->orLike('nom', $userName)->findAll();
        }

        $finalUsers = [];

        if ($selectedRole != "tous") {
            foreach ($users as $user) {
                if ($user->role == $selectedRole) {
                    array_push($finalUsers, $user);
                }
            }
        } else {
            $finalUsers = $users;
        }

        return $this->index($finalUsers);

    }
}