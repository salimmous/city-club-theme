<?php
/**
 * Custom Post Types for CityClub theme
 */

// Register Custom Post Types
function cityclub_register_post_types() {
    
    // Trainers CPT
    $trainer_labels = array(
        'name'                  => _x('Trainers', 'Post type general name', 'cityclub'),
        'singular_name'         => _x('Trainer', 'Post type singular name', 'cityclub'),
        'menu_name'             => _x('Trainers', 'Admin Menu text', 'cityclub'),
        'name_admin_bar'        => _x('Trainer', 'Add New on Toolbar', 'cityclub'),
        'add_new'               => __('Add New', 'cityclub'),
        'add_new_item'          => __('Add New Trainer', 'cityclub'),
        'new_item'              => __('New Trainer', 'cityclub'),
        'edit_item'             => __('Edit Trainer', 'cityclub'),
        'view_item'             => __('View Trainer', 'cityclub'),
        'all_items'             => __('All Trainers', 'cityclub'),
        'search_items'          => __('Search Trainers', 'cityclub'),
        'parent_item_colon'     => __('Parent Trainers:', 'cityclub'),
        'not_found'             => __('No trainers found.', 'cityclub'),
        'not_found_in_trash'    => __('No trainers found in Trash.', 'cityclub'),
        'featured_image'        => _x('Trainer Image', 'Overrides the "Featured Image" phrase', 'cityclub'),
        'set_featured_image'    => _x('Set trainer image', 'Overrides the "Set featured image" phrase', 'cityclub'),
        'remove_featured_image' => _x('Remove trainer image', 'Overrides the "Remove featured image" phrase', 'cityclub'),
        'use_featured_image'    => _x('Use as trainer image', 'Overrides the "Use as featured image" phrase', 'cityclub'),
        'archives'              => _x('Trainer archives', 'The post type archive label used in nav menus', 'cityclub'),
        'insert_into_item'      => _x('Insert into trainer', 'Overrides the "Insert into post" phrase', 'cityclub'),
        'uploaded_to_this_item' => _x('Uploaded to this trainer', 'Overrides the "Uploaded to this post" phrase', 'cityclub'),
        'filter_items_list'     => _x('Filter trainers list', 'Screen reader text for the filter links', 'cityclub'),
        'items_list_navigation' => _x('Trainers list navigation', 'Screen reader text for the pagination', 'cityclub'),
        'items_list'            => _x('Trainers list', 'Screen reader text for the items list', 'cityclub'),
    );

    $trainer_args = array(
        'labels'             => $trainer_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'trainer'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('trainer', $trainer_args);
    
    // Classes CPT
    $class_labels = array(
        'name'                  => _x('Classes', 'Post type general name', 'cityclub'),
        'singular_name'         => _x('Class', 'Post type singular name', 'cityclub'),
        'menu_name'             => _x('Classes', 'Admin Menu text', 'cityclub'),
        'name_admin_bar'        => _x('Class', 'Add New on Toolbar', 'cityclub'),
        'add_new'               => __('Add New', 'cityclub'),
        'add_new_item'          => __('Add New Class', 'cityclub'),
        'new_item'              => __('New Class', 'cityclub'),
        'edit_item'             => __('Edit Class', 'cityclub'),
        'view_item'             => __('View Class', 'cityclub'),
        'all_items'             => __('All Classes', 'cityclub'),
        'search_items'          => __('Search Classes', 'cityclub'),
        'parent_item_colon'     => __('Parent Classes:', 'cityclub'),
        'not_found'             => __('No classes found.', 'cityclub'),
        'not_found_in_trash'    => __('No classes found in Trash.', 'cityclub'),
        'featured_image'        => _x('Class Image', 'Overrides the "Featured Image" phrase', 'cityclub'),
        'set_featured_image'    => _x('Set class image', 'Overrides the "Set featured image" phrase', 'cityclub'),
        'remove_featured_image' => _x('Remove class image', 'Overrides the "Remove featured image" phrase', 'cityclub'),
        'use_featured_image'    => _x('Use as class image', 'Overrides the "Use as featured image" phrase', 'cityclub'),
        'archives'              => _x('Class archives', 'The post type archive label used in nav menus', 'cityclub'),
        'insert_into_item'      => _x('Insert into class', 'Overrides the "Insert into post" phrase', 'cityclub'),
        'uploaded_to_this_item' => _x('Uploaded to this class', 'Overrides the "Uploaded to this post" phrase', 'cityclub'),
        'filter_items_list'     => _x('Filter classes list', 'Screen reader text for the filter links', 'cityclub'),
        'items_list_navigation' => _x('Classes list navigation', 'Screen reader text for the pagination', 'cityclub'),
        'items_list'            => _x('Classes list', 'Screen reader text for the items list', 'cityclub'),
    );

    $class_args = array(
        'labels'             => $class_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'class'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('class', $class_args);
    
    // Locations CPT
    $location_labels = array(
        'name'                  => _x('Locations', 'Post type general name', 'cityclub'),
        'singular_name'         => _x('Location', 'Post type singular name', 'cityclub'),
        'menu_name'             => _x('Locations', 'Admin Menu text', 'cityclub'),
        'name_admin_bar'        => _x('Location', 'Add New on Toolbar', 'cityclub'),
        'add_new'               => __('Add New', 'cityclub'),
        'add_new_item'          => __('Add New Location', 'cityclub'),
        'new_item'              => __('New Location', 'cityclub'),
        'edit_item'             => __('Edit Location', 'cityclub'),
        'view_item'             => __('View Location', 'cityclub'),
        'all_items'             => __('All Locations', 'cityclub'),
        'search_items'          => __('Search Locations', 'cityclub'),
        'parent_item_colon'     => __('Parent Locations:', 'cityclub'),
        'not_found'             => __('No locations found.', 'cityclub'),
        'not_found_in_trash'    => __('No locations found in Trash.', 'cityclub'),
        'featured_image'        => _x('Location Image', 'Overrides the "Featured Image" phrase', 'cityclub'),
        'set_featured_image'    => _x('Set location image', 'Overrides the "Set featured image" phrase', 'cityclub'),
        'remove_featured_image' => _x('Remove location image', 'Overrides the "Remove featured image" phrase', 'cityclub'),
        'use_featured_image'    => _x('Use as location image', 'Overrides the "Use as featured image" phrase', 'cityclub'),
        'archives'              => _x('Location archives', 'The post type archive label used in nav menus', 'cityclub'),
        'insert_into_item'      => _x('Insert into location', 'Overrides the "Insert into post" phrase', 'cityclub'),
        'uploaded_to_this_item' => _x('Uploaded to this location', 'Overrides the "Uploaded to this post" phrase', 'cityclub'),
        'filter_items_list'     => _x('Filter locations list', 'Screen reader text for the filter links', 'cityclub'),
        'items_list_navigation' => _x('Locations list navigation', 'Screen reader text for the pagination', 'cityclub'),
        'items_list'            => _x('Locations list', 'Screen reader text for the items list', 'cityclub'),
    );

    $location_args = array(
        'labels'             => $location_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'location'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-location',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('location', $location_args);
    
    // Testimonials CPT
    $testimonial_labels = array(
        'name'                  => _x('Testimonials', 'Post type general name', 'cityclub'),
        'singular_name'         => _x('Testimonial', 'Post type singular name', 'cityclub'),
        'menu_name'             => _x('Testimonials', 'Admin Menu text', 'cityclub'),
        'name_admin_bar'        => _x('Testimonial', 'Add New on Toolbar', 'cityclub'),
        'add_new'               => __('Add New', 'cityclub'),
        'add_new_item'          => __('Add New Testimonial', 'cityclub'),
        'new_item'              => __('New Testimonial', 'cityclub'),
        'edit_item'             => __('Edit Testimonial', 'cityclub'),
        'view_item'             => __('View Testimonial', 'cityclub'),
        'all_items'             => __('All Testimonials', 'cityclub'),
        'search_items'          => __('Search Testimonials', 'cityclub'),
        'parent_item_colon'     => __('Parent Testimonials:', 'cityclub'),
        'not_found'             => __('No testimonials found.', 'cityclub'),
        'not_found_in_trash'    => __('No testimonials found in Trash.', 'cityclub'),
        'featured_image'        => _x('Member Image', 'Overrides the "Featured Image" phrase', 'cityclub'),
        'set_featured_image'    => _x('Set member image', 'Overrides the "Set featured image" phrase', 'cityclub'),
        'remove_featured_image' => _x('Remove member image', 'Overrides the "Remove featured image" phrase', 'cityclub'),
        'use_featured_image'    => _x('Use as member image', 'Overrides the "Use as featured image" phrase', 'cityclub'),
        'archives'              => _x('Testimonial archives', 'The post type archive label used in nav menus', 'cityclub'),
        'insert_into_item'      => _x('Insert into testimonial', 'Overrides the "Insert into post" phrase', 'cityclub'),
        'uploaded_to_this_item' => _x('Uploaded to this testimonial', 'Overrides the "Uploaded to this post" phrase', 'cityclub'),
        'filter_items_list'     => _x('Filter testimonials list', 'Screen reader text for the filter links', 'cityclub'),
        'items_list_navigation' => _x('Testimonials list navigation', 'Screen reader text for the pagination', 'cityclub'),
        'items_list'            => _x('Testimonials list', 'Screen reader text for the items list', 'cityclub'),
    );

    $testimonial_args = array(
        'labels'             => $testimonial_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonial'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('testimonial', $testimonial_args);
}
add_action('init', 'cityclub_register_post_types');

// Register Custom Taxonomies
function cityclub_register_taxonomies() {
    // Class Type Taxonomy
    $class_type_labels = array(
        'name'              => _x('Class Types', 'taxonomy general name', 'cityclub'),
        'singular_name'     => _x('Class Type', 'taxonomy singular name', 'cityclub'),
        'search_items'      => __('Search Class Types', 'cityclub'),
        'all_items'         => __('All Class Types', 'cityclub'),
        'parent_item'       => __('Parent Class Type', 'cityclub'),
        'parent_item_colon' => __('Parent Class Type:', 'cityclub'),
        'edit_item'         => __('Edit Class Type', 'cityclub'),
        'update_item'       => __('Update Class Type', 'cityclub'),
        'add_new_item'      => __('Add New Class Type', 'cityclub'),
        'new_item_name'     => __('New Class Type Name', 'cityclub'),
        'menu_name'         => __('Class Types', 'cityclub'),
    );

    $class_type_args = array(
        'hierarchical'      => true,
        'labels'            => $class_type_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'class-type'),
        'show_in_rest'      => true,
    );

    register_taxonomy('class_type', array('class'), $class_type_args);
    
    // Trainer Specialty Taxonomy
    $specialty_labels = array(
        'name'              => _x('Specialties', 'taxonomy general name', 'cityclub'),
        'singular_name'     => _x('Specialty', 'taxonomy singular name', 'cityclub'),
        'search_items'      => __('Search Specialties', 'cityclub'),
        'all_items'         => __('All Specialties', 'cityclub'),
        'parent_item'       => __('Parent Specialty', 'cityclub'),
        'parent_item_colon' => __('Parent Specialty:', 'cityclub'),
        'edit_item'         => __('Edit Specialty', 'cityclub'),
        'update_item'       => __('Update Specialty', 'cityclub'),
        'add_new_item'      => __('Add New Specialty', 'cityclub'),
        'new_item_name'     => __('New Specialty Name', 'cityclub'),
        'menu_name'         => __('Specialties', 'cityclub'),
    );

    $specialty_args = array(
        'hierarchical'      => false,
        'labels'            => $specialty_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'specialty'),
        'show_in_rest'      => true,
    );

    register_taxonomy('specialty', array('trainer'), $specialty_args);
    
    // Location City Taxonomy
    $city_labels = array(
        'name'              => _x('Cities', 'taxonomy general name', 'cityclub'),
        'singular_name'     => _x('City', 'taxonomy singular name', 'cityclub'),
        'search_items'      => __('Search Cities', 'cityclub'),
        'all_items'         => __('All Cities', 'cityclub'),
        'parent_item'       => __('Parent City', 'cityclub'),
        'parent_item_colon' => __('Parent City:', 'cityclub'),
        'edit_item'         => __('Edit City', 'cityclub'),
        'update_item'       => __('Update City', 'cityclub'),
        'add_new_item'      => __('Add New City', 'cityclub'),
        'new_item_name'     => __('New City Name', 'cityclub'),
        'menu_name'         => __('Cities', 'cityclub'),
    );

    $city_args = array(
        'hierarchical'      => true,
        'labels'            => $city_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'city'),
        'show_in_rest'      => true,
    );

    register_taxonomy('city', array('location', 'trainer', 'class'), $city_args);
}
add_action('init', 'cityclub_register_taxonomies');
