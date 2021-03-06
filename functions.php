<?php

/**
 * Paira Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Paira_Starter
 */
if ( !function_exists( 'Paira_Starter_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function Paira_Starter_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Paira Starter, use a find and replace
         * to change 'paira-starter' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'paira-starter', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'paira-starter' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'Paira_Starter_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        function wp_boostrap_starter_add_editor_styles() {
            add_editor_style( 'custom-editor-style.css' );
        }

        add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );
    }

endif;
add_action( 'after_setup_theme', 'Paira_Starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Paira_Starter_content_width() {
    $GLOBALS[ 'content_width' ] = apply_filters( 'Paira_Starter_content_width', 1170 );
}

add_action( 'after_setup_theme', 'Paira_Starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Paira_Starter_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Sidebar', 'paira-starter' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'Add widgets here.', 'paira-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer Fullwidth', 'paira-starter' ),
        'id' => 'footer-0',
        'description' => esc_html__( 'Add widgets here.', 'paira-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer 1', 'paira-starter' ),
        'id' => 'footer-1',
        'description' => esc_html__( 'Add widgets here.', 'paira-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer 2', 'paira-starter' ),
        'id' => 'footer-2',
        'description' => esc_html__( 'Add widgets here.', 'paira-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer 3', 'paira-starter' ),
        'id' => 'footer-3',
        'description' => esc_html__( 'Add widgets here.', 'paira-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action( 'widgets_init', 'Paira_Starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function Paira_Starter_scripts() {
    // load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );

    // load style css
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // load Paira styles
    wp_enqueue_style( 'paira-style', get_template_directory_uri() . '/inc/assets/css/theme-style.css' );

    wp_enqueue_script( 'jquery' );

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    // load bootstrap js
    wp_enqueue_script( 'paira-starter-fontawesome', get_template_directory_uri() . '/inc/assets/js/fontawesome/fontawesome-all.min.js', array() );
    wp_enqueue_script( 'paira-starter-fontawesome-v4', get_template_directory_uri() . '/inc/assets/js/fontawesome/fa-v4-shims.min.js', array() );
    wp_enqueue_script( 'paira-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array() );
    wp_enqueue_script( 'paira-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array() );
    wp_enqueue_script( 'paira-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.js', array() );
    wp_enqueue_script( 'paira-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'Paira_Starter_scripts' );

function Paira_Starter_password_form() {
    global $post;
    $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "paira-starter" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "paira-starter" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "paira-starter" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}

add_filter( 'the_password_form', 'Paira_Starter_password_form' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load custom WordPress nav walker.
 */
if ( !class_exists( 'wp_bootstrap_navwalker' ) ) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

/**
 * Load custom functions for helping development.
 */
require_once(get_template_directory() . '/inc/for-development.php');

/**
 * Load TGM.
 */
require_once get_template_directory() . '/tgm/tgm.php';


/*
 * Add new class to container
 * helpful for make container full width.
 */
//function paira_container_class($class) {
//    return 'some';
//}
//add_filter( 'paira_container_class', 'paira_container_class' );