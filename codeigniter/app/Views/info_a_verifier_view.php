<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/mdpoubli.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/couleurs.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="connexion-card">
        <div class="duo">
            <img src="<?php echo base_url('public/assets/img/logo.jpg') ?>" class="logo">

            <h2 class="title">Informations à vérifier</h2>
        </div>
        <p class="str-type2">1- Regarder si l'adresse mail entrée est correcte</p>
        <p class="str-type2">2- Vérifier si le mail n'est pas déjà utilisé</p>
        <p class="str-type2">3- Regarder dans la boîte de vos indésirables</p>
        <p class="str-type2">4- Pour plus d'aide envoyer un mail à notre support : ....</p>

        <a href="<?php echo base_url('public/Connexion') ?>"><button class="seconnecter">Retour à la page de connexion</button></a>
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