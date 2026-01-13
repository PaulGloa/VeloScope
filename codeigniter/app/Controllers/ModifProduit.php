<?php

namespace App\Controllers;

use App\Models\DbProductModel;
use CodeIgniter\Database\Exceptions\DataException;

class ModifProduit extends BaseController
{
    function index($id)
    {   
        $productModel = new DbProductModel();
        $data['data'] = $productModel->findAll();
        $data['product'] = $productModel->find($id);

        session()->set('nom_produit', $data['product']->nom);
        session()->set('prix', $data['product']->prix);
        session()->set('stock', $data['product']->stock);
        session()->set('categorie', $data['product']->categorie);
        session()->set('desc', $data['product']->desc);


        return view('modif_produit_view', $data);
    }

    function modifProduit()
    {
        $productModel = new DbProductModel();

        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $categorie = $_POST['categorie'];
        $desc = $_POST['desc'];

        $product = $productModel->find($id);

        try {
            $productModel->update($id, $product);
        } catch (DataException $e) {}

        if ($this->request->getFile('image') && $this->request->getFile('image')->isValid()) {
            $image = $this->request->getFile('image');

            if (!$image || !$image->isValid()) {
                return redirect()->back()->with('error', 'Image invalide');
            }

            $typesAutorises = ['image/jpeg', 'image/png', 'image/webp'];
            if (!in_array($image->getMimeType(), $typesAutorises)) {
                return redirect()->back()->with('error', 'Format image non autorisé');
            }
            $tmp  = $image->getTempName();
            $mime = $image->getMimeType();

            switch ($mime) {
                case 'image/jpeg':
                    $src = imagecreatefromjpeg($tmp);
                    break;
                case 'image/png':
                    $src = imagecreatefrompng($tmp);
                    break;
                case 'image/webp':
                    $src = imagecreatefromwebp($tmp);
                    break;
                default:
                    return redirect()->back()->with('error', 'Format non supporté');
            }


            imagejpeg($src, FCPATH . 'assets/imageProduit/' . $id . '.jpg', 85);
            imagedestroy($src);
        }

        return redirect()->to(base_url('public/MonMagasin'));
    }
}

?>