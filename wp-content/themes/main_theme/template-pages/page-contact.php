<?php
/**
 * Template Name: Contact - Basher
 */
// Exit if accessed directly
defined('ABSPATH') or die('No script kiddies please!');
get_header();
?>
<?php get_template_part('template-parts/loader'); ?>
<?php get_template_part('template-parts/menu/menu'); ?>

<!-- CONTENIDO -->
<main class="main_body">
    <?php 
        $subtitle = get_field('subtitulo');
        $shortcode = get_field('shortcode_de_contact_form_7');
    ?>
    <section class="section_contact">
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
</main>
<?php get_template_part('template-parts/footer/footer-part'); ?>
<?php get_footer(); ?>