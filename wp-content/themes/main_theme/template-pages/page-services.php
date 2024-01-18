<?php
/**
 * Template Name: Services - Basher
 */
// Exit if accessed directly
defined('ABSPATH') or die('No script kiddies please!');
get_header();
?>
<?php get_template_part('template-parts/loader'); ?>
<?php get_template_part('template-parts/menu/menu'); ?>

<!-- CONTENIDO -->
<main class="main_body">
    <section class="section_services">
        <img class="cubito-flotante cub-1" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-1.svg" alt="cubito">
        <?php if (have_rows('seccion_banner')) : ?>
            <?php while (have_rows('seccion_banner')) : the_row(); ?>
                <?php 
                    $titulo = get_sub_field('titulo_principal');
                    $descripcion = get_sub_field('descripcion_principal');
                ?>
                <div class="container">
                    <h1 class="subtitle"><?php echo __($titulo, 'main_theme') ?></h1>
                    <div class="super_description"><?php echo __($descripcion, 'main_theme') ?></div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="container">
            <?php $servicios = get_field('seccion_servicios'); ?>
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
        </div>
        <div class="service_before">
        </div>
        <img class="cubito-flotante cub-2" src="<?php echo get_template_directory_uri() ?>/assets/img/cubito-2.svg" alt="cubito">
    </section>
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
</main>
<?php get_template_part('template-parts/footer/footer-part'); ?>
<?php get_template_part('template-parts/modals/modal-service'); ?>
<?php get_template_part('template-parts/modals/modal-video'); ?>
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

<?php get_footer(); ?>