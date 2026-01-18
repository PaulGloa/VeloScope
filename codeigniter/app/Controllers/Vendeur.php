<?php 
namespace App\Controllers;

use App\Models\DbProductModel;
use App\Models\DbUserModel;

class Vendeur extends BaseController {
    public function index($id) {
        $dbUser = new DbUserModel();
        $dbProduct = new DbProductModel();

        $data['categories'] = $dbProduct->getCategories();
        $data['vendeur'] = $dbUser->where('id', $id)->first();

        return view('vendeur_view', $data);
    }
}