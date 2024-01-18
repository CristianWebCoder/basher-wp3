<?php
/**
 * Template Name: Basic Page
 */
// Exit if accessed directly
defined('ABSPATH') or die('No script kiddies please!');
get_header();
?>
<?php get_template_part('template-parts/loader'); ?>
<?php get_template_part('template-parts/menu/menu'); ?>

<!-- CONTENIDO -->
<main class="main_body">
    <section class="section">
        <div class="container">
            <h1 class="subtitle"><?php the_title(); ?></h1>
            <div class="description">
                <?php the_content();?>
            </div>
        </div>
    </section>
</main>

<?php get_template_part('template-parts/footer/footer-part'); ?>
<?php get_footer(); ?>