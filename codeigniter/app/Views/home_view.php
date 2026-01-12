<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/couleurs.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/cardArticle.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/btn-profil.css');?>">
    </head>
<body>
    <nav class="navbar">
            <div class="box1_header">
                <a href="<?php echo base_url('public'); ?>">
                    <img class="logo" src="<?php echo base_url('public/assets/img/logo.jpg');?>">
                </a>
                <div class="display-categories">
                    <form action="<?php echo base_url('public/Home/recherche'); ?>" method="post">
                        <select class="categories" name="categorie" onchange="document.getElementById('submit-button').click()">
                            <option>Categorie</option>
                            <option value="tout">Tout</option>
                            <?php foreach ($categories as $categorie) :?>
                                <option value="<?=$categorie?>"><?=$categorie?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" id="submit-button" style="display: none;">
                    </form>
                </div>
                <form id="search-form" action="<?php echo base_url('public/Home/recherche'); ?>" method="post">
                    <?php if (session()->get('keyword') != NULL) :?>
                        <input class="searchbar" type="search" name="keyword" placeholder="Rechercher" value="<?=session()->get('keyword')?>">
                    <?php else :?>
                        <input class="searchbar" type="search" name="keyword" placeholder="Rechercher" >
                    <?php endif; ?>
                </form>    

                <div class="bouttons">
                    <?php if (session()->get('nom') == null) :?>
                        <button class="btn-type-1-inscription"><a href="<?php echo base_url('public/Inscription'); ?>">Inscription</a></button>
                        <button class="btn-type-1"><a href="<?php echo base_url('public/Connexion'); ?>">Connexion</a></button>
                    <?php elseif (session()->get('role') == 'client') : ?>
                        <div class="profil-container">
                            <button id="profil" class="profil" >Bonjour <?=session()->get('prenom')?> </a></button>
                            <div id="options" class="options">
                                <h2><img src="<?php echo base_url('public/assets/img/profil.jpg') ; ?>" class="img-profil"> Mon Profil</h2>
                                <h4>Connecté en tant que : <?=session()->get('prenom')?> <?=session()->get('nom')?></h4>
                                <p class="pline">____________________________</p>
                                <a href="<?php echo base_url('public/ModifInfos'); ?>"><button class="line-red"><img src="<?php echo base_url('public/assets/img/rouage.png') ; ?>" class="img-profil"> Modifier des Informations</button></a>
                                <p class="pline">____________________________</p>
                                <button class="line-red"><img src="<?php echo base_url('public/assets/img/panier.png') ; ?>" class="img-profil"> Mes Commandes</button>
                                <p class="pline">____________________________</p>
                                <form action="<?= base_url('public/Dashboard/devenirVendeur')?>" method="post">
                                    <button class="line-red"><img src="<?php echo base_url('public/assets/img/vendeur.png') ; ?>" class="img-profil"> Devenir vendeur</button>
                                </form>
                                    <p class="pline">____________________________</p>
                                <button class="line-bas-red"><img src="<?php echo base_url('public/assets/img/deco.png') ; ?>" class="img-profil"> Se déconnecter</button>
                                <button class="line-bas-red"><img src="<?php echo base_url('public/assets/img/poubelle.png') ; ?>" class="img-profil"> Supprimer son profil</button>
                                <p class="pline">____________________________</p>
                            </div>
                        </div>
                        <button class="btn-type-1"><a href="<?= base_url('public/Connexion/deconnexion') ?>">Deconnexion</a></button>
                   <?php elseif (session()->get('role') == 'vendeur') : ?>
                        <div class="profil-container">
                            <button id="profil" class="profil" >Bonjour <?=session()->get('prenom')?> </a></button>
                            <div id="options" class="options-vendeur">
                                <h2><img src="<?php echo base_url('public/assets/img/profil.jpg') ; ?>" class="img-profil"> Mon Profil</h2>
                                <h4>Connecté en tant que : <?=session()->get('prenom')?> <?=session()->get('nom')?></h4>
                                <p class="pline">____________________________</p>
                                <a href="<?php echo base_url('public/ModifInfos'); ?>"><button class="line-red"><img src="<?php echo base_url('public/assets/img/rouage.png') ; ?>" class="img-profil"> Modifier des Informations</button></a>
                                <p class="pline">____________________________</p>
                                <a href="<?php echo base_url('public/MesCommandes'); ?>"><button class="line-red"><img src="<?php echo base_url('public/assets/img/panier.png') ; ?>" class="img-profil"> Mes Commandes</button></a>
                                <button class="line-red"><img src="<?php echo base_url('public/assets/img/panier.png') ; ?>" class="img-profil"> Mes Ventes</button>
                                <button class="line-red"><img src="<?php echo base_url('public/assets/img/colis.png') ; ?>" class="img-profil"> Consulter ses produits</button>
                                <a href="<?= base_url('public/AjouterProd') ?>"><button class="line-red"><img src="<?php echo base_url('public/assets/img/colis.png') ; ?>" class="img-profil"> Ajouter produits</button></a>
                                <p class="pline">____________________________</p>
                                <button class="line-bas-red"><img src="<?php echo base_url('public/assets/img/deco.png') ; ?>" class="img-profil"> Se déconnecter</button>
                                <button class="line-bas-red"><img src="<?php echo base_url('public/assets/img/poubelle.png') ; ?>" class="img-profil"> Supprimer son profil</button>
                                <p class="pline">____________________________</p>
                            </div>
                        </div>
                        <button class="btn-type-1"><a href="<?= base_url('public/Connexion/deconnexion') ?>">Deconnexion</a></button>
                   <?php elseif (session()->get('role') == 'moderateur') : ?>
                        <div class="profil-container">
                            <button id="profil" class="profil" >Bonjour <?=session()->get('prenom')?> </a></button>
                            <div id="options" class="options-modo">
                                <h2><img src="<?php echo base_url('public/assets/img/profil.jpg') ; ?>" class="img-profil"> Mon Profil</h2>
                                <h4>Connecté en tant que : <?=session()->get('prenom')?> <?=session()->get('nom')?></h4>
                                <p class="pline">____________________________</p>
                                <a href="<?= base_url('public/ModifInfos') ?>"><button class="line-red"><img src="<?php echo base_url('public/assets/img/rouage.png') ; ?>" class="img-profil"> Modifier des Informations</button></a>
                                <p class="pline">____________________________</p>
                                <button class="line-red"><img src="<?php echo base_url('public/assets/img/panier.png') ; ?>" class="img-profil"> Mes Commandes</button>
                                <button class="line-red"><img src="<?php echo base_url('public/assets/img/panier.png') ; ?>" class="img-profil"> Consulter les commandes</button>
                                <a href="<?= base_url('public/Connexion') ?>"><button class="line-red"><img src="<?php echo base_url('public/assets/img/colis.png') ; ?>" class="img-profil"> Consulter les produits</button></a>
                                <a href="<?= base_url('public/Connexion') ?>"><button class="line-red"><img src="<?php echo base_url('public/assets/img/colis.png') ; ?>" class="img-profil"> Ajouter produits</button></a>
                                <p class="pline">____________________________</p>
                                <button class="line-red"><img src="<?php echo base_url('public/assets/img/modo.png') ; ?>" class="img-profil"> Consulter liste users</button>
                                <p class="pline">____________________________</p>
                                <button class="line-bas-red"><img src="<?php echo base_url('public/assets/img/deco.png') ; ?>" class="img-profil"> Se déconnecter</button>
                                <button class="line-bas-red"><img src="<?php echo base_url('public/assets/img/poubelle.png') ; ?>" class="img-profil"> Supprimer son profil</button>
                                <p class="pline">____________________________</p>
                            </div>
                        </div>
                        <button class="btn-type-1"><a href="<?= base_url('public/Connexion/deconnexion') ?>">Deconnexion</a></button>
                    <?php endif;?>
                </div>
            </div>
    </nav>
    <div class="main-title">
        <h1>Bienvenue sur VéloScope</h1>
        <h2>Le meilleur site de vente de vélo</h2>
        <p>Découvrez notre sélection de produits de qualité pour tous vos de sportif.</p>
    </div>
    <div class="carousel">
        <div class="carousel-slide">
            <img class="carousel-photo" src="<?php echo base_url('public/assets/img/img-test1.jpeg'); ?>" alt="img01" />
            <img src ="<?php echo base_url('public/assets/img/img-test2.jpeg'); ?>" alt="img02" class="carousel-photo"/>
            <img src ="<?php echo base_url('public/assets/img/img-test3.jpg'); ?>" alt="img03" class="carousel-photo"/>
        </div>
    </div>
    <div class="main-content">
        <div class="tri-box">
            <h1 >Trier par :</h1>
            <div class="tri-options">
                <form action="<?= base_url('public/Home/recherche'); ?>" method="post">
                    <fieldset class="fieldset">
                        <legend>Trier par : </legend>
                        <div class="radio"><input type="radio" name="tri" value="croissant">Prix croissant</div>
                        <div class="radio"><input type="radio" name="tri" value="decroissant">Prix décroissant</div>
                        <div class="radio"><input type="radio" name="tri" value="az">Nom A-Z</div>
                        <div class="radio"><input type="radio" name="tri" value="za">Nom Z-A</div>
                    </fieldset>
                    <h3 class="h3">Filtrer par catégorie :</h3>
                    <div class="select-container">
                        <label for="category-select">Choisir une catégorie :</label>
                        <select class="category-select" name="categorie">
                            <option value="tout">Tout</option>
                            <?php foreach ($categories as $categorie) :?>
                                <?php if ($categorie == session()->get('selectedCategorie')) : ?>
                                    <option value="<?=$categorie?>" selected><?=$categorie?></option>
                                <?php else : ?>
                                    <option value="<?=$categorie?>"><?=$categorie?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input class="btn-apply-filters" type="submit" value="Filtrer">
                </form>
            </div>
        </div>
        <div class="diplay-card">
            <?php foreach ($products as $product): ?>
                <div class="card">
                    <ul>
                        <li><h1><?= $product->nom?></h1></li>
                        <li><div><img src="<?php echo base_url("public/assets/imageProduit/$product->id.jpg")?>" alt="produit"></div></li>
                        <li><p><?=$product->desc?></p></li>
                        <li>
                        <ul class="acheter">
                            <li><h1 class="prix"><?=$product->prix?>€</h1></li>
                            <li><button><a href="<?php echo base_url('public/Product/' . $product->id)?>">🛒</a></button></li>
                        </ul>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#07405F" fill-opacity="1" d="M0,224L21.8,218.7C43.6,213,87,203,131,181.3C174.5,160,218,128,262,133.3C305.5,139,349,181,393,202.7C436.4,224,480,224,524,218.7C567.3,213,611,203,655,213.3C698.2,224,742,256,785,240C829.1,224,873,160,916,144C960,128,1004,160,1047,165.3C1090.9,171,1135,149,1178,133.3C1221.8,117,1265,107,1309,112C1352.7,117,1396,139,1418,149.3L1440,160L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
    <footer class="footer">
        <div class="footergrossebox">
            <div class="footerbox">
                <h1>Pour mieux nous connaître</h1>
                <ul>
                    <a href="<?= base_url('public/Connexion'); ?>#1"><li>Qui sommes-nous ?</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#2"><li>Notre mission</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#3"><li>Une marketplace collaborative</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#4"><li>Un cadre sécurisé</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#5"><li>Une passion commune</li></a>
                </ul>
            </div>
            <div class="footerbox">
                <h1>Informations légales</h1>
                <ul>
                    <a href="<?= base_url('public/Connexion'); ?>#7"><li>Mentions légales</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#12"><li>Conditions Générales de Vente (CGV)</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#19"><li>Conditions Générales d’Utilisation (CGU)</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#24"><li>Politique de confidentialité</li></a>
                    <a href="<?= base_url('public/Connexion'); ?>#28"><li>Politique de cookies</li></a>
                </ul>
            </div>
            <div class="footerbox">
                <h1>Achats & services</h1>
                <ul>
                    <a href="#32"><li>Livraison et retours</li></a>
                    <a href="#33"><li>Service après-vente & garanties</li></a>
                    <a href="#36"><li>Responsabilité et sécurité</li></a>
                </ul>
            </div>
        </div>
        <p class="line-credits">© 2024-2026, VéloScope.com Inc. ou ses affiliés</p>
    </footer>
    <script src="<?php echo base_url('public/assets/js/test.js'); ?>"></script>
</body>
</html>

