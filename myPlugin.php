<?php
/**
 * Plugin Name:       NATOinstructions
 * Version:           0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            andriiboiko
 */

/**
 * Register the "Instruction" custom post type
 */
function pluginprefix_setup_post_type() {
    register_post_type( 'Instruction', ['public' => true] );
}
add_action( 'init', 'pluginprefix_setup_post_type' );

/**
 * Activate the plugin
 */
function pluginpostfix_activate() {
    // Trigger function that registers the custom post type plugin.
    pluginprefix_setup_post_type();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'pluginprefix_activate' );

/**
 * Deactivate the plugin
 */
function pluginprefix_deactivate() {
    unregister_post_type( 'Instruction' );
    // Clear the permalinks to remove post type's rules from the database
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'pluginpostfix_deactivate' );
