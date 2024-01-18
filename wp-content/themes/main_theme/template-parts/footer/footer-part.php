<!-- 8. FOOTER -->
<footer class="section section_footer pp-scrollable">
    <div class="pre_foo">
        <div class="container">
            <div class="col col-50">
                <a href="index.html">
                    <ul class="logo_all">
                        <?php dynamic_sidebar('logo_footer'); ?>
                    </ul>
                </a>
                <ul class="social_links">
                    <?php dynamic_sidebar('social'); ?>
                </ul>
            </div>
            <div class="col col-50">
                <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'alternative_footer',
                        'container'         => 'nav',
                        'container_class'   => 'links_menu_prefooter',
                        'depth'             => 2 , 
                        'menu_class'        => 'links_menu_prefooter'
                    )); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="pos_foo">
        <div class="container">
            <div class="col col-50">
                <ul class="copy">
                    <?php dynamic_sidebar('copy'); ?>
                </ul>
            </div>
            <div class="col col-50">
                <nav class="links_menu_posfooter">
                    <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'footer_menu',
                            'container'         => 'nav',
                            'container_class'   => 'links_menu',
                            'depth'             => 2 , 
                            'menu_class'        => 'links_menu'
                        )); ?>
                </nav>
                <ul class="social_links">
                    <?php dynamic_sidebar('social'); ?>
                </ul>
            </div>
        </div>
    </div>
</footer>