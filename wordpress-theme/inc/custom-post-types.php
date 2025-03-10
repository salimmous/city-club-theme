<?php
/**
 * Custom Post Types for CityClub Theme
 *
 * @package CityClub
 */

/**
 * Register custom post types
 */
function cityclub_register_post_types() {
    // Register Location CPT
    register_post_type('cityclub_location', array(
        'labels' => array(
            'name'               => _x('Locations', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Location', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Locations', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Location', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Add New', 'location', 'cityclub'),
            'add_new_item'       => __('Add New Location', 'cityclub'),
            'new_item'           => __('New Location', 'cityclub'),
            'edit_item'          => __('Edit Location', 'cityclub'),
            'view_item'          => __('View Location', 'cityclub'),
            'all_items'          => __('All Locations', 'cityclub'),
            'search_items'       => __('Search Locations', 'cityclub'),
            'parent_item_colon'  => __('Parent Locations:', 'cityclub'),
            'not_found'          => __('No locations found.', 'cityclub'),
            'not_found_in_trash' => __('No locations found in Trash.', 'cityclub')
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-location',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'locations'),
        'show_in_rest'        => true,
    ));
    
    // Register Trainer CPT
    register_post_type('cityclub_trainer', array(
        'labels' => array(
            'name'               => _x('Trainers', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Trainer', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Trainers', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Trainer', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Add New', 'trainer', 'cityclub'),
            'add_new_item'       => __('Add New Trainer', 'cityclub'),
            'new_item'           => __('New Trainer', 'cityclub'),
            'edit_item'          => __('Edit Trainer', 'cityclub'),
            'view_item'          => __('View Trainer', 'cityclub'),
            'all_items'          => __('All Trainers', 'cityclub'),
            'search_items'       => __('Search Trainers', 'cityclub'),
            'parent_item_colon'  => __('Parent Trainers:', 'cityclub'),
            'not_found'          => __('No trainers found.', 'cityclub'),
            'not_found_in_trash' => __('No trainers found in Trash.', 'cityclub')
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-groups',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'trainers'),
        'show_in_rest'        => true,
    ));
    
    // Register Class CPT
    register_post_type('cityclub_class', array(
        'labels' => array(
            'name'               => _x('Classes', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Class', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Classes', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Class', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Add New', 'class', 'cityclub'),
            'add_new_item'       => __('Add New Class', 'cityclub'),
            'new_item'           => __('New Class', 'cityclub'),
            'edit_item'          => __('Edit Class', 'cityclub'),
            'view_item'          => __('View Class', 'cityclub'),
            'all_items'          => __('All Classes', 'cityclub'),
            'search_items'       => __('Search Classes', 'cityclub'),
            'parent_item_colon'  => __('Parent Classes:', 'cityclub'),
            'not_found'          => __('No classes found.', 'cityclub'),
            'not_found_in_trash' => __('No classes found in Trash.', 'cityclub')
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 22,
        'menu_icon'           => 'dashicons-calendar-alt',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'classes'),
        'show_in_rest'        => true,
    ));
    
    // Register Membership CPT
    register_post_type('cityclub_membership', array(
        'labels' => array(
            'name'               => _x('Memberships', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Membership', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Memberships', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Membership', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Add New', 'membership', 'cityclub'),
            'add_new_item'       => __('Add New Membership', 'cityclub'),
            'new_item'           => __('New Membership', 'cityclub'),
            'edit_item'          => __('Edit Membership', 'cityclub'),
            'view_item'          => __('View Membership', 'cityclub'),
            'all_items'          => __('All Memberships', 'cityclub'),
            'search_items'       => __('Search Memberships', 'cityclub'),
            'parent_item_colon'  => __('Parent Memberships:', 'cityclub'),
            'not_found'          => __('No memberships found.', 'cityclub'),
            'not_found_in_trash' => __('No memberships found in Trash.', 'cityclub')
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 23,
        'menu_icon'           => 'dashicons-tickets-alt',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'memberships'),
        'show_in_rest'        => true,
    ));
    
    // Register Testimonial CPT
    register_post_type('cityclub_testimonial', array(
        'labels' => array(
            'name'               => _x('Testimonials', 'post type general name', 'cityclub'),
            'singular_name'      => _x('Testimonial', 'post type singular name', 'cityclub'),
            'menu_name'          => _x('Testimonials', 'admin menu', 'cityclub'),
            'name_admin_bar'     => _x('Testimonial', 'add new on admin bar', 'cityclub'),
            'add_new'            => _x('Add New', 'testimonial', 'cityclub'),
            'add_new_item'       => __('Add New Testimonial', 'cityclub'),
            'new_item'           => __('New Testimonial', 'cityclub'),
            'edit_item'          => __('Edit Testimonial', 'cityclub'),
            'view_item'          => __('View Testimonial', 'cityclub'),
            'all_items'          => __('All Testimonials', 'cityclub'),
            'search_items'       => __('Search Testimonials', 'cityclub'),
            'parent_item_colon'  => __('Parent Testimonials:', 'cityclub'),
            'not_found'          => __('No testimonials found.', 'cityclub'),
            'not_found_in_trash' => __('No testimonials found in Trash.', 'cityclub')
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 24,
        'menu_icon'           => 'dashicons-format-quote',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'testimonials'),
        'show_in_rest'        => true,
    ));
}
add_action('init', 'cityclub_register_post_types');

/**
 * Register custom taxonomies
 */
function cityclub_register_taxonomies() {
    // Register Class Type Taxonomy
    register_taxonomy('cityclub_class_type', 'cityclub_class', array(
        'labels' => array(
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
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'class-type'),
        'show_in_rest'      => true,
    ));
    
    // Register Class Level Taxonomy
    register_taxonomy('cityclub_class_level', 'cityclub_class', array(
        'labels' => array(
            'name'              => _x('Class Levels', 'taxonomy general name', 'cityclub'),
            'singular_name'     => _x('Class Level', 'taxonomy singular name', 'cityclub'),
            'search_items'      => __('Search Class Levels', 'cityclub'),
            'all_items'         => __('All Class Levels', 'cityclub'),
            'parent_item'       => __('Parent Class Level', 'cityclub'),
            'parent_item_colon' => __('Parent Class Level:', 'cityclub'),
            'edit_item'         => __('Edit Class Level', 'cityclub'),
            'update_item'       => __('Update Class Level', 'cityclub'),
            'add_new_item'      => __('Add New Class Level', 'cityclub'),
            'new_item_name'     => __('New Class Level Name', 'cityclub'),
            'menu_name'         => __('Class Levels', 'cityclub'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'class-level'),
        'show_in_rest'      => true,
    ));
    
    // Register Trainer Specialty Taxonomy
    register_taxonomy('cityclub_trainer_specialty', 'cityclub_trainer', array(
        'labels' => array(
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
        ),
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'specialty'),
        'show_in_rest'      => true,
    ));
    
    // Register Location City Taxonomy
    register_taxonomy('cityclub_location_city', 'cityclub_location', array(
        'labels' => array(
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
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'city'),
        'show_in_rest'      => true,
    ));
    
    // Register Membership Type Taxonomy
    register_taxonomy('cityclub_membership_type', 'cityclub_membership', array(
        'labels' => array(
            'name'              => _x('Membership Types', 'taxonomy general name', 'cityclub'),
            'singular_name'     => _x('Membership Type', 'taxonomy singular name', 'cityclub'),
            'search_items'      => __('Search Membership Types', 'cityclub'),
            'all_items'         => __('All Membership Types', 'cityclub'),
            'parent_item'       => __('Parent Membership Type', 'cityclub'),
            'parent_item_colon' => __('Parent Membership Type:', 'cityclub'),
            'edit_item'         => __('Edit Membership Type', 'cityclub'),
            'update_item'       => __('Update Membership Type', 'cityclub'),
            'add_new_item'      => __('Add New Membership Type', 'cityclub'),
            'new_item_name'     => __('New Membership Type Name', 'cityclub'),
            'menu_name'         => __('Membership Types', 'cityclub'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'membership-type'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'cityclub_register_taxonomies');

/**
 * Add custom meta boxes
 */
function cityclub_add_meta_boxes() {
    // Location Meta Box
    add_meta_box(
        'cityclub_location_details',
        __('Location Details', 'cityclub'),
        'cityclub_location_details_callback',
        'cityclub_location',
        'normal',
        'high'
    );
    
    // Trainer Meta Box
    add_meta_box(
        'cityclub_trainer_details',
        __('Trainer Details', 'cityclub'),
        'cityclub_trainer_details_callback',
        'cityclub_trainer',
        'normal',
        'high'
    );
    
    // Class Meta Box
    add_meta_box(
        'cityclub_class_details',
        __('Class Details', 'cityclub'),
        'cityclub_class_details_callback',
        'cityclub_class',
        'normal',
        'high'
    );
    
    // Membership Meta Box
    add_meta_box(
        'cityclub_membership_details',
        __('Membership Details', 'cityclub'),
        'cityclub_membership_details_callback',
        'cityclub_membership',
        'normal',
        'high'
    );
    
    // Testimonial Meta Box
    add_meta_box(
        'cityclub_testimonial_details',
        __('Testimonial Details', 'cityclub'),
        'cityclub_testimonial_details_callback',
        'cityclub_testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cityclub_add_meta_boxes');

/**
 * Location meta box callback
 */
function cityclub_location_details_callback($post) {
    wp_nonce_field('cityclub_location_details', 'cityclub_location_details_nonce');
    
    $address = get_post_meta($post->ID, '_cityclub_location_address', true);
    $phone = get_post_meta($post->ID, '_cityclub_location_phone', true);
    $hours = get_post_meta($post->ID, '_cityclub_location_hours', true);
    $lat = get_post_meta($post->ID, '_cityclub_location_lat', true);
    $lng = get_post_meta($post->ID, '_cityclub_location_lng', true);
    $amenities = get_post_meta($post->ID, '_cityclub_location_amenities', true);
    
    echo '<p><label for="cityclub_location_address">' . __('Address', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_location_address" name="cityclub_location_address" value="' . esc_attr($address) . '" size="50" /></p>';
    
    echo '<p><label for="cityclub_location_phone">' . __('Phone', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_location_phone" name="cityclub_location_phone" value="' . esc_attr($phone) . '" size="30" /></p>';
    
    echo '<p><label for="cityclub_location_hours">' . __('Hours', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_location_hours" name="cityclub_location_hours" value="' . esc_attr($hours) . '" size="50" /></p>';
    
    echo '<p><label for="cityclub_location_lat">' . __('Latitude', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_location_lat" name="cityclub_location_lat" value="' . esc_attr($lat) . '" size="15" /></p>';
    
    echo '<p><label for="cityclub_location_lng">' . __('Longitude', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_location_lng" name="cityclub_location_lng" value="' . esc_attr($lng) . '" size="15" /></p>';
    
    echo '<p><label for="cityclub_location_amenities">' . __('Amenities (one per line)', 'cityclub') . '</label><br />';
    echo '<textarea id="cityclub_location_amenities" name="cityclub_location_amenities" rows="5" cols="50">' . esc_textarea($amenities) . '</textarea></p>';
}

/**
 * Trainer meta box callback
 */
function cityclub_trainer_details_callback($post) {
    wp_nonce_field('cityclub_trainer_details', 'cityclub_trainer_details_nonce');
    
    $experience = get_post_meta($post->ID, '_cityclub_trainer_experience', true);
    $rating = get_post_meta($post->ID, '_cityclub_trainer_rating', true);
    $location = get_post_meta($post->ID, '_cityclub_trainer_location', true);
    
    echo '<p><label for="cityclub_trainer_experience">' . __('Experience (e.g. "5 years")', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_trainer_experience" name="cityclub_trainer_experience" value="' . esc_attr($experience) . '" size="30" /></p>';
    
    echo '<p><label for="cityclub_trainer_rating">' . __('Rating (1-5)', 'cityclub') . '</label><br />';
    echo '<input type="number" id="cityclub_trainer_rating" name="cityclub_trainer_rating" value="' . esc_attr($rating) . '" min="1" max="5" step="0.1" /></p>';
    
    echo '<p><label for="cityclub_trainer_location">' . __('Location', 'cityclub') . '</label><br />';
    echo '<select id="cityclub_trainer_location" name="cityclub_trainer_location">';
    echo '<option value="">' . __('Select a location', 'cityclub') . '</option>';
    
    $locations = get_posts(array(
        'post_type' => 'cityclub_location',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));
    
    foreach ($locations as $loc) {
        echo '<option value="' . esc_attr($loc->ID) . '"' . selected($location, $loc->ID, false) . '>' . esc_html($loc->post_title) . '</option>';
    }
    
    echo '</select></p>';
}

/**
 * Class meta box callback
 */
function cityclub_class_details_callback($post) {
    wp_nonce_field('cityclub_class_details', 'cityclub_class_details_nonce');
    
    $instructor = get_post_meta($post->ID, '_cityclub_class_instructor', true);
    $time = get_post_meta($post->ID, '_cityclub_class_time', true);
    $duration = get_post_meta($post->ID, '_cityclub_class_duration', true);
    $location = get_post_meta($post->ID, '_cityclub_class_location', true);
    $capacity = get_post_meta($post->ID, '_cityclub_class_capacity', true);
    $enrolled = get_post_meta($post->ID, '_cityclub_class_enrolled', true);
    $day = get_post_meta($post->ID, '_cityclub_class_day', true);
    
    echo '<p><label for="cityclub_class_instructor">' . __('Instructor', 'cityclub') . '</label><br />';
    echo '<select id="cityclub_class_instructor" name="cityclub_class_instructor">';
    echo '<option value="">' . __('Select an instructor', 'cityclub') . '</option>';
    
    $trainers = get_posts(array(
        'post_type' => 'cityclub_trainer',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));
    
    foreach ($trainers as $trainer) {
        echo '<option value="' . esc_attr($trainer->ID) . '"' . selected($instructor, $trainer->ID, false) . '>' . esc_html($trainer->post_title) . '</option>';
    }
    
    echo '</select></p>';
    
    echo '<p><label for="cityclub_class_time">' . __('Time (e.g. "18:30")', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_class_time" name="cityclub_class_time" value="' . esc_attr($time) . '" size="10" /></p>';
    
    echo '<p><label for="cityclub_class_duration">' . __('Duration (e.g. "45 min")', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_class_duration" name="cityclub_class_duration" value="' . esc_attr($duration) . '" size="10" /></p>';
    
    echo '<p><label for="cityclub_class_location">' . __('Location', 'cityclub') . '</label><br />';
    echo '<select id="cityclub_class_location" name="cityclub_class_location">';
    echo '<option value="">' . __('Select a location', 'cityclub') . '</option>';
    
    $locations = get_posts(array(
        'post_type' => 'cityclub_location',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));
    
    foreach ($locations as $loc) {
        echo '<option value="' . esc_attr($loc->ID) . '"' . selected($location, $loc->ID, false) . '>' . esc_html($loc->post_title) . '</option>';
    }
    
    echo '</select></p>';
    
    echo '<p><label for="cityclub_class_capacity">' . __('Capacity', 'cityclub') . '</label><br />';
    echo '<input type="number" id="cityclub_class_capacity" name="cityclub_class_capacity" value="' . esc_attr($capacity) . '" min="1" /></p>';
    
    echo '<p><label for="cityclub_class_enrolled">' . __('Enrolled', 'cityclub') . '</label><br />';
    echo '<input type="number" id="cityclub_class_enrolled" name="cityclub_class_enrolled" value="' . esc_attr($enrolled) . '" min="0" /></p>';
    
    echo '<p><label for="cityclub_class_day">' . __('Day', 'cityclub') . '</label><br />';
    echo '<select id="cityclub_class_day" name="cityclub_class_day">';
    $days = array(
        'Monday' => __('Monday', 'cityclub'),
        'Tuesday' => __('Tuesday', 'cityclub'),
        'Wednesday' => __('Wednesday', 'cityclub'),
        'Thursday' => __('Thursday', 'cityclub'),
        'Friday' => __('Friday', 'cityclub'),
        'Saturday' => __('Saturday', 'cityclub'),
        'Sunday' => __('Sunday', 'cityclub'),
    );
    foreach ($days as $key => $value) {
        echo '<option value="' . esc_attr($key) . '"' . selected($day, $key, false) . '>' . esc_html($value) . '</option>';
    }
    echo '</select></p>';
}

/**
 * Membership meta box callback
 */
function cityclub_membership_details_callback($post) {
    wp_nonce_field('cityclub_membership_details', 'cityclub_membership_details_nonce');
    
    $price = get_post_meta($post->ID, '_cityclub_membership_price', true);
    $period = get_post_meta($post->ID, '_cityclub_membership_period', true);
    $highlighted = get_post_meta($post->ID, '_cityclub_membership_highlighted', true);
    $badge = get_post_meta($post->ID, '_cityclub_membership_badge', true);
    $features = get_post_meta($post->ID, '_cityclub_membership_features', true);
    
    echo '<p><label for="cityclub_membership_price">' . __('Price', 'cityclub') . '</label><br />';
    echo '<input type="number" id="cityclub_membership_price" name="cityclub_membership_price" value="' . esc_attr($price) . '" min="0" step="0.01" /></p>';
    
    echo '<p><label for="cityclub_membership_period">' . __('Period (e.g. "month", "year")', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_membership_period" name="cityclub_membership_period" value="' . esc_attr($period) . '" size="10" /></p>';
    
    echo '<p><label for="cityclub_membership_highlighted">' . __('Highlighted', 'cityclub') . '</label><br />';
    echo '<input type="checkbox" id="cityclub_membership_highlighted" name="cityclub_membership_highlighted" value="1"' . checked($highlighted, '1', false) . ' /></p>';
    
    echo '<p><label for="cityclub_membership_badge">' . __('Badge Text (e.g. "Most Popular")', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_membership_badge" name="cityclub_membership_badge" value="' . esc_attr($badge) . '" size="20" /></p>';
    
    echo '<p><label for="cityclub_membership_features">' . __('Features (one per line)', 'cityclub') . '</label><br />';
    echo '<textarea id="cityclub_membership_features" name="cityclub_membership_features" rows="10" cols="50">' . esc_textarea($features) . '</textarea></p>';
}

/**
 * Testimonial meta box callback
 */
function cityclub_testimonial_details_callback($post) {
    wp_nonce_field('cityclub_testimonial_details', 'cityclub_testimonial_details_nonce');
    
    $name = get_post_meta($post->ID, '_cityclub_testimonial_name', true);
    $duration = get_post_meta($post->ID, '_cityclub_testimonial_duration', true);
    $rating = get_post_meta($post->ID, '_cityclub_testimonial_rating', true);
    
    echo '<p><label for="cityclub_testimonial_name">' . __('Name', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_testimonial_name" name="cityclub_testimonial_name" value="' . esc_attr($name) . '" size="30" /></p>';
    
    echo '<p><label for="cityclub_testimonial_duration">' . __('Duration (e.g. "Member since 6 months")', 'cityclub') . '</label><br />';
    echo '<input type="text" id="cityclub_testimonial_duration" name="cityclub_testimonial_duration" value="' . esc_attr($duration) . '" size="30" /></p>';
    
    echo '<p><label for="cityclub_testimonial_rating">' . __('Rating (1-5)', 'cityclub') . '</label><br />';
    echo '<input type="number" id="cityclub_testimonial_rating" name="cityclub_testimonial_rating" value="' . esc_attr($rating) . '" min="1" max="5" step="1" /></p>';
}

/**
 * Save meta box data
 */
function cityclub_save_meta_box_data($post_id) {
    // Check if our nonce is set
    if (!isset($_POST['cityclub_location_details_nonce']) && 
        !isset($_POST['cityclub_trainer_details_nonce']) && 
        !isset($_POST['cityclub_class_details_nonce']) && 
        !isset($_POST['cityclub_membership_details_nonce']) && 
        !isset($_POST['cityclub_testimonial_details_nonce'])) {
        return;
    }
    
    // Verify that the nonce is valid
    if ((isset($_POST['cityclub_location_details_nonce']) && !wp_verify_nonce($_POST['cityclub_location_details_nonce'], 'cityclub_location_details')) || 
        (isset($_POST['cityclub_trainer_details_nonce']) && !wp_verify_nonce($_POST['cityclub_trainer_details_nonce'], 'cityclub_trainer_details')) || 
        (isset($_POST['cityclub_class_details_nonce']) && !wp_verify_nonce($_POST['cityclub_class_details_nonce'], 'cityclub_class_details')) || 
        (isset($_POST['cityclub_membership_details_nonce']) && !wp_verify_nonce($_POST['cityclub_membership_details_nonce'], 'cityclub_membership_details')) || 
        (isset($_POST['cityclub_testimonial_details_nonce']) && !wp_verify_nonce($_POST['cityclub_testimonial_details_nonce'], 'cityclub_testimonial_details'))) {
        return;
    }
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check the user's permissions
    if (isset($_POST['post_type'])) {
        if ('cityclub_location' === $_POST['post_type'] || 
            'cityclub_trainer' === $_POST['post_type'] || 
            'cityclub_class' === $_POST['post_type'] || 
            'cityclub_membership' === $_POST['post_type'] || 
            'cityclub_testimonial' === $_POST['post_type']) {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }
    }
    
    // Save location data
    if (isset($_POST['cityclub_location_address'])) {
        update_post_meta($post_id, '_cityclub_location_address', sanitize_text_field($_POST['cityclub_location_address']));
    }
    if (isset($_POST['cityclub_location_phone'])) {
        update_post_meta($post_id, '_cityclub_location_phone', sanitize_text_field($_POST['cityclub_location_phone']));
    }
    if (isset($_POST['cityclub_location_hours'])) {
        update_post_meta($post_id, '_cityclub_location_hours', sanitize_text_field($_POST['cityclub_location_hours']));
    }
    if (isset($_POST['cityclub_location_lat'])) {
        update_post_meta($post_id, '_cityclub_location_lat', sanitize_text_field($_POST['cityclub_location_lat']));
    }
    if (isset($_POST['cityclub_location_lng'])) {
        update_post_meta($post_id, '_cityclub_location_lng', sanitize_text_field($_POST['cityclub_location_lng']));
    }
    if (isset($_POST['cityclub_location_amenities'])) {
        update_post_meta($post_id, '_cityclub_location_amenities', sanitize_textarea_field($_POST['cityclub_location_amenities']));
    }
    
    // Save trainer data
    if (isset($_POST['cityclub_trainer_experience'])) {
        update_post_meta($post_id, '_cityclub_trainer_experience', sanitize_text_field($_POST['cityclub_trainer_experience']));
    }
    if (isset($_POST['cityclub_trainer_rating'])) {
        update_post_meta($post_id, '_cityclub_trainer_rating', sanitize_text_field($_POST['cityclub_trainer_rating']));
    }
    if (isset($_POST['cityclub_trainer_location'])) {
        update_post_meta($post_id, '_cityclub_trainer_location', sanitize_text_field($_POST['cityclub_trainer_location']));
    }
    
    // Save class data
    if (isset($_POST['cityclub_class_instructor'])) {
        update_post_meta($post_id, '_cityclub_class_instructor', sanitize_text_field($_POST['cityclub_class_instructor']));
    }
    if (isset($_POST['cityclub_class_time'])) {
        update_post_meta($post_id, '_cityclub_class_time', sanitize_text_field($_POST['cityclub_class_time']));
    }
    if (isset($_POST['cityclub_class_duration'])) {
        update_post_meta($post_id, '_cityclub_class_duration', sanitize_text_field($_POST['cityclub_class_duration']));
    }
    if (isset($_POST['cityclub_class_location'])) {
        update_post_meta($post_id, '_cityclub_class_location', sanitize_text_field($_POST['cityclub_class_location']));
    }
    if (isset($_POST['cityclub_class_capacity'])) {
        update_post_meta($post_id, '_cityclub_class_capacity', sanitize_text_field($_POST['cityclub_class_capacity']));
    }
    if (isset($_POST['cityclub_class_enrolled'])) {
        update_post_meta($post_id, '_cityclub_class_enrolled', sanitize_text_field($_POST['cityclub_class_enrolled']));
    }
    if (isset($_POST['cityclub_class_day'])) {
        update_post_meta($post_id, '_cityclub_class_day', sanitize_text_field($_POST['cityclub_class_day']));
    }
    
    // Save membership data
    if (isset($_POST['cityclub_membership_price'])) {
        update_post_meta($post_id, '_cityclub_membership_price', sanitize_text_field($_POST['cityclub_membership_price']));
    }
    if (isset($_POST['cityclub_membership_period'])) {
        update_post_meta($post_id, '_cityclub_membership_period', sanitize_text_field($_POST['cityclub_membership_period']));
    }
    if (isset($_POST['cityclub_membership_highlighted'])) {
        update_post_meta($post_id, '_cityclub_membership_highlighted', '1');
    } else {
        update_post_meta($post_id, '_cityclub_membership_highlighted', '');
    }
    if (isset($_POST['cityclub_membership_badge'])) {
        update_post_meta($post_id, '_cityclub_membership_badge', sanitize_text_field($_POST['cityclub_membership_badge']));
    }
    if (isset($_POST['cityclub_membership_features'])) {
        update_post_meta($post_id, '_cityclub_membership_features', sanitize_textarea_field($_POST['cityclub_membership_features']));
    }
    
    // Save testimonial data
    if (isset($_POST['cityclub_testimonial_name'])) {
        update_post_meta($post_id, '_cityclub_testimonial_name', sanitize_text_field($_POST['cityclub_testimonial_name']));
    }
    if (isset($_POST['cityclub_testimonial_duration'])) {
        update_post_meta($post_id, '_cityclub_testimonial_duration', sanitize_text_field($_POST['cityclub_testimonial_duration']));
    }
    if (isset($_POST['cityclub_testimonial_rating'])) {
        update_post_meta($post_id, '_cityclub_testimonial_rating', sanitize_text_field($_POST['cityclub_testimonial_rating']));
    }
}
add_action('save_post', 'cityclub_save_meta_box_data');
