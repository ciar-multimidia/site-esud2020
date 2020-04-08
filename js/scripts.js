jQuery(document).ready(function($) {
  var janela = $(window);

  //////////////////////////////////////// MENU
  var btMenu = $('#botao-menu');
  var listaMenu = $('#lista-menu');

  btMenu.click(function(){
    if (listaMenu.hasClass('mostrar')) {
      this.setAttribute('aria-expanded', 'false');
      listaMenu.removeClass("mostrar");
    } else {
      this.setAttribute('aria-expanded', 'true');
      listaMenu.addClass("mostrar");
    }
  });

  //////////////////////////////////////// FANCYBOX
  var abrirFancybox = $('.abre-modal');
  abrirFancybox.on('click', function(event) {
    var thisTarget = $(this).data('target');
    event.preventDefault();
    $.fancybox.open($(thisTarget));
  });

  var abrirIMG = $('.zoom');
  abrirIMG.fancybox();

  // galeria gutenberg
  var linkIMGfancybox = $('.wp-block-gallery figure a');
  linkIMGfancybox.attr('data-fancybox', 'gallery');
  linkIMGfancybox.fancybox({
    caption : function( instance, item ) {
      return $(this).siblings('figcaption').html();
    }
  });



  //////////////////////////////////////// MARCA DO TOPO
  var scrollAtual = janela.scrollTop;
  var nomeEvento = $('#nome-evento');

  janela.on('scroll', function () {
      var thisScroll = $(this).scrollTop();
      if (thisScroll > scrollAtual && thisScroll > 300) {
        nomeEvento.addClass('mostrar');
      } 

      if (thisScroll < scrollAtual && thisScroll < 300) {
        nomeEvento.removeClass('mostrar');
      }

      scrollAtual = thisScroll;
  }); 



  //////////////////////////////////////// SUBIR TOPO
  var irAoTopo = $('a#toTop');
  irAoTopo.click(function(){
    $('html, body').animate({scrollTop:0},1100);
    return false;
  }); 

});











