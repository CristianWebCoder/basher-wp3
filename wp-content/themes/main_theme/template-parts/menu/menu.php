<!-- 1. HEADER -->
<header class="section_header" id="header">
    <div class="container">
        <div class="header_logo">
            <a href="<?php echo home_url(); ?>">
                <ul class="logo_all">
                    <?php dynamic_sidebar('logo_header'); ?>
                </ul>
            </a>
        </div>
        <div class="header_links">
            <?php
            wp_nav_menu(array(
                'theme_location'    => 'main_menu',
                'container'         => 'nav',
                'container_class'   => 'links_menu',
                'depth'             => 2 , 
                'menu_class'        => 'links_menu'
            )); ?>
            <div class="link_button">
                <ul>
                    <?php dynamic_sidebar('btn_header'); ?>
                </ul>
            </div>
            <div class="language_switcher">
                <ul>
                    <?php dynamic_sidebar('idioma'); ?>
                </ul>
            </div>
            <div class="icon">
                <ul>
                    <?php dynamic_sidebar('logo_icono'); ?>
                </ul>
            </div>
        </div>
        <div class="header_menu">
            <div class="menu_toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </div>
</header>