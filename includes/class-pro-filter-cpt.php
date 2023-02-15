<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**********************************************************************************
 * Projects Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies projects
function create_pro_filter_cpt(){
    $labels = array(
        'name' => __('Projects', 'Post Type General Name', 'pro-filter'),
        'singular_name' => __('Project', 'Post Type Singular Name', 'pro-filter'),
        'menu_name' => __('Projects' , 'pro-filter'),
        'name_admin_bar' => __('Projects' , 'pro-filter'),
        'archives' => __('Projects Archives' , 'pro-filter'),
        'attributes' => __('Projects Attributes ' , 'pro-filter'),
        'parent_item_colon' => __('Parent Projects ' , 'pro-filter'),
        'all_items' => __('All Projects ' , 'pro-filter'),
        'add_new_item' => __('Add New Projects ' , 'pro-filter'),
        'add_new' => __('Add New ' , 'pro-filter'),
        'new_item' => __('New Project ' , 'pro-filter'),
        'edit_item' => __('Edit Project ' , 'pro-filter'),
        'update_item' => __('Update Project ' , 'pro-filter'),
        'view_item' => __('View Project ' , 'pro-filter'),
        'search_item' => __('Search Project ' , 'pro-filter'),
        'not_found_in_trash' => __('No Projects Found in trash' , 'pro-filter'),
        'featured_image' => __('Project Featured Image' , 'pro-filter'),
        'set_featured_image' => __('Set Project Featured Image' , 'pro-filter'),
        'remove_featured_image' => __('Remove Project Featured Image' , 'pro-filter'),
        'use_featured_image' => __('Use as Project Featured Image' , 'pro-filter'),
        'insert_into_item' => __('Insert into Projects' , 'pro-filter'),
        'uploaded_to_this_item' => __('Uploaded to this Projects' , 'pro-filter'),
        'items_list' => __('Projects List' , 'pro-filter'),
        'items_list_navigation' => __('Projects List Navigation' , 'pro-filter'),
        'filter_items_list' => __('Filter Projects List' , 'pro-filter'),
    );

    $args = array(
        'label' => __('Projects' , 'pro-filter'),
        'description' => __('Projects Module' , 'pro-filter'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-building',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor', 'post-formats', 'page-attributes'),
        'taxonomies' => array('projects_sectors'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'projects')
    );

    register_post_type('projects', $args);
}

add_action('init', 'create_pro_filter_cpt', 0);


function rewrite_pro_filter_flush(){
    create_pro_filter_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_pro_filter_flush');


function create_pro_filter_taxonomies() {
    $labels = array(
        'name'              => _x( 'Sectors', 'taxonomy general name' ),
        'singular_name'     => _x( 'Sector', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Sectors' ),
        'all_items'         => __( 'All Sectors' ),
        'parent_item'       => __( 'Parent Sector' ),
        'parent_item_colon' => __( 'Parent Sector:' ),
        'edit_item'         => __( 'Edit Sector' ),
        'update_item'       => __( 'Update Sector' ),
        'add_new_item'      => __( 'Add New Sector' ),
        'new_item_name'     => __( 'New Sector Name' ),
        'menu_name'         => __( 'Sectors' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'projects_sectors' ),
    );

    register_taxonomy( 'projects_sectors', array( 'projects' ), $args );
}
add_action( 'init', 'create_pro_filter_taxonomies', 0 );



/**********************************************************************************
 * Developers Custom Post Type
 ***********************************************************************************/

function create_pro_filter_developers_cpt(){
    $labels = array(
        'name' => __('Developers', 'Post Type General Name', 'pro-filter'),
        'singular_name' => __('Developer', 'Post Type Singular Name', 'pro-filter'),
        'menu_name' => __('Developers' , 'pro-filter'),
        'name_admin_bar' => __('Developers' , 'pro-filter'),
        'archives' => __('Developers Archives' , 'pro-filter'),
        'attributes' => __('Developers Attributes ' , 'pro-filter'),
        'parent_item_colon' => __('Parent Developers ' , 'pro-filter'),
        'all_items' => __('All Developers ' , 'pro-filter'),
        'add_new_item' => __('Add New Developers ' , 'pro-filter'),
        'add_new' => __('Add New ' , 'pro-filter'),
        'new_item' => __('New Developer ' , 'pro-filter'),
        'edit_item' => __('Edit Developer ' , 'pro-filter'),
        'update_item' => __('Update Developer ' , 'pro-filter'),
        'view_item' => __('View Developer ' , 'pro-filter'),
        'search_item' => __('Search Developer ' , 'pro-filter'),
        'not_found_in_trash' => __('No Developers Found in trash' , 'pro-filter'),
        'featured_image' => __('Developer Featured Image' , 'pro-filter'),
        'set_featured_image' => __('Set Developer Featured Image' , 'pro-filter'),
        'remove_featured_image' => __('Remove Developer Featured Image' , 'pro-filter'),
        'use_featured_image' => __('Use as Developer Featured Image' , 'pro-filter'),
        'insert_into_item' => __('Insert into Developers' , 'pro-filter'),
        'uploaded_to_this_item' => __('Uploaded to this Developers' , 'pro-filter'),
        'items_list' => __('Developers List' , 'pro-filter'),
        'items_list_navigation' => __('Developers List Navigation' , 'pro-filter'),
        'filter_items_list' => __('Filter Developers List' , 'pro-filter'),
    );

    $args = array(
        'label' => __('Developers' , 'pro-filter'),
        'description' => __('Developers Module' , 'pro-filter'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-networking',
        'supports' => array('title', 'thumbnail'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'developers')
    );

    register_post_type('developers', $args);
}

add_action('init', 'create_pro_filter_developers_cpt', 0);


function rewrite_pro_filter_developers_flush(){
    create_pro_filter_developers_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_pro_filter_developers_flush');



/**********************************************************************************
 * Locations Custom Post Type
 ***********************************************************************************/

function create_pro_filter_locations_cpt(){
    $labels = array(
        'name' => __('Locations', 'Post Type General Name', 'pro-filter'),
        'singular_name' => __('Location', 'Post Type Singular Name', 'pro-filter'),
        'menu_name' => __('Locations' , 'pro-filter'),
        'name_admin_bar' => __('Locations' , 'pro-filter'),
        'archives' => __('Locations Archives' , 'pro-filter'),
        'attributes' => __('Locations Attributes ' , 'pro-filter'),
        'parent_item_colon' => __('Parent Locations ' , 'pro-filter'),
        'all_items' => __('All Locations ' , 'pro-filter'),
        'add_new_item' => __('Add New Locations ' , 'pro-filter'),
        'add_new' => __('Add New ' , 'pro-filter'),
        'new_item' => __('New Location ' , 'pro-filter'),
        'edit_item' => __('Edit Location ' , 'pro-filter'),
        'update_item' => __('Update Location ' , 'pro-filter'),
        'view_item' => __('View Location ' , 'pro-filter'),
        'search_item' => __('Search Location ' , 'pro-filter'),
        'not_found_in_trash' => __('No Locations Found in trash' , 'pro-filter'),
        'featured_image' => __('Location Featured Image' , 'pro-filter'),
        'set_featured_image' => __('Set Location Featured Image' , 'pro-filter'),
        'remove_featured_image' => __('Remove Location Featured Image' , 'pro-filter'),
        'use_featured_image' => __('Use as Location Featured Image' , 'pro-filter'),
        'insert_into_item' => __('Insert into Locations' , 'pro-filter'),
        'uploaded_to_this_item' => __('Uploaded to this Locations' , 'pro-filter'),
        'items_list' => __('Locations List' , 'pro-filter'),
        'items_list_navigation' => __('Locations List Navigation' , 'pro-filter'),
        'filter_items_list' => __('Filter Locations List' , 'pro-filter'),
    );

    $args = array(
        'label' => __('Locations' , 'pro-filter'),
        'description' => __('Locations Module' , 'pro-filter'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-site-alt',
        'supports' => array('title', 'thumbnail'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'locations')
    );

    register_post_type('locations', $args);
}

add_action('init', 'create_pro_filter_locations_cpt', 0);


function rewrite_pro_filter_locations_flush(){
    create_pro_filter_locations_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_pro_filter_locations_flush');


/**********************************************************************************
 * Consultant Custom Post Type
 ***********************************************************************************/

function create_pro_filter_consultant_cpt(){
    $labels = array(
        'name' => __('Consultant', 'Post Type General Name', 'pro-filter'),
        'singular_name' => __('Consultant', 'Post Type Singular Name', 'pro-filter'),
        'menu_name' => __('Consultant' , 'pro-filter'),
        'name_admin_bar' => __('Consultant' , 'pro-filter'),
        'archives' => __('Consultant Archives' , 'pro-filter'),
        'attributes' => __('Consultant Attributes ' , 'pro-filter'),
        'parent_item_colon' => __('Parent Consultant ' , 'pro-filter'),
        'all_items' => __('All Consultant ' , 'pro-filter'),
        'add_new_item' => __('Add New Consultant ' , 'pro-filter'),
        'add_new' => __('Add New ' , 'pro-filter'),
        'new_item' => __('New Consultant ' , 'pro-filter'),
        'edit_item' => __('Edit Consultant ' , 'pro-filter'),
        'update_item' => __('Update Consultant ' , 'pro-filter'),
        'view_item' => __('View Consultant ' , 'pro-filter'),
        'search_item' => __('Search Consultant ' , 'pro-filter'),
        'not_found_in_trash' => __('No Consultant Found in trash' , 'pro-filter'),
        'featured_image' => __('Consultant Featured Image' , 'pro-filter'),
        'set_featured_image' => __('Set Consultant Featured Image' , 'pro-filter'),
        'remove_featured_image' => __('Remove Consultant Featured Image' , 'pro-filter'),
        'use_featured_image' => __('Use as Consultant Featured Image' , 'pro-filter'),
        'insert_into_item' => __('Insert into Consultant' , 'pro-filter'),
        'uploaded_to_this_item' => __('Uploaded to this Consultant' , 'pro-filter'),
        'items_list' => __('Consultant List' , 'pro-filter'),
        'items_list_navigation' => __('Consultant List Navigation' , 'pro-filter'),
        'filter_items_list' => __('Filter Consultant List' , 'pro-filter'),
    );

    $args = array(
        'label' => __('Consultant' , 'pro-filter'),
        'description' => __('Consultant Module' , 'pro-filter'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => array('title', 'thumbnail'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'consultant')
    );

    register_post_type('consultant', $args);
}

add_action('init', 'create_pro_filter_consultant_cpt', 0);


function rewrite_pro_filter_consultant_flush(){
    create_pro_filter_consultant_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_pro_filter_consultant_flush');
