<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Paira Starter
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'paira_starter_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function paira_starter_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name' => 'Contact Form 7', // The plugin name.
            'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'King Composer',
            'slug' => 'kingcomposer',
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'Custom Post Type UI',
            'slug' => 'custom-post-type-ui',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'WordPress SEO by Yoast',
            'slug' => 'wordpress-seo',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'Advanced Custom Fields',
            'slug' => 'advanced-custom-fields',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'All-in-One WP Migration',
            'slug' => 'all-in-one-wp-migration',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'Breadcrumb NavXT',
            'slug' => 'breadcrumb-navxt',
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'Duplicate Post',
            'slug' => 'duplicate-post',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'FakerPress',
            'slug' => 'fakerpress',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'WP File Manager',
            'slug' => 'wp-file-manager',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name' => 'WP-SCSS',
            'slug' => 'wp-scss',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'paira-starter', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php', // Parent menu slug.
        'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.

            /*
              'strings'      => array(
              'page_title'                      => __( 'Install Required Plugins', 'paira-starter' ),
              'menu_title'                      => __( 'Install Plugins', 'paira-starter' ),
              /* translators: %s: plugin name. * /
              'installing'                      => __( 'Installing Plugin: %s', 'paira-starter' ),
              /* translators: %s: plugin name. * /
              'updating'                        => __( 'Updating Plugin: %s', 'paira-starter' ),
              'oops'                            => __( 'Something went wrong with the plugin API.', 'paira-starter' ),
              'notice_can_install_required'     => _n_noop(
              /* translators: 1: plugin name(s). * /
              'This theme requires the following plugin: %1$s.',
              'This theme requires the following plugins: %1$s.',
              'paira-starter'
              ),
              'notice_can_install_recommended'  => _n_noop(
              /* translators: 1: plugin name(s). * /
              'This theme recommends the following plugin: %1$s.',
              'This theme recommends the following plugins: %1$s.',
              'paira-starter'
              ),
              'notice_ask_to_update'            => _n_noop(
              /* translators: 1: plugin name(s). * /
              'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
              'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
              'paira-starter'
              ),
              'notice_ask_to_update_maybe'      => _n_noop(
              /* translators: 1: plugin name(s). * /
              'There is an update available for: %1$s.',
              'There are updates available for the following plugins: %1$s.',
              'paira-starter'
              ),
              'notice_can_activate_required'    => _n_noop(
              /* translators: 1: plugin name(s). * /
              'The following required plugin is currently inactive: %1$s.',
              'The following required plugins are currently inactive: %1$s.',
              'paira-starter'
              ),
              'notice_can_activate_recommended' => _n_noop(
              /* translators: 1: plugin name(s). * /
              'The following recommended plugin is currently inactive: %1$s.',
              'The following recommended plugins are currently inactive: %1$s.',
              'paira-starter'
              ),
              'install_link'                    => _n_noop(
              'Begin installing plugin',
              'Begin installing plugins',
              'paira-starter'
              ),
              'update_link' 					  => _n_noop(
              'Begin updating plugin',
              'Begin updating plugins',
              'paira-starter'
              ),
              'activate_link'                   => _n_noop(
              'Begin activating plugin',
              'Begin activating plugins',
              'paira-starter'
              ),
              'return'                          => __( 'Return to Required Plugins Installer', 'paira-starter' ),
              'plugin_activated'                => __( 'Plugin activated successfully.', 'paira-starter' ),
              'activated_successfully'          => __( 'The following plugin was activated successfully:', 'paira-starter' ),
              /* translators: 1: plugin name. * /
              'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'paira-starter' ),
              /* translators: 1: plugin name. * /
              'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'paira-starter' ),
              /* translators: 1: dashboard link. * /
              'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'paira-starter' ),
              'dismiss'                         => __( 'Dismiss this notice', 'paira-starter' ),
              'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'paira-starter' ),
              'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'paira-starter' ),

              'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
              ),
             */
    );

    tgmpa( $plugins, $config );
}
