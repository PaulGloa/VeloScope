<?php

namespace App\Controllers;

use App\Models\DbProductModel;

class AjouterProd extends BaseController
{
    function index($error = null) {

        $data['error'] = $error;

        return view('ajout_prod_view', $data);
    }

    function ajouterProd() {
        $id = session()->get('id');
        $nom = $_POST['nom_produit'] ?? "";
        $prix = $_POST['prix'] ?? "";
        $stock = $_POST['stock'] ?? "";
        $categorie = $_POST['categorie'] ?? "";

        $desc = $_POST['desc'] ?? "";

        $dbProductModel = new DbProductModel();

        if ($nom === "" || $prix === "" || $stock === "" || $desc === "" || $categorie === "") {

            session()->set('nom_produit', $nom);
            session()->set('prix', $prix);
            session()->set('stock', $stock);
            session()->set('categorie', $categorie);
            session()->set('desc', $desc);

            return redirect()->to(base_url('public/AjouterProd/index/ajout_incomplet')); // ici modif
        }

        session()->remove(['nom_produit', 'prix', 'stock','categorie', 'desc']);


        $image = $this->request->getFile('image');

        if (!$image || !$image->isValid()) {
            return redirect()->back()->with('error', 'Image invalide');
        }

        $typesAutorises = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($image->getMimeType(), $typesAutorises)) {
            return redirect()->back()->with('error', 'Format image non autorisé');
        }

        $nvProduit = new \App\Entities\ProductEntity();

        $nvProduit->nom = $nom;
        $nvProduit->prix = $prix;
        $nvProduit->stock = $stock;
        $nvProduit->categorie = $categorie;
        $nvProduit->desc = $desc;
        $nvProduit->vendeur = $id;

        $dbProductModel->ajouterCaracteristiques($nvProduit);

        $productId = $dbProductModel->insert($nvProduit);


        $path = FCPATH . 'assets/imageProduit/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $imagePath = $image->getTempName();
        $mime = $image->getMimeType();

        switch ($mime) {
            case 'image/jpeg':
                $src = imagecreatefromjpeg($imagePath);
                break;
            case 'image/png':
                $src = imagecreatefrompng($imagePath);
                break;
            case 'image/webp':
                $src = imagecreatefromwebp($imagePath);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($imagePath);
                break;
            case 'image/bmp':
                $src = imagecreatefrombmp($imagePath);
                break;
            default:
                return redirect()->back()->with('error', 'Image non supportée');
        }

        // Enregistrement en JPG
        imagejpeg($src, $path . $productId . '.jpg', 85);
        imagedestroy($src);

        return redirect()->to(base_url('public/AjouterProd/index/ajout_ok'));
    }
}