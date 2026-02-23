<?php
/*
 * Plugin Name: Elementor Vector Map Widget
 * Description: Adds a repeater-based vector map section to Elementor.
 * Version:     1.0
 * Author:      Valdas Kriūnas
 * Author URI:  https://github.com/valdas-k
 * Text Domain: elementor-vector-map-widget
 * Licence: GPLv3
 * Requires Plugins: elementor
 */

if ( ! defined( 'ABSPATH' )) { exit; }

function register_vector_map_widget( $widgets_manager ) {
  require_once ( __DIR__ . '/widgets/vector-map-widget.php' );
  $widgets_manager -> register( new \Elementor_Vector_Map_Widget() );
}
add_action( 'elementor/widgets/register', 'register_vector_map_widget' );

function load_vector_map_widget_assets() {
  wp_enqueue_style( 'vector-map-style', plugin_dir_url( __FILE__ ) . 'assets/css/vector-map-style.css' );
  wp_enqueue_script( 'vector-map-script', plugin_dir_url( __FILE__ ) . 'assets/js/vector-map-script.js', [], false, true );
}
add_action( 'wp_enqueue_scripts', 'load_vector_map_widget_assets' );
?>