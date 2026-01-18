<?php 
namespace App\Controllers;

use App\Entities\CommandeEntity;
use App\Models\DbCommandeModel;
use App\Models\DbProductModel;
use App\Libraries\Shipping\ShippingContext;
use App\Libraries\Shipping\LivraisonStandard;
use App\Libraries\Shipping\LivraisonExpress;
use App\Libraries\Shipping\LivraisonPointRelais;
use App\Libraries\Pricing\VeloSimple;
use App\Libraries\Pricing\OptionGardeBoue;
use App\Libraries\Pricing\OptionAssurance;
use App\Libraries\Pricing\OptionLivraisonMontee;
use App\Models\DbUserModel;

class Product extends BaseController {
    public function index($id) {

        $productModel = new DbProductModel();
        $dbUser = new DbUserModel();

        $data['categories'] = $productModel->getCategories();
        $data['data'] = $productModel->findAll();
        $data['product'] = $productModel->find($id);
        $data['vendeur'] = $dbUser->where('id', $data['product']->vendeur)->first();
        session()->set("currentProductId", $id);

        return view("product_view.php", $data);
    }

    public function acheter() {

        $id = session()->get("currentProductId");

        $productModel = new DbProductModel();
        $data['data'] = $productModel->findAll();
        $product = $productModel->find($id);
        $data['product'] = $product;
        $data['categories'] = $productModel->getCategories();

        $commande = new CommandeEntity();

        $commande->produit = $id;
        $commande->client = session()->get("id");
        $commande->quantite = $this->request->getPost("quantite") ?? 1;
        $commande->etat = 'en cours';

        session()->set('current_commande', $commande);

        $data['quantite'] = $commande->quantite;

        $context = new ShippingContext(new LivraisonStandard());
        $frais = $context->calculerFrais($product, (int) $commande->quantite);
        $data['fraisLivraison'] = $frais;
        $data['total'] = ($product->prix * (int) $commande->quantite) + $frais;
        $data['options'] = [
            'gravage' => 20,
            'assurance' => 50,
            'livraison_montee' => 30,
        ];
        $data['modeLivraison'] = 'standard';
        $data['livraisonModes'] = [
            'standard' => 4.99,
            'express' => 12.99,
            'point_relais' => 2.99,
        ];

        if (session()->get("id") == null) {
            return redirect()->to(base_url('Connexion'));
        }

        return view("confirme_achat_view.php", $data);
    }

    public function achatConfirme(){

        $commande = session()->get("current_commande");

        $productModel = new DbProductModel();
        $product = $productModel->find($commande->produit);

        $mode = $this->request->getPost('mode_livraison') ?? 'standard';
        $context = new ShippingContext(new LivraisonStandard());

        if ($mode === 'express') {
            $context->setStrategie(new LivraisonExpress());
        } elseif ($mode === 'point_relais') {
            $context->setStrategie(new LivraisonPointRelais());
        }

        $fraisLivraison = $context->calculerFrais($product, (int) $commande->quantite);
        $velo = new VeloSimple($product);

        if ($this->request->getPost('gardeboue')) {
            $velo = new OptionGardeBoue($velo);
        }
        if ($this->request->getPost('assurance')) {
            $velo = new OptionAssurance($velo);
        }
        if ($this->request->getPost('livraison_montee')) {
            $velo = new OptionLivraisonMontee($velo);
        }

        $prixUnitaire = $velo->getPrix();
        $total = ($prixUnitaire * (int)$commande->quantite) + $fraisLivraison;
        
        session()->setFlashdata('frais_livraison', $fraisLivraison);
        session()->setFlashdata('total_commande', $total);

        $product->stock -= $commande->quantite;
        $productModel->save($product);

        $commandeModel = new DbCommandeModel();
        $commandeModel->save($commande);

        return redirect()->to(base_url(''));
    }
}