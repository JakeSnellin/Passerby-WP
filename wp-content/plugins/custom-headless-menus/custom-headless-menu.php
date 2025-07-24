<?php
/**
 * Plugin Name: Custom Headless Menus
 * Description: Registers header and footer menu locations for headless WordPress use.
 * Version: 1.0
 * Author: Jake Snellin
 */

function register_headless_menus() {
  register_nav_menus([
    'header-menu' => __('Header Menu'),
    'footer-menu' => __('Footer Menu'),
  ]);
}
add_action('after_setup_theme', 'register_headless_menus');