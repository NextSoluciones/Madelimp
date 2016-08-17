module.exports = {
   menuNavegador: function () {
        var barraNav = document.getElementById('barraNav');
        var btnMenu = document.getElementById('btnMenu');
        var btnMenui1 = document.getElementById('btnMenui1');
        var btnMenui2 = document.getElementById('btnMenui2');
        var btnMenui3 = document.getElementById('btnMenui3');
        var hammerbarraNav = new Hammer(barraNav);
        var hammerbtnMenu = new Hammer(btnMenu);
        var hammerbtnMenui1 = new Hammer(btnMenui1);
        var hammerbtnMenui2 = new Hammer(btnMenui2);
        var hammerbtnMenui3 = new Hammer(btnMenui3);
        hammerbtnMenu.on('tap', function(e) {
          console.log(e);
          barraNav.classList.toggle('open');
        });
      },
   sideBarMenu: function () {

        var menuUl = document.getElementById('sideMenu');
        var menuSidebar = document.getElementById('categoriasSide');
        var btnProductos = document.getElementById('btnProductosMenu');


        var lisCat = document.getElementById('lisCat');

        var hammermenuUl = new Hammer(menuUl);
        var hammermenuSidebar = new Hammer(menuSidebar);
        var hammerlisCat = new Hammer(lisCat);
        var hammerbtnProductos = new Hammer(btnProductos);

        hammerbtnProductos.on('tap', function(e) {
          console.log(e);
          menuSidebar.classList.toggle('open');
          menuUl.classList.toggle('open');
        });

        hammerbtnProductos.on('swiperight', function(e) {
          console.log(e);
          menuSidebar.classList.toggle('open');
          menuUl.classList.toggle('open');
        });

        hammermenuSidebar.on('swipeleft', function(e) {
          console.log(e);
          menuSidebar.classList.toggle('open');
          menuUl.classList.toggle('open');
        });

      },
      buscar: function () {
          var circulo = document.getElementById('buscar');
          var cajaBusqueda = document.getElementById('buscador-input');
          var hammerCirculo = new Hammer(circulo);
          var header = document.getElementById('header');
          var mq = window.matchMedia( "(max-width: 480px)" );

          function busqueda(){
            var cadena="funcion buscar disparada";
            alert(cadena);
          }

          hammerCirculo.on('tap', function(e) {
            console.log(e);
            if (mq.matches) {
              cajaBusqueda.classList.toggle('mostrar');
              header.classList.toggle('solapar');
              circulo.classList.toggle('enfasis');
              var claseCirculo=circulo.getAttribute("class");
              if (claseCirculo=="circulo"){
                busqueda();
              }
            }
            else {
              busqueda();
            }
          });
    }
};
