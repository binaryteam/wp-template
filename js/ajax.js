
var webApp =  (function($){
  var baseUrl = baseUrl,
      $content_ajax = null,
      $load_more = null,
      $loading = null,
      $body = $('body'),
      loading = true,
      existeLoad = true,
      isSingle = false,
      config = {
        container: null,
        loadMore: null,
        loading: null
      };

  function init(opts) {   // inicializa el app pasan como parametro el container principal de cada vista
    config = opts;

    $load_more = $(config.loadMore);
    $loading = $(config.loading);
    $content_ajax = $(config.container);

    if(config.loadMore !== undefined) {
      var nextPage = $content_ajax.find('.nav-previous').length;
      if((nextPage > 0) && ($body.hasClass('home') || $body.hasClass('page')))  {
        _updateLoadMore();
      }
    }

    if(!history.pushState && location.hash) {   // para IE que no soportan pushState
      var State = History.getState();
          url = State.url.replace('#','');
          location.href = url;
    }

    History.Adapter.bind(window,'statechange',function(){ // comprueba cuando la url ha cambiado y hace la actualización de la vista
      loadViewChangeUrl();
    });
  }

  function _updateLoadMore() {  // permite actualizar la url del boton "load more"
    if(config.loadMore !== undefined) {
      if($content_ajax.find('.nav-previous').html()) {
        $load_more.attr('data-next', $content_ajax.find('.nav-previous').find('a').attr('href'));
      }else{
        $load_more.remove();
      }
    }
    if(isSingle) $load_more.remove();

  }

  function _animateAppearPost($container) {   // permite hacer la animación cuando el ajax trae nuevos post
    var top = $container.find('.appear').offset().top;
    setTimeout(function(){
      $('body, html').animate({
        scrollTop: top
      }, 1000, 'easeInOutQuad', function() {
         $content_ajax.find('.list_post').removeClass('appear');
      });
    }, 100)
  }

  function _pushState(obj, title, url) {
    History.pushState(obj, title, url);
  }

  function _animate($elem, props, time, easing, callback) {   // animacion de elementos
    $elem.stop().animate(props, time, easing || 'swing', callback || null);
  }

  function changeURL(link) {   // actualiza la url 
    var url = link.attr('href'),
        title = link.html();

    isSingle = link.parent().hasClass('view_single') ? true : false;

    _pushState(null, title, url);
  }

  function loadViewChangeUrl(callback) {  // carga contenido cuando cambia la url
    var State = History.getState(),
        url = "",
        callback = callback || function(){};

    url = (history.pushState) ? State.url : State.url.replace('#','');
   
     $.ajax({
        url: url,
        beforeSend: function() {
          _animate($content_ajax, {opacity: 0}, 800, 'easeOutExpo');
          $loading.fadeIn(300);
          if(config.loadMore !== undefined) {
            _animate($load_more, {opacity: 0}, 800, 'easeOutExpo');
            if ($('#cotent_main_ajax').find('#load_more')[0] == undefined) existeLoad = false;    // comprueba si el boton de paginador existe
          }
          
        }
    }).done(function(html) {
      if(config.loadMore !== undefined) {
        if(!existeLoad) { // si no existe lo agrega
          $('#cotent_main_ajax').append($load_more);
        }
      }
      var content_page = $(html).find(config.container).html();
      $content_ajax.html(content_page);
      _updateLoadMore();
      _animate($content_ajax, {opacity: 1}, 800, 'easeOutExpo');
      if(config.loadMore !== undefined) {
        _animate($load_more, {opacity: 1}, 800, 'easeOutExpo');
      }
      $loading.fadeOut(300);
      FB.XFBML.parse(); // para parsear los botones facebook cuando viene en ajax
    });
    
/*    $content_ajax.load( url + " #content_ajax", function( response, status, xhr ) {
      console.log(xhr);
    });*/
  }

  function loadPagination(url, callback) {  // permite hacer la paginación ajax
    if(config.loadMore !== undefined) {
      if(loading) {   // verfico si esta cargando contenido
        loading = false;  // se asegura que no llame seguidas veces al botón
        $.ajax({
            url: url,
            beforeSend: function() {
              $('.navpage').remove();
              if(config.loadMore !== undefined) $load_more.html('loading');
            }
        }).done(function(html) {
            var content_page = $(html).find(config.container).html();
            $content_ajax.append(content_page);
            $content_ajax.find('.list_post:last').addClass('appear');
            $content_ajax.find('.appear').find('article').each(function(index, item){
              $(item).delay(300 * index).fadeIn(600);
              if(index == 0) {
                _animateAppearPost($content_ajax);
              }
            })
            _updateLoadMore();
            FB.XFBML.parse(); // para parsear los botones facebook cuando viene en ajax
            if(config.loadMore !== undefined) $load_more.html('load more');
            
            loading = true; // vuelo a activar el boton para el llamado ajax

            callback();
        });
      }
    }
  }

  return {
    init: init,
    loadPagination: loadPagination,
    changeURL: changeURL
  }
}(jQuery));

// code web
(function($, app) {

  app.init({
    container:'#content_ajax',
    loadMore: '#load_more',
    loading: '#loading',
  });

  $('body').delegate('#load_more','click', function() {
    app.loadPagination($(this).attr('data-next'), function(){ });
  });

  $('.menu-item a').click(function(e) {
    app.changeURL($(this));
    e.preventDefault();
  });

  $('body').delegate('.view_single','click', function(e) {
    $link = $(this).find('a');
    app.changeURL($link);
    e.preventDefault();
  });

  /*$(window).bind('hashchange', function(){
    console.log('alert');
  });*/
  
  /*window.onhashchange = function() {
      alert('fda');
  }*/

}(jQuery, webApp))