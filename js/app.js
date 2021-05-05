// Quand la page est chargée
document.addEventListener('DOMContentLoaded', function() {
  // On initialise le menu actif
  checkMenuActive();

  // On fait un event pour chaque liens de la navbar
  document.querySelectorAll("nav#nav a").forEach(function(item){
    item.addEventListener('click', function(){
      // Si le lien clické a un hash (ex: #a-propos) on le passe
      checkMenuActive(item.hash);
    })
  });
  
}, false);


function checkMenuActive(ancre) {
  // On commence par reset toutes les classe actives
  resetMenuActives();

  let el;

  // Si l'ancre(hash) a pas été passé en paramètre et qu'on en a un dans l'url on le prend
  if (!ancre && window.location.hash) {
    ancre = window.location.hash;
  }

  // Par défaut si on a rien on prend #accueil
  ancre = ancre || '#accueil';

  // On le selectionne et on ajoute la classe active
  if (el = document.querySelector(`nav#nav a[href='${ancre}']`)) {
    el.classList.add('active');
  }

  
}

function resetMenuActives() {
  // On selectionne tous les liens de la navbar
  let els = document.querySelectorAll("nav#nav a");

  // Si y'en a pas bah starfoulah c buggé
  if (!els || !els.length) return;

  // On va suprimer les éventuelles classes actives pour chaque element
  els.forEach(function(el) {
    el.classList.remove('active');
  });
}