// Quand la page est chargée
document.addEventListener('DOMContentLoaded', function() {

  // On écoute le scroll
  document.addEventListener('scroll', function(){
    checkMenuActive()

    var top = window.scrollY;
    if (top >= 1) {
      nav.classList.add('reduite');
    } else {
      nav.classList.remove('reduite');
    }
  });
}, false);

function checkMenuActive() {
  let idPage;

  // On regarde quel element prend le plus de place du viewport
  document.querySelectorAll("div.page").forEach(function(el){
    if (inViewport(el)) idPage = el.id;
  })

  // On supprime toutes les classes active et on remet sur l'élément qui prend le plus de place
  document.querySelectorAll("nav#nav a").forEach(function(el){
    el.classList.remove('active')
    if (el.hash.substr(1) === idPage && idPage !== 'accueil') el.classList.add('active');
  })
}

function inViewport(node) {
  let rect = node.getBoundingClientRect();
  vph = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);

  return ((rect.height - Math.abs(rect.top)) <= vph && (rect.height - Math.abs(rect.top)) > (vph/2))
}