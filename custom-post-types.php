<?php 
add_action( 'init', 'custom_post_type_testimonials', 0 );


// ====== Testimonials
function custom_post_type_testimonials() {

    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name'),
        'singular_name'       => _x( 'Testimonial',  'Post Type Singular Name'),
        'menu_name'           => __( 'Testimonials'),
        'parent_item_colon'   => __( 'Testimonials'),
        'all_items'           => __( 'All Testimonials'),
        'view_item'           => __( 'View Testimonials'),
        'add_new_item'        => __( 'Add New Testimonials'),
        'add_new'             => __( 'Add Testimonial' ),
        'edit_item'           => __( 'Edit Testimonial' ),
        'update_item'         => __( 'Update Testimonial' ),
        'search_items'        => __( 'Search Testimonials' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'testimonial' ),
        'description'         => __( 'testimonial'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-format-quote',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'testimonial', $args );
}
// ====== Type Filter
function taxonomy_businesstype() {

    $labels = array(
        'name'              => _x( 'Business Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Business Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Business Types'   ),
        'all_items'         => __( 'All Business Types'     ),
        'parent_item'       => __( 'Parent Business Type'   ),
        'parent_item_colon' => __( 'Parent Business Type:'  ),
        'edit_item'         => __( 'Edit Business Type'     ),
        'update_item'       => __( 'Update Business Type'   ),
        'add_new_item'      => __( 'Add New Business Type'  ),
        'new_item_name'     => __( 'New Business Type' ),
        'menu_name'         => __( 'Business Types'         )
    );

    register_taxonomy( 'businesstype', array( 'testimonial' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'businesstype', 'hierarchical' => true )
    ));
}
add_action( 'init', 'taxonomy_businesstype', 0 );