<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <title><?php wp_title('|', true, 'right');?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon-16x16.png">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/assets/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/aos.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/swiffy-slider.min.js" defer></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/swiffy-slider-extensions.min.js" defer></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/swiffy-slider.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/aos.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<script>
    window.onload = function() {
        AOS.init();
    }
</script>