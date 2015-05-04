<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function register_staff_post_type() {

    $labels = array(
        'name'                => __( 'Staff', 'text-domain' ),
        'singular_name'       => __( 'Staff', 'text-domain' ),
        'add_new'             => _x( 'Add New Staff', 'text-domain', 'text-domain' ),
        'add_new_item'        => __( 'Add New Staff', 'text-domain' ),
        'edit_item'           => __( 'Edit Staff', 'text-domain' ),
        'new_item'            => __( 'New Staff', 'text-domain' ),
        'view_item'           => __( 'View Staff', 'text-domain' ),
        'search_items'        => __( 'Search Staff', 'text-domain' ),
        'not_found'           => __( 'No Staff found', 'text-domain' ),
        'not_found_in_trash'  => __( 'No Staff found in Trash', 'text-domain' ),
        'parent_item_colon'   => __( 'Parent Staff:', 'text-domain' ),
        'menu_name'           => __( 'Staff', 'text-domain' ),
    );

    $args = array(
        'labels'                   => $labels,
        'hierarchical'        => false,
        'description'         => 'Add and edit staff members',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-groups',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title', 'editor', 'author', 'thumbnail',
            'excerpt','custom-fields', 'trackbacks', 'comments',
            'revisions', 'page-attributes', 'post-formats'
            )
    );

    register_post_type( 'staff', $args );
}

add_action( 'init', 'register_staff_post_type' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function register_staff_specialize_taxonomy() {

    $labels = array(
        'name'                    => _x( 'Specialties', 'Taxonomy plural name', 'text-domain' ),
        'singular_name'            => _x( 'Specialty', 'Taxonomy singular name', 'text-domain' ),
        'search_items'            => __( 'Search Specialties', 'text-domain' ),
        'popular_items'            => __( 'Popular Specialties', 'text-domain' ),
        'all_items'                => __( 'All Specialties', 'text-domain' ),
        'parent_item'            => __( 'Parent Specialty', 'text-domain' ),
        'parent_item_colon'        => __( 'Parent Specialty', 'text-domain' ),
        'edit_item'                => __( 'Edit Specialty', 'text-domain' ),
        'update_item'            => __( 'Update Specialty', 'text-domain' ),
        'add_new_item'            => __( 'Add New Specialty', 'text-domain' ),
        'new_item_name'            => __( 'New Specialty Name', 'text-domain' ),
        'add_or_remove_items'    => __( 'Add or remove Specialties', 'text-domain' ),
        'choose_from_most_used'    => __( 'Choose from most used text-domain', 'text-domain' ),
        'menu_name'                => __( 'Specialty', 'text-domain' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => true,
        'show_tagcloud'     => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'query_var'         => true,
        'capabilities'      => array(),
    );

    register_taxonomy( 'specialty', array( 'staff' ), $args );
}

add_action( 'init', 'register_staff_specialize_taxonomy' );
function get_staff($args=array()) {
    
    return get_posts(get_staff_args($args));

}

function get_staff_query($args=array()) {

    return new WP_Query(get_staff_args($args));

}
function get_staff_args($args=array()) {
    $defaults = array(
        'post_type' => 'staff',
        );

    $args = wp_parse_args( $args, $defaults );

    return $args;
}

?>