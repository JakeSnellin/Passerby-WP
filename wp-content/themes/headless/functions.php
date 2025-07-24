<?php
// Disable theme features
add_action('after_setup_theme', function () {
    // No support for menus, widgets, block styles, etc.
    remove_theme_support('core-block-patterns');
});

// Optional: Clean up frontend (if accessed)
add_action('init', function () {
    // Disable REST links and other headers if needed
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
});