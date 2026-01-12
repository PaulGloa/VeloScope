// Récupérer le bouton du dropdown
const dropbtn = document.getElementById('dropbtn');

// Ouvrir/fermer le menu au clic sur le bouton
dropbtn.addEventListener('click', function(e) {
  e.stopPropagation(); // empêche le clic de remonter et fermer le menu immédiatement
  this.parentElement.classList.toggle('show');
});

// Fermer le menu si clic en dehors
window.addEventListener('click', function() {
  document.querySelectorAll('.dropdown').forEach(function(dd) {
    dd.classList.remove('show');
  });
});

// Fonction pour sélectionner le rôle et mettre à jour le bouton
function selectRole(role) {
  dropbtn.textContent = "Rôle sélectionné : " + role;
  dropbtn.parentElement.classList.remove('show');
}
