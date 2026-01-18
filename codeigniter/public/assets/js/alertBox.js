const btnVendeur = document.getElementById('devenir-vendeur');

if (btnVendeur) {
    btnVendeur.addEventListener('click', function(e) {
        e.preventDefault(); 
        const form = document.getElementById('devenir-vendeur-form');
            
        Swal.fire({
            title: 'Devenir Vendeur ?',
            text: 'Voulez-vous vraiment devenir vendeur ?',
            icon: 'warning',
            theme: 'dark',
            showCancelButton: true,
            confirmButtonColor: '#08f',
            cancelButtonColor: '#f00',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
}

const supprAnchor = document.getElementById('suppr-anchor');

if (supprAnchor) {
    supprAnchor.addEventListener('click', function(e) {
        e.preventDefault();

        url = this.getAttribute('href');

        Swal.fire({
            title: 'Supprimer votre compte',
            text: 'Voulez-vous vraiment supprimer votre compte ?\nCette action est irréversible.',
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
}

const supprProduct = document.getElementById('suppr-product');

if (supprProduct) {
    supprProduct.addEventListener('click', function(e) {
        e.preventDefault();

        url = this.getAttribute('href');

        Swal.fire({
            title: 'Supprimer ce produit',
            text: 'Voulez-vous vraiment supprimer ce produit ?\nCette action est irréversible.',
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
}

const supprUser = document.getElementById('suppr-user');

if (supprUser) {
    supprUser.addEventListener('click', function(e) {
        e.preventDefault();

        url = this.getAttribute('href');

        Swal.fire({
            title: 'Supprimer cet utilisateur',
            text: 'Voulez-vous vraiment supprimer cet utilisateur ?\nCette action est irréversible.',
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
}

const supprCommande = document.getElementById('suppr-commande');

if (supprCommande) {
    supprCommande.addEventListener('click', function(e) {
        e.preventDefault();

        supprCommandeForm = document.getElementById('suppr-commande-form');

        Swal.fire({
            title: 'Supprimer cette commande',
            text: 'Voulez-vous vraiment supprimer cette commande ?\nCette action est irréversible.',
            icon: 'warning',
            theme: 'dark',
            showCancelButton: true,
            confirmButtonColor: '#f00',
            cancelButtonColor: '#08f',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                supprCommandeForm.submit();
            }
        });
    });
}
