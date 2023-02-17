//Cuando la página termine de cargarse, la section debe aparecer gradualmente (fade in).

window.addEventListener('load', function() {
    setTimeout(() => {
        document.querySelector(".section-hidden").style.display = 'block';
      }, 900);
    ;
})
