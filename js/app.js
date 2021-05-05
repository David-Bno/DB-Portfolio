const nav = document.querySelector('.nav');

window.onscroll = function() {
  var top = window.scrollY;
  console.log(top);
  if (top >= 100) {
    nav.classList.add('active');
  } else {
    nav.classList.remove('active');
  }
}