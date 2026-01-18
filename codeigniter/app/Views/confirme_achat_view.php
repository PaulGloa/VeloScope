<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/couleurs.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/confirmAchat.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cardArticle.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/btn-profil.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=base_url("assets/js/alertBox.js")?>" defer></script>
</head>
<body>
    <?php require_once('navbar.php'); ?>
    <div id="content">
        <div class="card2">
            <ul>
                <li><h1><?= $product->nom?></h1></li>
                <li><div><img src="<?php echo base_url("assets/imageProduit/$product->id.jpg")?>" alt="produit"></div></li>
                <li><p><?=$product->desc?></p></li>
                <li>
                    <ul class="acheter">
                        <li><h2 class="prix">Sous-total: <?=number_format($product->prix * $quantite, 2)?>€</h2></li>
                        <li><h2 class="prix">Frais de livraison: <span id="fraisLivraison"><?= isset($fraisLivraison) ? number_format($fraisLivraison, 2) : '0.00' ?>€</span></h2></li>
                        <li><h2 class="prix">Total (TTC): <span id="totalAchat"><?= isset($total) ? number_format($total, 2) : number_format($product->prix * $quantite, 2) ?>€</span></h2></li>
                        <li><h2 class="prix">quantite : <?=$quantite?></h2></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="achat-produit">
            <h2>Confirmation de l'achat</h2>
            <form action="<?= base_url('Product/achatConfirme')?>" method="post">
                <label for="mode_livraison">Mode de livraison</label>
                <select name="mode_livraison" id="mode_livraison">
                    <?php $selected = $modeLivraison ?? 'standard'; ?>
                    <option value="standard" data-fee="<?= isset($livraisonModes['standard']) ? $livraisonModes['standard'] : 0 ?>" <?= $selected === 'standard' ? 'selected' : '' ?>>Standard</option>
                    <option value="express" data-fee="<?= isset($livraisonModes['express']) ? $livraisonModes['express'] : 0 ?>" <?= $selected === 'express' ? 'selected' : '' ?>>Express</option>
                    <option value="point_relais" data-fee="<?= isset($livraisonModes['point_relais']) ? $livraisonModes['point_relais'] : 0 ?>" <?= $selected === 'point_relais' ? 'selected' : '' ?>>Point relais</option>
                </select>
                <div style="margin-top:1rem">
                    <label><input type="checkbox" name="gardeboue" id="gardeboue" data-fee="10"> Garde-boue (+10€)</label>
                    <br>
                    <label><input type="checkbox" name="assurance" id="assurance" data-fee="50"> Assurance (+50€)</label>
                    <br>
                    <label><input type="checkbox" name="livraison_montee" id="livraison_montee" data-fee="30"> Livraison montée (+30€)</label>
                </div>
                <input id="button" type="submit" value="Confirmer l'achat">
            </form>
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

<script>
    (function() {
        var select = document.getElementById('mode_livraison');
        if (!select) return;
        var fraisSpan = document.getElementById('fraisLivraison');
        var totalSpan = document.getElementById('totalAchat');
        var basePrix = <?= json_encode((float)($product->prix)) ?>;
        var quantite = <?= json_encode((int)$quantite) ?>;
        var sousTotalSpan = document.querySelector('.acheter .prix');
        var sousTotal = basePrix * quantite;
        var optionCheckboxes = [
            document.getElementById('gardeboue'),
            document.getElementById('assurance'),
            document.getElementById('livraison_montee')
        ].filter(Boolean);

        function updateTotals() {
            var fee = parseFloat(select.options[select.selectedIndex].getAttribute('data-fee') || '0');
            var optionsFee = 0;
            for (var i = 0; i < optionCheckboxes.length; i++) {
                if (optionCheckboxes[i].checked) {
                    optionsFee += parseFloat(optionCheckboxes[i].getAttribute('data-fee') || '0');
                }
            }
            var prixUnitaire = basePrix + optionsFee;
            sousTotal = prixUnitaire * quantite;
            if (sousTotalSpan) sousTotalSpan.textContent = 'Sous-total: ' + sousTotal.toFixed(2) + '€';
            if (fraisSpan) fraisSpan.textContent = fee.toFixed(2) + '€';
            if (totalSpan) totalSpan.textContent = (sousTotal + fee).toFixed(2) + '€';
        }
        select.addEventListener('change', updateTotals);
        for (var i = 0; i < optionCheckboxes.length; i++) {
            optionCheckboxes[i].addEventListener('change', updateTotals);
        }
        updateTotals();
    })();
</script>
