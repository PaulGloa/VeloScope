// script.js
document.addEventListener('DOMContentLoaded', function() {
    const bouton = document.getElementById('profil');
    const bloc = document.getElementById('options');

    if (bouton && bloc) {
        bouton.addEventListener('click', function(event) {
            event.stopPropagation();
            bloc.style.display = (bloc.style.display === 'none' || bloc.style.display === '') ? 'block' : 'none';
        });

        document.addEventListener('click', function() {
            bloc.style.display = 'none';
        });

        bloc.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    }
});
