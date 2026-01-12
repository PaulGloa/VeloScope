<?php

namespace App\Models;

use CodeIgniter\Model;

class DbProductModel extends Model
{
    protected $table = 'product'; // Nom de la table
    protected $primaryKey = 'id'; // Clé primaire
    protected $returnType = \App\Entities\ProductEntity::class;
    protected $allowedFields = ['nom', 'prix', 'stock', 'desc', 'categorie', 'vendeur'];

    public function ajouterCaracteristiques(\App\Entities\ProductEntity $product)
    {
        $categorie = $product->categorie;
        $typeProduct = \App\Entities\ProductEntity::fabrique($categorie);
        $caracteristiques = $typeProduct->caractéristiques();

        $product->desc = $caracteristiques . ' ' . $product->desc;
    }

    public function searchbar($keyword) {
        return $this->table('product')
            ->like('nom', $keyword)
            ->orLike('desc', $keyword)
            ->orLike('categorie', $keyword)
            ->findAll();
    }

    function getCategories() {
        $data['products'] = $this->findAll();
        $categories = [];

        foreach ($data['products'] as $prod) {
            if (!in_array($prod->categorie, $categories)) {
                $categories[] = $prod->categorie;
            }
        }

        return $categories;
    }
}