<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/couleurs.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cardArticle.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/btn-profil.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/product.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=base_url("assets/js/alertBox.js")?>" defer></script>
</head>
<body>
    <?php require_once('navbar.php'); ?>

    <div id="div_produit">
        <div id="subdiv-1">
            <div id="presentation">
                <h1><?=$product->nom?></h1>
                <div class="mainImg"><img class="mainImg" src="<?php echo base_url("assets/imageProduit/$product->id.jpg")?>"></div>
            </div>
            <form id="infos" action="<?php echo base_url("Product/acheter")?>" method="post">
                <h2><?=$product->prix?>€</h2>
                <p>Vendu et expédié par : <a href="<?=base_url('Vendeur/index/' . $vendeur->id)?>"><span id="vendeur"><?=$vendeur->prenom?> <?=$vendeur->nom?></span></a></p>
                <p>Liraison gratuite le <span id="date-liv">17 Janvier 2026</span></p>
                <p id="stock-text">En Stock</p>
                <select name="quantite" id="quantity-select">
                    <?php for ($i = 1; $i <= $product->stock; $i++): ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php endfor; ?>
                </select>
                <input type="submit" value="Acheter" id="btn-acheter">
            </form>
        </div>
        <div id="description">
            <h2>Description</h2>
            <p><?=$product->desc?></p>
        </div>
    </div>
    <div class="centrer">
        <div class="diplay-card">
            <?php foreach ($data as $element): ?>
                <?php if ($product != $element): ?>
                    <div class="card">
                        <ul>
                            <li><h1><?= $element->nom?></h1></li>
                            <li><div><img src="<?php echo base_url("assets/imageProduit/$element->id.jpg")?>" alt="produit"></div></li>
                            <li><p><?=$element->desc?></p></li>
                            <li>
                            <ul class="acheter">
                                <li><h1 class="prix"><?=$element->prix?>€</h1></li>
                                <a href="<?php echo base_url("Product/" . $element->id)?>"><li><button><i class="fa-solid fa-cart-shopping"></i></button></li></a>
                            </ul>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
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
    <script src="<?php echo base_url('assets/js/test.js'); ?>"></script>
</body>
</html>