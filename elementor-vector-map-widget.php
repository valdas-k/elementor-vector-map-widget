<?php
//Plugin info
/*
Plugin Name: Elementor Vector Map
Description: Adds a repeater-based vector map section to Elementor.
Version: 1.0
Author: Valdas Kriūnas
Licence: GPLv3
*/

//Prevent access from outside the Wordpress environment
if (!defined('ABSPATH')) { exit; }

function register_vector_map_widget($widgets_manager) {
  require_once (plugin_dir_path(__FILE__) . 'widgets/widget.php');
  $widgets_manager -> register(new \Elementor_Vector_Map_Plugin());
}
add_action( 'elementor/widgets/register', 'register_vector_map_widget');

function load_vector_map_widget_assets() {
  wp_enqueue_style('style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
  wp_enqueue_script('script', plugin_dir_url(__FILE__) . 'assets/js/script.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'load_vector_map_widget_assets');