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
<?php require_once('navbar.php'); ?>
<div class="centrer">
    <div class="tri-recherche">
        <form  action="<?=base_url('UsersAdmin/recherche')?>" method="post">
            <select name="selectedRole" class="btn-downfall">
                <option value="tous">Tous</option>
                <option value="client">Client</option>
                <option value="vendeur">Vendeur</option>
            </select>
            <input type="search" name="userName" placeholder="entrez un nom ou un prénom" class="research">
            <input type="submit" value="Rechercher" class="btn-primary2">
        </form>
    </div>
</div>
<main class="main-box">

    <?php foreach ($users as $user) : ?>
        <article class="prod-box user-card">

            <section class="user-info">
                <h2>Nom</h2>
                <h3><?= $user->nom ?></h3>

                <h2>Prénom</h2>
                <h3><?= $user->prenom ?></h3>
            </section>

            <section class="user-info">
                <h2>Email</h2>
                <h3><?= $user->mail ?></h3>

                <h2>Mot de passe</h2>
                <h3><?= $user->mdp ?></h3>
            </section>

            <section class="user-role">
                <h2>Rôle</h2>
                <h3><?= $user->role ?></h3>
            </section>

            <?php if ($user->role !== 'moderateur') : ?>
                <section class="user-actions2">

                    <?php if ($user->role === 'client') : ?>
                        <a href="<?= base_url('UsersAdmin/toVendeur/' . $user->id) ?>">
                            <button class="btn-primary">Changer en vendeur</button>
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url('UsersAdmin/toClient/' . $user->id) ?>">
                            <button class="btn-primary">Changer en client</button>
                        </a>
                    <?php endif; ?>

                    <a href="<?= base_url('UsersAdmin/ban/' . $user->id) ?>" id="suppr-user">
                        <button class="btn-danger">Bannir l'utilisateur</button>
                    </a>

                </section>
            <?php endif; ?>

        </article>
    <?php endforeach; ?>

</main>
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
