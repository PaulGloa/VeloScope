<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/Dashboard.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/couleurs.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/cardArticle.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<nav class="navbar">
    <div class="box1_header">
        <a href="<?php echo base_url('public'); ?>">
            <img class="logo" src="<?php echo base_url('public/assets/img/logo.jpg');?>">
        </a>
        <div class="display-categories">
            <button class="categories">Catégories v</button>
            <ul>
                <li><a>test1</a></li>
                <li><a>test2</a></li>
                <li><a>test3</a></li>
                <li><a>test4</a></li>
                <li><a>test5</a></li>
                <li><a>test6</a></li>
                <li><a>test7</a></li>
                <li class="last-li"><a>test8</a></li>
            </ul>
        </div>
        <form id="search-form" action="<?php echo base_url('public/Home/recherche'); ?>" method="post">
            <input class="searchbar" type="search" name="keyword" placeholder="Rechercher" >
        </form>
        <div class="bouttons">
            <h3>Bonjour <?=session()->get('prenom')?> </h3>
            <button class="btn-type-1"><a href="<?= base_url('public/Connexion/deconnexion') ?>">Deconnexion</a></button>
        </div>
    </div>
</nav>
<div id="content">
    <div id="default">
        <div id="commandes">
            <h1>Mes Commandes</h1>
            <?php foreach($produits as $produit): ?>
            <div class="details_commande">
                <div class="premiere_ligne">
                    <h3><?= $produit['produit']->nom?></h3>
                    <h3><?=$produit['produit']->prix * $produit['commande']->quantite?>€</h3>
                    <p>Qté : <?=$produit['commande']->quantite?></p>
                </div>
                <div class="deuxieme_ligne">
                    <p>Article vendu par <span><?=$produit['vendeur']->prenom?> <?=$produit['vendeur']->nom?></span></p>
                    <!--éventuellement faire du nom du vendeur un bouton vers sa boutique -->
                </div>
            </div>

            <?php endforeach; ?>
        </div>
        <div id="infos">
            <h1>Modifier mes Informations</h1>
            <form action="<?= base_url('public/Dashboard/modifInfos')?>" method="post">
                <div class="details_infos">
                    <label for="mail">Email : </label>
                    <input class="text_input" type="text" name="mail" value="<?=$user->mail?>">
                    <label for="nom">Nom : </label>
                    <input class="text_input" type="text" name="nom" value="<?=$user->nom?>">
                    <label for="prenom">Prenom : </label>
                    <input class="text_input" type="text" name="prenom" value="<?=$user->prenom?>">
                </div>
                <div class="details_infos">
                    <label for="ancien_mdp">Mot de Passe : </label>
                    <input class="text_input" type="password" name="ancien_mdp">
                    <label for="nv_mdp">Nouveau Mot de Passe : </label>
                    <input class="text_input" type="password" name="nv_mdp">
                    <label for="confirm_mdp">Confirmer Mot de Passe : </label>
                    <input class="text_input" type="password" name="confirm_mdp">
                </div>
                <?php if ($error == "mdp") : ?>
                    <div id="error">
                        <p>Mot de passe incorrect</p>
                    </div>
                <?php elseif ($error == "confirm") : ?>
                    <div id="error">
                        <p>Mot de passe et confirmation différents</p>
                    </div>
                <?php elseif ($error == "incomplet") : ?>  
                    <div id="error">
                        <p>Informations manquantes</p>
                    </div>  
                <?php elseif ($error == "ok") : ?>
                    <div id="done">
                        <p>Modifications effectuée</p>
                    </div>
                <?php endif; ?>

                <input id="button" type="submit" value="Modifier">
            </form>    
        </div>
    </div>

    <?php if (session()->get('role') == 'client') : ?>
        <form action="<?= base_url('public/Dashboard/devenirVendeur')?>" method="post">
            <input id="button" type="submit" value="Devenir vendeur">
        </form>
    <?php endif;?>
    
    <?php if (session()->get('role') == 'vendeur') : ?>
    <div id="vendeur">
        <div id="ajout_produit">
            <h1>Ajouter un Produit</h1>
            <form action="<?= base_url('public/Dashboard/ajoutProduit')?>" method="post" enctype="multipart/form-data" >
                <div class="details_ajout">
                    <label for="nom_produit">Nom : </label>
                    <input class="text_input" type="text" name="nom_produit" value="<?= session()->get('nom_produit') ?>">
                    <label for="prix">Prix (€) : </label>
                    <input class="text_input" type="text" name="prix" value="<?= session()->get('prix') ?>">
                    <label for="stock">Stock : </label>
                    <input class="text_input" type="text" name="stock" value="<?= session()->get('stock') ?>">
                    <label for="categorie" >Categorie : </label>
                    <select name="categorie" id="category-select">
                        <option value="VTT" <?= session()->get('categorie') == 'VTT' ? 'selected' : '' ?>>VTT</option>
                        <option value="VTC" <?= session()->get('categorie') == 'VTC' ? 'selected' : '' ?>>VTC</option>
                        <option value="Velo de Ville" <?= session()->get('categorie') == 'Velo de Ville' ? 'selected' : '' ?>>Velo de Ville</option>
                        <option value="Cargo" <?= session()->get('categorie') == 'Cargo' ? 'selected' : '' ?>>Cargo</option>
                    </select>
                    <label for="desc">Description : </label>
                    <textarea class="text_input" name="desc" rows="5" cols="33" placeholder="Description du produit..."><?= session()->get('desc') ?></textarea>
                    <label for="image">Image du produit :</label>
                    <input type="file" name="image" accept="image/*">
                </div>
                <?php if ($error == "ajout_incomplet") : ?>
                    <div id="error">
                        <p>Veuillez remplir tous les champs</p>
                    </div>
                <?php elseif ($error == "ajout_ok") : ?>
                    <div id="done">
                        <p>Ajout effectué</p>
                    </div>
                <?php endif; ?>
                <input id="button" type="submit" value="Ajouter">
            </form>
        </div>
    </div>
    <div id="produits">
        <h1>Mes produits</h1>
        <form action="<?php echo base_url('public/Dashboard'); ?>" method="post">
            <input class="searchbar" type="search" name="keyword" placeholder="Rechercher" >
        </form>
        <div class="diplay-card">
            <?php foreach ($productsVendeur as $productVendeur): ?>
            <div class="card">
                <ul>
                    <li>
                        <a href="<?= base_url('public/Dashboard/delete/' . $productVendeur->id) ?>" class="delete-product">
                            <i class="fa-regular fa-square-minus" id="delete"></i>
                        </a>
                    </li>
                    <li><h1><?= $productVendeur->nom?></h1></li>
                    <li><div><img src="<?php echo base_url("public/assets/imageProduit/$productVendeur->id.jpg")?>" alt="produit"></div></li>
                    <li><p><?=$productVendeur->desc?></p></li>
                    <li>
                    <ul class="acheter">
                        <li><h1 class="prix"><?=$productVendeur->prix?>€</h1></li>
                        <li><button><a href="<?php echo base_url('public/ModifProduit/index/' . $productVendeur->id)?>">⚙️</a></button></li>
                    </ul>
                    </li>
                </ul>
            </div>
            <?php endforeach; ?>
        </div> 
    </div> 
    <?php endif; ?>   
</div>
<script>
    document.querySelectorAll('.delete-product').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            
            Swal.fire({
                title: 'Supprimer le produit',
                text: 'Voulez-vous vraiment supprimer ce produit ?',
                icon: 'warning',
                theme: 'dark',
                showCancelButton: true,
                confirmButtonColor: '#f00',
                cancelButtonColor: '#08f',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>
</body>
</html>
