<?php
/**
 * Adds custom logo support and exposes it as a GraphQL object
 */

function register_custom_logo() {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
}
add_action('after_setup_theme', 'register_custom_logo');

add_action('graphql_register_types', function() {

    // Define customLogo object type
    register_graphql_object_type('CustomLogo', [
        'description' => 'Custom logo object',
        'fields' => [
            'id' => ['type' => 'ID'],
            'url' => ['type' => 'String'],
            'alt' => ['type' => 'String'],
        ]
    ]);

    // Add RootQuery field
    register_graphql_field('RootQuery', 'customLogo', [
        'type' => 'CustomLogo',
        'description' => 'Custom logo data',
        'resolve' => function() {
            $id = get_theme_mod('custom_logo');
            if (!$id) return null;
            return [
                'id' => $id,
                'url' => wp_get_attachment_image_url($id, 'full'),
                'alt' => get_post_meta($id, '_wp_attachment_image_alt', true),
            ];
        }
    ]);
});