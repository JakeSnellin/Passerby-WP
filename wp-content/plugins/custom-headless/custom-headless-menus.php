<?php
/**
 * Registers header/footer menus and exposes them via WPGraphQL
 */

function register_headless_menus() {
    register_nav_menus([
        'header-menu' => __('Header Menu'),
        'footer-menu' => __('Footer Menu'),
    ]);
}
add_action('after_setup_theme', 'register_headless_menus');

/**
 * Expose menus and labels to WPGraphQL
 */
add_action('graphql_register_types', function() {

    // Register MenuItem type
    register_graphql_object_type('MenuItem', [
        'description' => 'Navigation menu item',
        'fields' => [
            'id' => ['type' => 'ID'],
            'label' => ['type' => 'String'],
            'url' => ['type' => 'String'],
        ]
    ]);

    function normalise_menu_url($url) {
        $frontend_url = defined('FRONTEND_URL') ? FRONTEND_URL : home_url();

        $parsed = wp_parse_url($url);
        if (!$parsed) return $url;

        $path     = isset($parsed['path']) ? $parsed['path'] : '';
        $query    = isset($parsed['query']) ? '?' . $parsed['query'] : '';
        $fragment = isset($parsed['fragment']) ? '#' . $parsed['fragment'] : '';

        return rtrim($frontend_url, '/') . $path . $query . $fragment;
    }

    // Header menu items
    register_graphql_field('RootQuery', 'headerMenu', [
        'type' => ['list_of' => 'MenuItem'],
        'description' => 'Header menu items',
        'resolve' => function() {
            $items = wp_get_nav_menu_items('header-menu');
            if (!$items) return [];
            return array_map(function($item) {
                return [
                    'id' => $item->ID,
                    'label' => $item->title,
                    'url' => normalise_menu_url($item->url),
                ];
            }, $items);
        }
    ]);

    // Header menu label
    register_graphql_field('RootQuery', 'headerMenuLabel', [
        'type' => 'String',
        'description' => 'Label for the header/hamburger menu',
        'resolve' => function() {
            return 'Menu'; // default label
        }
    ]);

    
    // Header menu label
    register_graphql_field('RootQuery', 'footerTitleText', [
        'type' => 'String',
        'description' => 'Title for the footer logo',
        'resolve' => function() {
            return 'PASSERBY'; // default label
        }
    ]);

    // Footer menu items
    register_graphql_field('RootQuery', 'footerMenu', [
        'type' => ['list_of' => 'MenuItem'],
        'description' => 'Footer menu items',
        'resolve' => function() {
            $items = wp_get_nav_menu_items('footer-menu');
            if (!$items) return [];
            return array_map(function($item) {
                return [
                    'id' => $item->ID,
                    'label' => $item->title,
                    'url' => normalise_menu_url($item->url),
                ];
            }, $items);
        }
    ]);

});