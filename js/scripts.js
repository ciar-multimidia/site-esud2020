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



  //////////////////////////////////////// POP UP RECURSOS
  var popupTempo = $('#popupTempo'),
      popupScroll = $('#popupScroll'),
      popupSaida = $('#popupSaida');
  // var popupDelay = popupTempo.data('tempo');

  // se eh por tempo
  if (popupTempo.length > 0 && sessionStorage.getItem('popupTempoAbriu') !== 'true') {
    setTimeout(function(){
      $.fancybox.open(popupTempo, {
        beforeShow: function(){
          $("body,html").addClass('noscroll');
        },
        afterClose: function(){
          sessionStorage.setItem('popupTempoAbriu','true');
          $("body,html").removeClass('noscroll');
        }
      });
    },500);
  }

  // se eh por rolagem
  if (popupScroll.length > 0 && sessionStorage.getItem('popupScrollAbriu') !== 'true') {
    var popupScrollJaAbriu = false;

    janela.on("scroll", function () {
       if ($(this).scrollTop() > 800 && popupScrollJaAbriu === false) {
          popupScrollJaAbriu = true;
          $.fancybox.open(popupScroll, {
            beforeShow: function(){
              $("body,html").addClass('noscroll');
            },
            afterClose: function(){
              sessionStorage.setItem('popupScrollAbriu','true');
              $("body,html").removeClass('noscroll');
            }
          });
       } 
    });
  }

  // se eh na saida da janela
  if (popupSaida.length > 0 && sessionStorage.getItem('popupSaidaAbriu') !== 'true') {
    var popupSaidaJaAbriu = false;
    $(document).on('mouseleave', function(event) {
      if (!popupSaidaJaAbriu) {
        popupSaidaJaAbriu = true;
        $.fancybox.open(popupSaida, {
          beforeShow: function(){
            $("body,html").addClass('noscroll');
          },
          afterClose: function(){
            sessionStorage.setItem('popupSaidaAbriu','true');
            $("body,html").removeClass('noscroll');
          }
        });
      }
    });
  }

});











