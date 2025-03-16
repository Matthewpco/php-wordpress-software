<?php
/*
Plugin Name: Webp Image Converter
Plugin URI: https://github.com/Matthewpco/WP-Plugin-Webp-Image-Converter
Description: Wordpress plugin that adds a new submenu under tools with a form to either enter a url of an image to convert or upload an image and convert to webp.
Version: 1.7.0
Author: Gary Matthew Payne
Author URI: https://www.wpwebdevelopment.com
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Turn off size restrictions
add_filter( 'big_image_size_threshold', '__return_false' );

// Adding plugin as a submenu of the tools menu
function wp_register_plugin() {
    add_submenu_page( 'tools.php', 'Image Converter', 'Image Converter', 'manage_options', 'webp-converter', 'load_admin_page' );
}
add_action( 'admin_menu', 'wp_register_plugin' );

// Registering pages containing plugin code
require_once plugin_dir_path(__FILE__) . 'functions.php';
require_once plugin_dir_path(__FILE__) . 'admin-page.php';
