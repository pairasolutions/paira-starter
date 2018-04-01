<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paira_Starter
 */
?>
    <?php get_template_part( 'footer-widget' ); ?>
    <footer id="colophon" class="site-footer <?php echo Paira_Starter_bg_class(); ?>" role="contentinfo">
        <div class="container-fluid p-3 p-md-5">
            <div class="site-info">
                &copy; <?php echo date( 'Y' ); ?> <?php echo '<a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/wp-bootstrap-starter/" target="_blank" title="Wordpress Technical Support" alt="Bootstrap Wordpress Theme"><?php echo esc_html__( 'Bootstrap Wordpress Theme', 'wp-bootstrap-starter' ); ?></a>

            </div><!-- close .site-info -->
        </div>
    </footer><!-- #colophon -->
    </div><!-- #page -->

    <?php wp_footer(); ?>
</body>
</html>