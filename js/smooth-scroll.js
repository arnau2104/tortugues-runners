if(window.location.pathname.split("/").pop() == 'index.php') {

$(document).ready(function () {
  $(".smooth-scroll").on("click", function (event) {
      if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;

          $("html, body").animate(
              {
                  scrollTop: $(hash).offset().top - 100, // Ajusta la distancia
              },
              1200,
              function () {
                  window.location.hash = hash;
                  $(".menu-inicial").addClass("scrolled");
              }
          );
      }
  });


});

    let menu = document.querySelector('.menu-inicial');
    menu.classList.remove('scrolled');


    // Event per cambiar el background del header si el scroll supera un nombre d epixels
    window.addEventListener('scroll', function() {
        if (window.scrollY >= 850) {
            menu.classList.add('scrolled');  // Añadir la clase cuando se llegue a 250px
        } else {
            menu.classList.remove('scrolled');  // Eliminarla cuando estemos por encima de 250px
        }

    });

} else {
    let menu = document.querySelector('.menu-inicial');
    menu.classList.add('scrolled');
}