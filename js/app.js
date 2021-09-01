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

// Menu burger

var menu = document.querySelector('#menu');
var sidebarBody = document.querySelector('#sidebar-body');
var social = document.querySelector('#social');
var sidebarSocial = document.querySelector('#sidebar-social');
var button = document.querySelector('#btn-menu');
var overlay = document.querySelector('#menu-overlay');
var activatedClass = 'menu-activated';

sidebarBody.innerHTML = menu.innerHTML;
sidebarSocial.innerHTML = social.innerHTML;

// On écoute le clic sur le bouton
button.addEventListener('click', function(e) {
  e.preventDefault();

  this.parentNode.classList.add(activatedClass);
});

button.addEventListener('keydown', function(e) {
  if (this.parentNode.classList.contains(activatedClass)) 
  {
    if (e.repeat === false && e.which === 27) this.parentNode.classList.remove(activatedClass);
  }
});

overlay.addEventListener('click', function(e) {
  e.preventDefault();

  this.parentNode.classList.remove(activatedClass);
});