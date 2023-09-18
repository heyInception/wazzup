<?php

/* Custom Post Type Start */
function project_post_type()
{

    // Labels
    $labels = array(
        'name'    => _x('Help', 'post type general name'),
        'singular_name' => _x('Help', 'post type singular name'),
        'menu_name' => __('База знаний', 'wazzup'),
        'add_new' => _x('Add Help', 'project item'),
        'add_new_item' => __('Add New Help'),
        'edit_item' => __('Edit Help'),
        'new_item' => __('New Help'),
        'view_item' => __('View Help'),
        'search_items' => __('Search Helps'),
        'not_found' =>  __('No Helps Found'),
        'not_found_in_trash' => __('No Helps Found in Trash'),
        'parent_item_colon' => ''
    );

    // Register post type
    register_post_type('help', array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-awards',
        'rewrite' => array('slug' => 'help'),
        'menu_position' => 5,
        'hierarchical' => true,
        'capability_type'    => 'post',
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes'),
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
    ));
}

add_action('init', 'project_post_type', 0);
/* Custom Post Type End */
