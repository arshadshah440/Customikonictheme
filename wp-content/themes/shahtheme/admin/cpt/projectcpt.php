<?php

/**
 * Registers a Custom Post Type 'projects' with support for custom fields, 
 * featured image, and category taxonomy.
 *
 * This custom post type allows users to create and manage projects 
 * within the WordPress admin interface, enabling the addition of 
 * project-specific content and metadata.
 *
 * @package shahwptheme
 */

/**
 * Register the 'projects' custom post type.
 *
 * This function sets up the custom post type 'projects', which includes 
 * support for the title, editor, featured image, custom fields, and the 
 * category taxonomy. It enables the post type to be queried publicly 
 * and displayed within the admin interface.
 *
 * @return void
 */
function shahwptheme_register_project_cpt() {

    // Define the labels for the 'projects' post type
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'shahwptheme'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'shahwptheme'),
        'menu_name'             => __('Projects', 'shahwptheme'),
        'name_admin_bar'        => __('Project', 'shahwptheme'),
        'archives'              => __('Project Archives', 'shahwptheme'),
        'attributes'            => __('Project Attributes', 'shahwptheme'),
        'parent_item_colon'     => __('Parent Project:', 'shahwptheme'),
        'all_items'             => __('All Projects', 'shahwptheme'),
        'add_new_item'          => __('Add New Project', 'shahwptheme'),
        'add_new'               => __('Add New', 'shahwptheme'),
        'new_item'              => __('New Project', 'shahwptheme'),
        'edit_item'             => __('Edit Project', 'shahwptheme'),
        'update_item'           => __('Update Project', 'shahwptheme'),
        'view_item'             => __('View Project', 'shahwptheme'),
        'view_items'            => __('View Projects', 'shahwptheme'),
        'search_items'          => __('Search Project', 'shahwptheme'),
        'not_found'             => __('Not found', 'shahwptheme'),
        'not_found_in_trash'    => __('Not found in Trash', 'shahwptheme'),
        'featured_image'        => __('Featured Image', 'shahwptheme'),
        'set_featured_image'    => __('Set featured image', 'shahwptheme'),
        'remove_featured_image' => __('Remove featured image', 'shahwptheme'),
        'use_featured_image'    => __('Use as featured image', 'shahwptheme'),
        'insert_into_item'      => __('Insert into project', 'shahwptheme'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'shahwptheme'),
        'items_list'            => __('Projects list', 'shahwptheme'),
        'items_list_navigation' => __('Projects list navigation', 'shahwptheme'),
        'filter_items_list'     => __('Filter projects list', 'shahwptheme'),
    );

    // Define the arguments for the 'projects' post type
    $args = array(
        'label'                 => __('Project', 'shahwptheme'),
        'description'           => __('Custom post type for projects', 'shahwptheme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies'            => array('category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enables REST API support for Gutenberg
    );

    // Register the custom post type
    register_post_type('project', $args);
}

// Hook the custom post type registration to the 'init' action
add_action('init', 'shahwptheme_register_project_cpt', 0);
