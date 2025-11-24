<?php
/**
 * Plugin Name: Custom Headless
 * Description: Registers menus, custom logo, and other global headless site functionality for headless WordPress.
 * Version: 1.0
 * Author: Jake Snellin
 */

// Include menus
require_once plugin_dir_path(__FILE__) . 'custom-headless-menus.php';

// Include logo support
require_once plugin_dir_path(__FILE__) . 'custom-headless-logo.php';