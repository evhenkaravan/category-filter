<?php
/*
 * Plugin Name:       EK category filter
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Category filter widget for woocommerce.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Yevhen Karavan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       ek-category-filter
 * Domain Path:       /languages
 * Requires Plugins:  woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/abstract-ek-widget.php';
require_once plugin_dir_path( __FILE__ ) . 'widgets/class-ek-widget-product-categories.php';

function ek_category_filter_load_widget() {
    register_widget( 'EK_Widget_Product_Categories');
}

add_action( 'widgets_init', 'ek_category_filter_load_widget' );

function ek_category_assets_js() {
    wp_enqueue_script(
        'ek-category-accordion-filter',
        plugin_dir_url( __FILE__ ) . 'assets/js/woocommerce-category-accordion.js',
        ['jquery'],
        '1.0',
        true
    );
}

add_action( 'wp_enqueue_scripts', 'ek_category_assets_js' );

function ek_category_assets_css() {
    wp_enqueue_style(
        'ek-category-accordion-filter',
        plugin_dir_url( __FILE__ ) . 'assets/css/woocommerce-category-accordion.css',
        [],
        '1.0'
    );
}

add_action( 'wp_enqueue_scripts', 'ek_category_assets_css' );