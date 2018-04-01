<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paira_Starter
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'paira-starter' ); ?></a>

            <?php do_action( 'paira_header_before' ); ?>

            <header id="masthead" class="site-header navbar-static-top" role="banner">
                <div class="<?php echo apply_filters( 'paira_container_class', 'container' ); ?>">
                    <nav class="navbar navbar-expand-xl p-0">
                        <div class="navbar-brand">
                            
                            <?php if ( get_theme_mod( 'Paira_Starter_logo' ) ) : ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo esc_attr( get_theme_mod( 'Paira_Starter_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php else : ?>
                                <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_url( bloginfo( 'name' ) ); ?></a>
                            <?php endif; ?>

                        </div>

                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'container' => 'div',
                            'container_id' => 'main-nav',
                            'container_class' => 'collapse navbar-collapse justify-content-end primary-nav',
                            'menu_id' => 'paira-menu',
                            'menu_class' => 'navbar-nav',
                            'depth' => 3,
                            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                            'walker' => new wp_bootstrap_navwalker()
                        ) );
                        ?>

                    </nav>
                </div>
            </header><!-- #masthead -->

            <?php do_action( 'paira_header_after' ); ?>

            <?php if ( !is_front_page() ): ?>
                <?php
                $bc_img = get_template_directory_uri() . 'images/default-banner.jpg';
                $page_title = get_the_title();
                if ( isset( $post ) ) {
                    $bc_title = get_post_meta( $post->ID, 'breadcrumb_title', true );
                    $page_title = empty( $bc_title ) ? get_the_title() : $bc_title;

                    $bcbg = get_post_meta( $post->ID, 'breadcrumb_bg_img', true );
                    if ( !empty( $bcbg ) ) {
                        $bc_img = wp_get_attachment_image_src( $bcbg, 'full' )[ 0 ];
                    }
                }

                if ( is_archive() ) {
                    $page_title = get_the_archive_title();
                } elseif ( is_404() ) {
                    $page_title = '404 Error!';
                } elseif ( is_search() ) {
                    $page_title = 'Search for "' . get_search_query() . '"';
                }

                if ( is_home() ) {
                    $bc_title = get_post_meta( get_option( 'page_for_posts' ), 'breadcrumb_title', true );
                    $page_title = empty( $bc_title ) ? get_the_title() : $bc_title;

                    $bcbg = get_post_meta( get_option( 'page_for_posts' ), 'breadcrumb_bg_img', true );
                    if ( !empty( $bcbg ) ) {
                        $bc_img = wp_get_attachment_image_src( $bcbg, 'full' )[ 0 ];
                    }
                }
                ?>
                <section id="paira-welcome" style="background-image: url('<?php echo $bc_img; ?>');">
                    <div class="container text-center">
                        <h2 class="welcome-title"><?php echo $page_title; ?></h2>
                        <div class="full-breadcrumb">
                            <?php
                            if ( function_exists( 'bcn_display' ) ) {
                                bcn_display();
                            }
                            ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>