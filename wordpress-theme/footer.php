<?php
/**
 * The template for displaying the footer
 */

?>

    <footer id="colophon" class="site-footer">
        <?php if (function_exists('elementor_theme_do_location') && elementor_theme_do_location('footer')) {
            // If Elementor Pro is active and footer location is set
        } else { ?>
            <div class="footer-widgets">
                <div class="container">
                    <div class="footer-widgets-grid">
                        <div class="footer-widget">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                        <div class="footer-widget">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                        <div class="footer-widget">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                        <div class="footer-widget">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-info">
                <div class="container">
                    <div class="copyright">
                        © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'cityclub'); ?>
                    </div>
                    <div class="footer-menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'depth'          => 1,
                            )
                        );
                        ?>
                    </div>
                </div>
            </div><!-- .site-info -->
        <?php } ?>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
