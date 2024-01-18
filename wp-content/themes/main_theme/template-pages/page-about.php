<?php
/**
 * Template Name: About Us - Basher
 */
// Exit if accessed directly
defined('ABSPATH') or die('No script kiddies please!');
get_header();
?>
<?php get_template_part('template-parts/loader'); ?>
<?php get_template_part('template-parts/menu/menu'); ?>
<div class="main_scrollsnap" id="pagepiling">
    <!-- 1. BANNER -->
    <?php if (have_rows('seccion_banner')) : ?>
        <?php while (have_rows('seccion_banner')) : the_row(); ?>
            <?php 
                $subtitle_border = get_sub_field('titulo_con_borde');
                $sub_text_1 = get_sub_field('sub_texto_nro_1');
                $sub_text_2 = get_sub_field('sub_texto_nro_2');
                $sub_text_3 = get_sub_field('sub_texto_nro_3');
                $sub_text_4 = get_sub_field('sub_texto_nro_4');
                $sub_text_5 = get_sub_field('sub_texto_nro_5');
            ?>
            <section class="section section_banner">
                <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                <div class="container">
                    <h1>
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
                    </h1>
                </div>
                <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- 2. MISION -->
    <?php if (have_rows('seccion_mision')) : ?>
        <?php while (have_rows('seccion_mision')) : the_row(); ?>
            <?php 
                $subtitle = get_sub_field('subtitulo');
                $descripcion_sup = get_sub_field('descripcion_superior');
                $descripcion_inf = get_sub_field('descripcion_inferior');
            ?>
            <section class="section section_mision pp-scrollable">
                <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                <div class="container">
                    <div class="col">
                        <h2 class="subtitle"><?php echo __($subtitle, 'main_theme') ?></h2>
                    </div>
                    <div class="col">
                        <div class="super_description"><?php echo __($descripcion_sup, 'main_theme') ?></div>
                        <div class="description"><?php echo __($descripcion_inf, 'main_theme') ?></div>
                    </div>
                </div>
                <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- 3. VISION -->
    <?php if (have_rows('seccion_vision')) : ?>
        <?php while (have_rows('seccion_vision')) : the_row(); ?>
            <?php 
                $subtitle = get_sub_field('subtitulo');
                $descripcion_sup = get_sub_field('descripcion_superior');
                $descripcion_inf = get_sub_field('descripcion_inferior');
            ?>
            <section class="section section_vision pp-scrollable">
                <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
                <div class="container">
                    <div class="col">
                        <h2 class="subtitle"><?php echo __($subtitle, 'main_theme') ?></h2>
                    </div>
                    <div class="col">
                        <div class="super_description"><?php echo __($descripcion_sup, 'main_theme') ?></div>
                        <div class="description"><?php echo __($descripcion_inf, 'main_theme') ?></div>
                    </div>
                </div>
                <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- 4. PLANET -->
    <?php if (have_rows('seccion_mundo')) : ?>
        <?php while (have_rows('seccion_mundo')) : the_row(); ?>
            <?php 
                $subtitle = get_sub_field('subtitulo');
                $descripcion = get_sub_field('descripcion');
            ?>
            <section class="section section_earth">
                <div class="container">
                    <h2 class="subtitle"><?php echo __($subtitle, 'main_theme') ?></h2>
                    <div class="description"><?php echo __($descripcion, 'main_theme') ?></div>
                </div>
                <div class="map">
                    <div class="list_countries">
                        <div class="country c_canada">
                            <p>Canada</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_mexico">
                            <p>México</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_colombia">
                            <p>Colombia</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_peru">
                            <p>Peru</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_chile">
                            <p>Chile</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_argentina">
                            <p>Argentina</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_brazil">
                            <p>Brazil</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_netherlands">
                            <p>Netherlands</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_germany">
                            <p>Germany</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_malaysa">
                            <p>Malaysa</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_singapore">
                            <p>Singapore</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_indonesia">
                            <p>Indonesia</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                        <div class="country c_philippines">
                            <p>Philippines</p>
                            <span class="map_indicator">
                                <span class="circle"></span>
                                <span class="indicator"></span>
                            </span>
                        </div>
                    </div>  
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part('template-parts/footer/footer-part'); ?>
</div>
<script>
    $(document).ready(function() {
        var header = $('.section_header'); // Selecciona el elemento del encabezado
        var headerLinks = $('.header_links'); // Selecciona los enlaces del encabezado

        function checkActiveClass() {
            // Verifica si la sección .section_banner_and_clients tiene la clase 'active'
            if (!$('.section_banner').hasClass('active')) {
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