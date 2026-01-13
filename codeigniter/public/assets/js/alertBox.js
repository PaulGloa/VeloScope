const btnVendeur = document.getElementById('devenir-vendeur');

if (btnVendeur) {
    btnVendeur.addEventListener('click', function(e) {
        e.preventDefault(); 
        const form = document.getElementById('devenir-vendeur-form');
            
        Swal.fire({
            title: 'Devenir Vendeur ?',
            text: 'Voulez-vous vraiment devenir vendeur ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f00',
            cancelButtonColor: '#08f',
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
    console.log('true');
    
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
