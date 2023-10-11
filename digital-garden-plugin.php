<?php
/**
 * Plugin Name: Digital Garden Plugin
 * Description: A WordPress plugin for creating and managing a digital garden.
 * Version: 1.0
 * Author: david wolfpaw
 * Text Domain: digital-garden-plugin
 */

// Define paths for better code organization.
define( 'DIGITAL_GARDEN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DIGITAL_GARDEN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files.
require_once DIGITAL_GARDEN_PLUGIN_DIR . 'inc/custom-post-types.php';

// Hook activation and deactivation functions.
register_activation_hook( __FILE__, 'digital_garden_plugin_activate' );
register_deactivation_hook( __FILE__, 'digital_garden_plugin_deactivate' );

function digital_garden_plugin_activate() {
	// Add any activation tasks here.
}

function digital_garden_plugin_deactivate() {
	// Add any deactivation tasks here.
}
