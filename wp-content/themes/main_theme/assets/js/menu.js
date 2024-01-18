// Menu y submenu en desktop y mobile
$(document).ready(function() {
    var $subMenu = $('.submenu');
    var $openSubMenu = $('.menu-item-has-children');
    var $openSubMenuLink = $('.menu-item-has-children > a');

    $openSubMenu.on('click', function(e) {
        e.stopPropagation(); // Evita que el evento se propague a otros elementos
        $subMenu.toggleClass('show');
        $openSubMenu.toggleClass('rotate');
    });

    $openSubMenuLink.on('click', function(e) {
        e.preventDefault(); // Evita la acción predeterminada solo del enlace "Artículos"
    });

    $(document).on('click', function(e) {
        if ($subMenu.hasClass('show') && !$subMenu.is(e.target) && !$openSubMenu.is(e.target) && $subMenu.has(e.target).length === 0 && $openSubMenu.has(e.target).length === 0) {
            $subMenu.removeClass('show');
            $openSubMenu.removeClass('rotate');
        }
    });
});
// Quitando el scroll del body cuando se abre el popup menu
$(document).ready(function() {
    $('.menu_toggle').on('click', function() {
        $('.header_links').toggleClass('show'); 
        $('body').toggleClass('no-scroll'); 
        $(this).toggleClass('active');
    });
});

$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0) {
            $('.section_header').addClass('sticky');
            if ($(window).width() <= 768) {
                $('.header_links').addClass('sticky_links');
            }
        } else {
            $('.section_header').removeClass('sticky');
            $('.header_links').removeClass('sticky_links');
        }
    });
  
    $(window).resize(function() {
      if ($(window).width() <= 768 && $(window).scrollTop() > 0) {
        $('.header_links').addClass('sticky_links');
      } else {
        $('.header_links').removeClass('sticky_links');
      }
    });
});  