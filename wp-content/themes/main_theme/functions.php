<?php

function mi_tema_setup() {
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mi_tema_setup');

function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );

// Registrar Menús
function perzonalized_register_my_menus() {
  register_nav_menus( array(
    'main_menu' => __( 'Main Menu', 'perzonalized' ),
    'dropdown_menu' => __( 'Links Menu', 'perzonalized' ),
    'secondary_menu' => __( 'Secondary Menu', 'perzonalized' ),
    'footer_menu' => __( 'Footer', 'perzonalized' ),
    'alternative_footer' => __( 'Servicios footer', 'perzonalized' ),
  ) );
}
add_action( 'init', 'perzonalized_register_my_menus' );
  
function perzonalized_widgets_areas(){  
  register_sidebar( 
    array(
      'name' => 'Logo del Header',
      'id' => 'logo_header'
    )
  );
  register_sidebar( 
    array(
      'name' => 'Logo del Footer',
      'id' => 'logo_footer'
    )
  );
  register_sidebar( 
    array(
      'name' => 'Icono de logo',
      'id' => 'icono_de_logo'
    )
  );
  register_sidebar( 
    array(
      'name' => 'Copy',
      'id' => 'copy'
    )
  );
  register_sidebar( 
    array(
      'name' => 'Redes sociales',
      'id' => 'social'
    )
  );
  register_sidebar( 
    array(
      'name' => 'Selector de idioma',
      'id' => 'idioma'
    )
  );
  register_sidebar( 
    array(
      'name' => 'Botón CTA (al costado del menú Header)',
      'id' => 'btn_header'
    )
  );
}
add_action( 'widgets_init', 'perzonalized_widgets_areas' );

function custom_excerpt_length($content, $limit) {
    $words = explode(' ', $content);
    if (count($words) > $limit) {
        return implode(' ', array_slice($words, 0, $limit)) . '...';
    } else {
        return $content;
    }
}

function add_custom_body_class( $classes ) {
  global $post;
  
  if( is_page() && isset( $post->ID ) ) {
      $template_slug = get_page_template_slug( $post->ID );
      if( $template_slug == 'template-pages/page-default.php' ) {
          $classes[] = 'page_default';
      }
      if( $template_slug == 'template-pages/page-about.php' ) {
        $classes[] = 'page_about';
      }
      if( $template_slug == 'template-pages/page-services.php' ) {
        $classes[] = 'page_services';
      }
      if( $template_slug == 'template-pages/page-contact.php' ) {
        $classes[] = 'page_contact';
      }
  }
  
  return $classes;
}
add_filter( 'body_class', 'add_custom_body_class' );

function get_service_details() {
  $post_id = $_POST['post_id'];

  // Obtener la URL de YouTube desde ACF
  $youtube_url = get_field('url_de_youtube', $post_id);
  $youtube_id = get_youtube_video_id($youtube_url);
  $youtube_image_url = 'https://img.youtube.com/vi/' . $youtube_id . '/maxresdefault.jpg';

  // Verificar si existe una imagen en el campo ACF 'imagen_de_popup'
  $acf_image_url = get_field('imagen_de_popup', $post_id);
  $image_to_use = $acf_image_url ? $acf_image_url : $youtube_image_url;

  $data = array(
      'title' => get_the_title($post_id),
      'description' => get_the_excerpt($post_id),
      'image_url' => $image_to_use,
      'youtube_iframe_url' => $youtube_url ? 'https://www.youtube.com/embed/' . $youtube_id : '',
      'has_youtube_url' => !empty($youtube_url) // Indicador de si existe una URL de YouTube
  );

  echo json_encode($data);
  wp_die();
}

add_action('wp_ajax_nopriv_get_service_details', 'get_service_details');
add_action('wp_ajax_get_service_details', 'get_service_details');


function get_youtube_video_id($url) {
  preg_match("/(youtu.be\/|youtube.com\/watch\?v=|youtube.com\/embed\/)([^\&\?\/]+)/", $url, $matches);
  return $matches[2] ?? null;
}

function cargar_css_condicional() {
  if (is_page_template('template-pages/page-front.php') || is_page_template('template-pages/page-about.php')) {
      wp_enqueue_style('pagepiling-css', 'https://cdnjs.cloudflare.com/ajax/libs/pagePiling.js/1.5.6/jquery.pagepiling.min.css');
  }
}
add_action('wp_enqueue_scripts', 'cargar_css_condicional');

function cargar_scripts_condicional() {
  // Reemplaza 'tu_plantilla' con la plantilla específica o ID de página.
  if (is_page_template('template-pages/page-front.php') || is_page_template('template-pages/page-about.php')) {
      wp_enqueue_script('pagepiling-js', 'https://cdnjs.cloudflare.com/ajax/libs/pagePiling.js/1.5.6/jquery.pagepiling.min.js', array('jquery'), null, true);

      // Añade un script adicional para inicializar pagePiling
      wp_add_inline_script('pagepiling-js', 'jQuery(document).ready(function($) { $("#pagepiling").pagepiling(); });');
  }
}
add_action('wp_enqueue_scripts', 'cargar_scripts_condicional');