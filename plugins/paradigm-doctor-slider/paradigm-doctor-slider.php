<?php
/*
Plugin Name: Paradigm Doctor Slider
Description: A plugin to add a shortcode with animated doctor slides
Plugin URI: https://github.com/Matthewpco/
Version: 1.1.0
Author: Gary Matthew Payne
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

require_once plugin_dir_path(__FILE__) . 'php/shortcode.php';

// Enqueue JavaScript for AJAX form submission and styles
function pds_enqueue_scripts() {
    wp_enqueue_script('pds-scripts', plugin_dir_url(__FILE__) . 'js/paradigm-doctor-slider-scripts.js', array(), false, true);
    wp_enqueue_style('pds-styles', plugin_dir_url(__FILE__) . 'css/paradigm-doctor-slider-styles.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'pds_enqueue_scripts');
