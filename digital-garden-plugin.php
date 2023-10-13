<?php
/**
 * Plugin Name: Digital Garden Plugin
 * Description: A WordPress plugin for creating and managing a digital garden.
 * Version: 0.1
 * Author: david wolfpaw
 * Text Domain: digital-garden-plugin
 */

// Define paths for better code organization.
define( 'DIGITAL_GARDEN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DIGITAL_GARDEN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files.
require_once DIGITAL_GARDEN_PLUGIN_DIR . 'inc/custom-post-types.php';
require_once DIGITAL_GARDEN_PLUGIN_DIR . 'inc/activation-tasks.php';

// Hook activation and deactivation functions.
register_activation_hook( __FILE__, 'digital_garden_plugin_activate' );
register_deactivation_hook( __FILE__, 'digital_garden_plugin_deactivate' );

function digital_garden_plugin_activate() {
	// Register Note Completeness taxonomy to allow addition of default terms
	digital_garden_register_note_completeness_taxonomy();
	flush_rewrite_rules();
	do_action( 'digital_garden_activate' );
}

function digital_garden_plugin_deactivate() {
	do_action( 'digital_garden_deactivate' );
}
