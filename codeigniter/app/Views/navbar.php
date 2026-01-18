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
                                <a href="/MesCommandes"><button class="line-red"><i class="fa-solid fa-cart-shopping"></i> Mes Commandes</button></a>
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
                                    <a href="<?=base_url('CommandesAdmin')?>"><button class="line-red"><i class="fa-solid fa-scroll"></i> Consulter les commandes</button></a>
                                    <a href="<?= base_url('ProduitsAdmin') ?>"><button class="line-red"><i class="fa-solid fa-book-open"></i> Consulter les produits</button></a>
                                    <p class="pline">____________________________</p>
                                    <a href="<?=base_url('UsersAdmin')?>"><button class="line-red"><i class="fa-solid fa-users"></i> Consulter liste users</button></a>
                                <?php endif;?>
                                <p class="pline">____________________________</p>
                                <a href="<?=base_url("Connexion/deconnexion")?>"><button class="line-bas-red"><i class="fa-solid fa-user-xmark"></i> Se déconnecter</button></a>
                                <a href="<?=base_url('Home/supprProfil')?>" id="suppr-anchor"><button class="line-bas-red" id="suppr-profil"><i class="fa-solid fa-trash-can"></i> Supprimer son profil</button></a>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>
    </nav>