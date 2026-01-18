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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=base_url("assets/js/alertBox.js")?>" defer></script>
    <script src="<?php echo base_url('assets/js/test.js'); ?>" defer></script>
</head>
<body>
    <?php require_once('navbar.php'); ?><div class="main-box">

        <?php if (empty($commandes)) : ?>
            <div class="test-box">
                <h1>Vous n'avez actuellement aucune commande sur notre site</h1>
            </div>
        <?php else : ?>

            <?php foreach ($commandes as $commande) : ?>
                <div class="prod-box user-card">

                    <div class="user-info">
                        <h2>Commande</h2>
                        <p><strong>#<?=$commande['commande']->id?></strong></p>

                        <?php if ($mode == 'client') : ?>
                            <h2>Vendeur :</h2>
                            <p>
                                <a href="<?=base_url('Vendeur/index/' . $commande['vendeur']->id)?>">
                                    <?=$commande['vendeur']->prenom?> <?=$commande['vendeur']->nom?>
                                </a>
                            </p>
                        <?php elseif ($mode == 'vendeur') : ?>
                            <h2>Client :</h2>
                            <p><?=$commande['client']->prenom?> <?=$commande['client']->nom?></p>
                        <?php endif; ?>

                        <h2>État :</h2>
                        <p><strong><?=$commande['commande']->etat?></strong></p>
                    </div>

                    <div class="user-role">
                        <h2>Article acheté</h2>
                        <p><?=$commande['produit']->nom?></p>
                        <h2>Nombre d'articles</h2>
                        <p><?=$commande['commande']->quantite?></p>
                        <h2>Montant</h2>
                        <p><?=$commande['produit']->prix?></p>

                    </div>

                    <div class="user-actions">

                        <?php if ($mode == 'vendeur' && $commande['commande']->etat != 'livré') : ?>
                            <a href="<?=base_url('MesVentes/livrerCommande/' . $commande['commande']->id)?>">
                                <button class="apply-changes">Livrer la commande</button>
                            </a>
                        <?php endif; ?>

                        <form action="<?= base_url('MesCommandes/annulerCommande')?>" method="post" id="suppr-commande-form">
                            <input type="hidden" name="commandeId" value="<?=$commande['commande']->id?>">
                            <?php if ($commande['commande']->etat == 'livré') : ?>
                                <button class="suppr-product" type="submit" id="suppr-commande">Supprimer la commande</button>
                            <?php else : ?>    
                                <button class="suppr-product" type="submit" id="suppr-commande">Annuler la commande</button>
                            <?php endif; ?>
                        </form>

                    </div>

                </div>
            <?php endforeach; ?>

        <?php endif; ?>

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
</body>
</html>
