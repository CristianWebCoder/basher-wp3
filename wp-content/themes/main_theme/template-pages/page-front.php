<?php
/**
 * Template Name: HomePage Basher
 */
// Exit if accessed directly
defined('ABSPATH') or die('No script kiddies please!');
get_header();
?>
<?php get_template_part('template-parts/loader'); ?>
<?php get_template_part('template-parts/menu/menu'); ?>
<div class="main_scrollsnap" id="pagepiling">
    <!-- CONTENIDO -->
    <section class="section section_banner_and_clients">
        <!-- 2. BANNER -->
        <?php if (have_rows('seccion_banner')) : ?>
            <?php while (have_rows('seccion_banner')) : the_row(); ?>
            <?php
                $title_banner = get_sub_field('titulo_del_banner');
                $button_banner = get_sub_field('texto_del_boton');
                $image_id = get_sub_field('imagen_del_banner');
                $url_de_pagina = get_sub_field('url_de_pagina');
                $url_personalizada = get_sub_field('url_personalizada');

                // Decide qué URL usar para el enlace del botón
                $button_url = $url_personalizada ? $url_personalizada : $url_de_pagina;

            ?>
                <div class="section_banner">
                    <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                    <div class="container">
                        <div class="col col-50">
                            <span class="line">
                                <h1 class="title_banner"><?php echo __($title_banner, 'main_theme') ?></h1>
                            </span>
                            <a href="<?php echo esc_url($button_url); ?>" class="primary_button"><?php _e($button_banner, 'main_theme') ?></a>
                        </div>
                        <div class="col col-50">
                            <?php 
                            if ($image_id) {
                                $image_url = wp_get_attachment_image_url($image_id, 'full'); // O usa un tamaño específico en lugar de 'full'
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="526" height="406">
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- 3. CLIENTES SLIDER -->
        <div class="section_clients">
            <div class="slider">
                <div class="slide_track">
                <?php 
                    // Obtén los objetos de publicación seleccionados del campo personalizado 'seccion_clientes'
                    $cliente_posts = get_field('seccion_clientes');

                    // Verifica si hay posts
                    if ($cliente_posts): 
                        foreach ($cliente_posts as $post): 
                            // Configura el post global con el post actual del loop
                            setup_postdata($post);

                            // Obtén el ID de la imagen destacada del post
                            $image_id = get_post_thumbnail_id();

                            // Obtén la URL de la imagen y el texto alternativo (alt) utilizando el ID de la imagen.
                            $image_url = wp_get_attachment_image_url($image_id, 'full'); // O un tamaño de imagen específico en lugar de 'full'
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                            
                            // Imprime la imagen del cliente con la URL y el alt text
                            if ($image_url): // Verifica si la imagen existe
                ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="120" height="40">
                <?php 
                            endif;
                        endforeach;
                        wp_reset_postdata(); // Restablecer los datos del post para la siguiente consulta
                    endif;
                ?>
                </div>
            </div>
        </div>
    </section>
    <!-- 4. WE ARE -->
    <?php if (have_rows('seccion_somos')) : ?>
        <?php while (have_rows('seccion_somos')) : the_row(); ?>
            <?php 
                $subtitle_border = get_sub_field('subtitulo_de_borde');
                $sub_text_1 = get_sub_field('subtexto_nro_1');
                $sub_text_2 = get_sub_field('subtexto_nro_2');
                $sub_text_3 = get_sub_field('subtexto_nro_3');
                $sub_text_4 = get_sub_field('subtexto_nro_4');
                $sub_text_5 = get_sub_field('subtexto_nro_5');
                $description = get_sub_field('descripcion');
            ?>
            <section class="section section_we_are">
                <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                <div class="container">
                    <div class="col">
                        <h2>
                            <span class="subtitle_border">
                                <p><?php echo __($subtitle_border, 'main_theme') ?></p>
                            </span>
                            <span class="text">
                                <span class="sub_text sub"><p><?php echo __($sub_text_1, 'main_theme') ?></p></span>
                                <span class="sub_text sub2"><p><?php echo __($sub_text_2, 'main_theme') ?></p></span>
                                <span class="sub_text sub3"><p><?php echo __($sub_text_3, 'main_theme') ?></p></span>
                                <span class="sub_text sub4"><p><?php echo __($sub_text_4, 'main_theme') ?></p></span>
                                <span class="sub_text sub5"><p><?php echo __($sub_text_5, 'main_theme') ?></p></span>
                            </span>
                        </h2>
                    </div>
                    <div class="col">
                        <div class="description">
                        <?php echo __($description, 'main_theme') ?>
                        </div>
                    </div>
                </div>
                <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- 5. SERVICES -->
    <?php if (have_rows('seccion_servicios')) : ?>
        <?php while (have_rows('seccion_servicios')) : the_row(); ?>
            <section class="section section_services pp-scrollable">
                <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                <div class="container">
                    <?php
                        $subtitle = get_sub_field('subtitulo');

                        $button_banner = get_sub_field('texto_del_boton');
                        
                        $url_de_pagina = get_sub_field('url_del_boton_pagina');
                        $url_personalizada = get_sub_field('url_del_boton_personalizado');

                        $servicios = get_sub_field('servicios_a_mostrar');

                        // Decide qué URL usar para el enlace del botón
                        $button_url = $url_personalizada ? $url_personalizada : $url_de_pagina;

                    ?>
                    <h2 class="subtitle"><?php echo __($subtitle, 'main_theme') ?></h2>
                    <div class="card_services">
                        <?php
                            if ($servicios):
                                foreach ($servicios as $post):
                                    // Setup post data for each related post
                                    setup_postdata($post);
                                    ?>
                                    <div class="line_card">
                                        <div class="card">
                                            <div class="info">
                                                <div class="icon_and_text">
                                                    <?php 
                                                    $img_id = get_post_thumbnail_id($post->ID); 
                                                    $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); 
                                                    ?>
                                                    <img src="<?php the_post_thumbnail_url('service-icon'); ?>" alt="<?php echo $alt_text; ?>" width="48" height="48">
                                                    <h3><?php the_title(); ?><br></h3>
                                                </div>
                                                <p class="description">
                                                    <?php 
                                                    $excerpt = get_the_excerpt();
                                                    echo substr($excerpt, 0, 80) . '...';  // Limita a 25 caracteres y añade puntos suspensivos
                                                    ?>
                                                </p>
                                            </div>
                                            <a href="#" class="terciary_button open_modal" data-post-id="<?php echo get_the_ID(); ?>">
                                                <i class="icono">
                                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.865845 10.4266C0.387552 10.7027 0.223677 11.3143 0.499819 11.7926C0.775962 12.2709 1.38755 12.4348 1.86584 12.1586L0.865845 10.4266ZM15.8502 3.74654C15.9932 3.21308 15.6766 2.66474 15.1431 2.5218L6.44978 0.192427C5.91631 0.0494853 5.36797 0.366068 5.22503 0.899534C5.08209 1.433 5.39867 1.98134 5.93214 2.12428L13.6595 4.19483L11.589 11.9222C11.4461 12.4557 11.7626 13.004 12.2961 13.147C12.8296 13.2899 13.3779 12.9733 13.5208 12.4399L15.8502 3.74654ZM1.86584 12.1586L15.3843 4.35375L14.3843 2.6217L0.865845 10.4266L1.86584 12.1586Z" fill="white"/>
                                                    </svg>
                                                </i>
                                                Ver más
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                wp_reset_postdata(); // Importante para restablecer la consulta global
                            endif;
                        ?>  
                    </div>
                    <a href="<?php echo esc_url($button_url); ?>" class="primary_button"><?php _e($button_banner, 'main_theme') ?></a>
                </div>
                <div class="service_before">
                </div>
                <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- 6. TESTIMONIOS -->
    <?php if (have_rows('seccion_testimonios')) : ?>
        <?php while (have_rows('seccion_testimonios')) : the_row(); ?>
            <?php 
                $subtitle = get_sub_field('subtitulo');
                $testimonios = get_sub_field('carrusel_de_testimonios');
            ?>
            <section class="section section_testimonial pp-scrollable">
                <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                <div class="container">
                    <h2 class="subtitle"><?php echo __($subtitle, 'main_theme') ?></h2>
                    <div class="swiffy-slider slider-item-reveal slider-item-show3 slider-nav-square slider-nav-visible  slider-nav-autopause slider-nav-autoplay slider-indicators-round slider-nav-animation slider-nav-animation-appear slider-nav-animation-fast slider-nav-mousedrag">
                        <div class="slider-container">
                            <?php if( $testimonios ): ?>
                                <?php foreach( $testimonios as $post): // Variable must be called $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>
                                    <div class="card_testimonial">
                                        <div class="description"><?php the_excerpt(); ?></div>
                                        <?php 
                                        // Asumiendo que la imagen del logo del cliente está establecida como imagen destacada
                                        $img_id = get_post_thumbnail_id($post->ID); 
                                        $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
                                        ?>
                                        <img class="logo_client" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt_text; ?>" width="90" height="22">
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                        </div>
                        <ul class="slider-indicators">
                            <li class=""></li>
                            <li class="active"></li>
                        </ul>
                    </div>
                </div>
                <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- 7. CONTACT US -->
    <?php if (have_rows('seccion_contacto')) : ?>
        <?php while (have_rows('seccion_contacto')) : the_row(); ?>
            <?php 
                $subtitle = get_sub_field('subtitulo');
                $shortcode = get_sub_field('shortcode_de_contact_form_7');
            ?>
            <section class="section section_contact pp-scrollable">
                <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                <div class="container container_form">
                    <h2 class="subtitle"><?php echo __($subtitle, 'main_theme') ?></h2>
                    <?php echo do_shortcode($shortcode); ?>
                </div>
                <div class="container container_thank_you">
                    <div class="content">
                        <p class="title_thanks"><?php echo __('Gracias', 'main_theme') ?></p>
                        <p>
                            <span><?php echo __('Pronto nos', 'main_theme') ?></span>
                            <span><?php echo __('contactaremos', 'main_theme') ?></span>
                            <span><?php echo __('contigo', 'main_theme') ?></span>
                        </p>
                    </div>
                </div>
                <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/footer/footer-part'); ?>
</div>
<?php get_template_part('template-parts/modals/modal-service'); ?>
<?php get_template_part('template-parts/modals/modal-video'); ?>
<script type="text/javascript">
    var copy = $('.slide_track').clone(true);
    $('.slider').append(copy);

    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

    $(document).ready(function() {
        var header = $('.section_header'); // Selecciona el elemento del encabezado
        var headerLinks = $('.header_links'); // Selecciona los enlaces del encabezado

        function checkActiveClass() {
            // Verifica si la sección .section_banner_and_clients tiene la clase 'active'
            if (!$('.section_banner_and_clients').hasClass('active')) {
                // Si no tiene la clase 'active', añade las clases 'sticky' al encabezado
                header.addClass('sticky');
                headerLinks.addClass('sticky_links');
            } else {
                // Si tiene la clase 'active', remueve las clases 'sticky' del encabezado
                header.removeClass('sticky');
                headerLinks.removeClass('sticky_links');
            }
        }

        // Establecer un intervalo para comprobar la clase 'active' cada 100 milisegundos
        setInterval(checkActiveClass, 100);
    });
</script>
<?php get_footer(); ?>