<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/couleurs.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/modif_prod.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/btn-profil.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=base_url("assets/js/alertBox.js")?>" defer></script>
</head>
<body>
    <nav class="navbar">
            <div class="box1_header">
                <a href="/">
                    <img class="logo" src="<?php echo base_url('assets/img/logo.jpg');?>">
                </a>
                <div class="display-categories">
                    <form action="<?php echo base_url('Home/recherche'); ?>" method="post">
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
                <form id="search-form" action="<?php echo base_url('Home/recherche'); ?>" method="post">
                    <?php if (session()->get('keyword') != NULL) :?>
                        <input class="searchbar" type="search" name="keyword" placeholder="Rechercher" value="<?=session()->get('keyword')?>">
                    <?php else :?>
                        <input class="searchbar" type="search" name="keyword" placeholder="Rechercher" >
                    <?php endif; ?>
                </form>    

                <div class="bouttons">
                    <?php if (session()->get('nom') == null) :?>
                        <a href="<?php echo base_url('Inscription'); ?>"><button class="btn-type-1-inscription">Inscription</button></a>
                        <a href="<?php echo base_url('Connexion'); ?>"><button class="btn-type-1">Connexion</button></a>
                    <?php else : ?>
                        <div class="profil-container">
                            <button id="profil" class="profil" >Bonjour <?=session()->get('prenom')?> </button>
                            <div id="options" class="options">
                                <h2><i class="fa-solid fa-user"></i> Mon Profil</h2>
                                <h4>Connecté en tant que : <?=session()->get('prenom')?> <?=session()->get('nom')?></h4>
                                <p class="pline">____________________________</p>
                                <a href="<?php echo base_url('ModifInfos'); ?>"><button class="line-red"><i class="fa-solid fa-user-gear"></i> Modifier des Informations</button></a>
                                <p class="pline">____________________________</p>
                                <a href="MesCommandes"><button class="line-red"><i class="fa-solid fa-cart-shopping"></i> Mes Commandes</button></a>
                                <p class="pline">____________________________</p>
                                <?php if (session()->get('role') == 'client') :?>
                                    <form id="devenir-vendeur-form" action="<?= base_url('Home/devenirVendeur')?>" method="post">
                                        <button class="line-red" id="devenir-vendeur"><i class="fa-solid fa-user-tie"></i> Devenir vendeur</button>
                                    </form>
                                <?php elseif (session()->get('role') == 'vendeur') : ?>
                                    <style>
                                        #options  {height: 450px;}
                                    </style>
                                    <a href="<?php echo base_url('MesVentes'); ?>"><button class="line-red"><i class="fa-solid fa-cart-arrow-down"></i> Mes Ventes</button></a>
                                    <a href="<?= base_url('MonMagasin')?>"><button class="line-red"><i class="fa-solid fa-shop"></i> Mon Magasin</button></a>
                                    <a href="<?= base_url('AjouterProd') ?>"><button class="line-red"><i class="fa-solid fa-circle-plus"></i> Ajouter produits</button></a>
                                <?php elseif (session()->get('role') == 'moderateur') : ?>
                                    <style>
                                        #options  {height: 520px;}
                                    </style>
                                    <button class="line-red"><i class="fa-solid fa-scroll"></i> Consulter les commandes</button>
                                    <a href="<?= base_url('Connexion') ?>"><button class="line-red"><i class="fa-solid fa-book-open"></i> Consulter les produits</button></a>
                                    <p class="pline">____________________________</p>
                                    <button class="line-red"><i class="fa-solid fa-users"></i> Consulter liste users</button>
                                <?php endif;?>
                                <p class="pline">____________________________</p>
                                <a href="<?=base_url("Connexion/deconnexion")?>"><button class="line-bas-red"><i class="fa-solid fa-user-xmark"></i> Se déconnecter</button></a>
                                <button class="line-bas-red"><i class="fa-solid fa-trash-can"></i> Supprimer son profil</button>
                            </div>
                        </div>
                        <a href="<?= base_url('Connexion/deconnexion') ?>"><button class="btn-type-1">Deconnexion</button></a>
                    <?php endif;?>
                </div>
            </div>
    </nav>
    <div class="main-box">
        <div class="prod-box">
            <div class="text-box">
                <h1>Nom :</h1>
                <h2>Hébert</h2>
                <h1>Prénom :</h1>
                <h2>Artus</h2>
            </div>
            <div class="text-box">
                <h1>Adresse Mail :</h1>
                <h2>Test@gmail.prout</h2>
                <h1>Mot de passe  :</h1>
                <h2>EddieMalou69</h2>
            </div>
            <div class="text-box2">
                <h1>Rôle :</h1>
                <h2>Vendeur</h2>
            </div>
            <div class="text-box2">
                <h1>Changer rôle ?</h1>
                <div class="dropdown">
                    <button class="dropbtn" id="dropbtn">Rôle sélectionné : Vendeur</button>
                    <div class="dropdown-content">
                        <a href="#" onclick="selectRole('Vendeur')">Vendeur</a>
                        <a href="#" onclick="selectRole('Client')">Client</a>
                    </div>
                </div>
            </div>
            <div class="box4">
                <button class="apply-changes">Appliquer les modifications</button>
                <button class="suppr-product">Suspendre Utilisateur</button>
                <button class="suppr-product">Bannir Utilisateur</button>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#07405F" fill-opacity="1" d="M0,224L21.8,218.7C43.6,213,87,203,131,181.3C174.5,160,218,128,262,133.3C305.5,139,349,181,393,202.7C436.4,224,480,224,524,218.7C567.3,213,611,203,655,213.3C698.2,224,742,256,785,240C829.1,224,873,160,916,144C960,128,1004,160,1047,165.3C1090.9,171,1135,149,1178,133.3C1221.8,117,1265,107,1309,112C1352.7,117,1396,139,1418,149.3L1440,160L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
    <footer class="footer">
        <div class="footergrossebox">
            <div class="footerbox">
                <h1>Pour mieux nous connaître</h1>
                <ul>
                    <a href="<?= base_url('Home/credits'); ?>#1"><li>Qui sommes-nous ?</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#2"><li>Notre mission</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#3"><li>Une marketplace collaborative</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#4"><li>Un cadre sécurisé</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#5"><li>Une passion commune</li></a>
                </ul>
            </div>
            <div class="footerbox">
                <h1>Informations légales</h1>
                <ul>
                    <a href="<?= base_url('Home/credits'); ?>#7"><li>Mentions légales</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#12"><li>Conditions Générales de Vente (CGV)</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#19"><li>Conditions Générales d’Utilisation (CGU)</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#24"><li>Politique de confidentialité</li></a>
                    <a href="<?= base_url('Home/credits'); ?>#28"><li>Politique de cookies</li></a>
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
    <script src="<?php echo base_url('assets/js/dropbtn.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/test.js'); ?>"></script>
</body>
</html>
