jQuery(document).ready(function($) {
  var janela = $(window);

  //////////////////////////////////////// MENU CANVAS
  var btMenu = $('#bt-menu'),
      tagMain = $('main'),
      tagCanvas = $('.canvas'),
      tagOverlay = $('.canvas-overlay');

  tagMain.prepend( "<div class='canvas-overlay'></div>" );

  function escondeCanvas() {
    $('.canvas, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').removeClass('db');
    },330)
    tagMain.off('mousedown', escondeCanvas);
    tagCanvas.off('swipeleft', escondeCanvas);
    tagOverlay.removeClass('visivel');
    console.log('escondeu');
    
  }

  function mostraCanvas() {
    $('.canvas, .canvas-overlay').addClass('db');
    setTimeout(function(){
      $('.canvas, .canvas-overlay').addClass('visivel');
    },20)
    tagMain.on('mousedown', escondeCanvas);
    tagCanvas.on('swipeleft', escondeCanvas);
  }
  btMenu.on('click', function(){
    mostraCanvas();
  }); 

  //////////////////////////////////////// ATRIBUIR NOPIN NO GRAVATAR
  var gravatar = $('img.avatar');
  if (gravatar.length > 0) { gravatar.attr('data-pin-nopin', 'true'); }  


  //////////////////////////////////////// FANCYBOX
  var abrirFancybox = $('.abre-modal');
  abrirFancybox.on('click', function(event) {
    var thisTarget = $(this).data('target');
    event.preventDefault();
    $.fancybox.open($(thisTarget));
  });

  var abrirIMG = $('.afczoom');
  abrirIMG.fancybox();

  // galeria gutenberg
  var linkIMGfancybox = $('.wp-block-gallery figure a');
  linkIMGfancybox.attr('data-fancybox', 'gallery');
  linkIMGfancybox.fancybox({
    caption : function( instance, item ) {
      return $(this).siblings('figcaption').html();
    }
  });


  ////////////////////////////////////// INSTA
  var seletorInsta = $('#insta-principal');
  if (seletorInsta.length > 0) {
    var feed = new Instafeed({
        get: 'user',
        target: 'insta-principal', 
        userId: seletorInsta.data('iduser'), 
        accessToken: seletorInsta.data('token'), 
        limit: seletorInsta.data('limit'), 
        resolution: seletorInsta.data('size'),
        template: '<a href="{{link}}" style="background-image:url({{image}});" target="_blank"><img data-pin-nopin="true" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz8zQ8SIYmFhMQmrGflRYqPMpKEkjVEGmzfXmxk1M17vzaTJVtlOUWLj14K/gK2yVopIycLKmtig5zyjRjLndu753O+953TvueCOplXGquqBTDZnRsJB32xszlfzSB3NtNCLX1OWMTI1NUFFe7vB5cSrgFOr8rl/rX5RtxS4aoWHlWHmhMeEJ1ZyhsObwi0qpS0KHwv7Tbmg8LWjx0v85HCyxB8Om9FICNxNwr7kL47/YpUyM8Lycjoy6bz6uY/zEq+enZmW2C7ehkWEMEF8jDNKiAHpypDMAwToo1tWVMjv+c6fZFlylcwGBUyWSJIih1/UvFTXJSZE12WkKTj9/9tXK9HfV6ruDUL1g22/dELNBnwWbft937Y/D8BzD2fZcv7yHgy+il4sax270LgGJ+dlLb4Fp+vQemdopvYtecTdiQQ8H0FDDJovoW6+1LOffQ5vIboqX3UB2zvQJecbF74Ap1xoA4/r0yEAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAgSURBVGiB7cEBAQAAAIIg/69uSEABAAAAAAAAAADAowEnQgABZI4xPgAAAABJRU5ErkJggg=="><span><i class="fab fa-instagram"></i></span></a>',
    });
    feed.run(); 
  }



  //////////////////////////////////////// BUSCA
  $('#menu').find("#ativar-busca").on('click', function(event) {
    $("#busca").addClass('visivel');
    $("html,body").addClass('noscroll');
  });

  $("#busca").on('click', function(event) {
    $(this).removeClass('visivel');
    $("html,body").removeClass('noscroll');
  }).find("form").on('click', function(event) {
    event.stopPropagation();
  });;



  //////////////////////////////////////// SLIDE ANTES E DEPOIS
  var slideAntesDepois = $( ".beer-slider" );
  if (slideAntesDepois.length > 0) {
    $.fn.BeerSlider = function( options ) {
      options = options || {};
      return this.each( function () {
        new BeerSlider( this, options );
      });
    };
    slideAntesDepois.each( function( index, el ) {
      $( el ).BeerSlider( {start: $( el ).data( "start" ) } )
    });
  }

  //////////////////////////////////////// SUBIR TOPO
  var irAoTopo = $('a#toTop');
  irAoTopo.click(function(){
    $('html, body').animate({scrollTop:0},1100);
    return false;
  }); 


  //////////////////////////////////////// EVENTOS DE JANELA
  janela.bind('scroll', function () {
      if (janela.scrollTop() > 350) {
        irAoTopo.addClass('mostra');
      } else if (janela.scrollTop() < 350) {
        irAoTopo.removeClass('mostra');
      }
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
        afterClose: function(){
          sessionStorage.setItem('popupTempoAbriu','true');
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
            afterClose: function(){
              sessionStorage.setItem('popupScrollAbriu','true');
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
          afterClose: function(){
            sessionStorage.setItem('popupSaidaAbriu','true');
          }
        });
      }
    });
  }


  //////////////////////////////////////// COPIAR LINK PARA CLIPBOARD
  var shortlink = $("#copiar-texto");
  function fallbackCopyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position="fixed";  //avoid scrolling to bottom
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Fallback: Copying text command was ' + msg);
    } catch (err) {
      console.error('Fallback: Oops, unable to copy', err);
    }

    document.body.removeChild(textArea);
  }
  function copyTextToClipboard(text) {
    if (!navigator.clipboard) {
      fallbackCopyTextToClipboard(text);
      return;
    }
    navigator.clipboard.writeText(text).then(function() {
      console.log('Async: Copying to clipboard was successful!');
    }, function(err) {
      console.error('Async: Could not copy text: ', err);
    });
  }

  if (shortlink.length > 0) {
    shortlink.on('click', function(event) {
        copyTextToClipboard($(this).text());
        $(this).text("LINK COPIADO!")
        $(this).off("click");
    });
  }

});











