<?php
// CALLOUTS ////////////////////

function post_type_callouts() {

   register_post_type(
               'callouts',
               array('label' => __('Callouts'),
                       'singular_label' => __('Callout'),
                       'public' => true,
                       'rewrite' => array('slug' => 'callouts'), // modify the page slug / permalink
                       'show_ui' => true,
                       'capability_type' => 'post',
                       'hierarchical' => false, //it means we cannot have parent and sub pages
                       'query_var' => false,
                       'exclude_from_search' => true,
                       'supports' => array(
                                           'title', // entry title
                                           'thumbnail', // featured image
                                           'editor', //standard wysywig editor
                                           'page-attributes'),
                       'labels' => array(
                                           'name' => __( 'Callouts' ),
                                           'singular_name' => __( 'Callout' ),
                                           'add_new' => __( 'Add New' ),
                                           'add_new_item' => __( 'Add New Callout' ),
                                           'edit' => __( 'Edit' ),
                                           'edit_item' => __( 'Edit Callout' ),
                                           'new_item' => __( 'New Callout' ),
                                           'view' => __( 'View Callout' ),
                                           'view_item' => __( 'View Callout' ),
                                           'search_items' => __( 'Search Callout' ),
                                           'not_found' => __( 'No Callout Found' ),
                                           'not_found_in_trash' => __( 'No Callout Found in Trash' ),
                                           'parent' => __( 'Parent Callout' )
                       )
               )

   );

   register_taxonomy_for_object_type('post_tag', 'callouts'); // Change to match custom content name
}
add_action('init', 'post_type_callouts'); // Change to match custom content name

// TESTIMONIALS ////////////////////

function post_type_testimonials() {

   register_post_type(
               'testimonials',
               array('label' => __('Testimonials'),
                       'singular_label' => __('Testimonial'),
                       'public' => true,
                       'rewrite' => array('slug' => 'oj_testimonials'), // modify the page slug / permalink
                       'show_ui' => true,
                       'capability_type' => 'post',
                       'hierarchical' => false, //it means we cannot have parent and sub pages
                       'query_var' => false,
                       'exclude_from_search' => true,
                       'supports' => array(
                                           'title', // entry title
                                           'thumbnail', // featured image
                                           'editor', //standard wysywig editor
                                           'page-attributes'),
                       'labels' => array(
                                           'name' => __( 'Testimonials' ),
                                           'singular_name' => __( 'Testimonial' ),
                                           'add_new' => __( 'Add New' ),
                                           'add_new_item' => __( 'Add New Testimonial' ),
                                           'edit' => __( 'Edit' ),
                                           'edit_item' => __( 'Edit Testimonial' ),
                                           'new_item' => __( 'New Testimonial' ),
                                           'view' => __( 'View Testimonials' ),
                                           'view_item' => __( 'View Testimonial' ),
                                           'search_items' => __( 'Search Testimonials' ),
                                           'not_found' => __( 'No Testimonial Found' ),
                                           'not_found_in_trash' => __( 'No Testimonials Found in Trash' ),
                                           'parent' => __( 'Parent Testimonial' )
                       )
               )

   );

   register_taxonomy_for_object_type('post_tag', 'testimonials'); // Change to match custom content name
}
add_action('init', 'post_type_testimonials'); // Change to match custom content name

// TESTIMONIALS ////////////////////

function post_type_press() {

   register_post_type(
               'press',
               array('label' => __('Press Article'),
                       'singular_label' => __('Press Article'),
                       'public' => true,
                       'rewrite' => array('slug' => 'press'), // modify the page slug / permalink
                       'show_ui' => true,
                       'capability_type' => 'post',
                       'hierarchical' => false, //it means we cannot have parent and sub pages
                       'query_var' => false,
                       'exclude_from_search' => true,
                       'supports' => array(
                                           'title', // entry title
                                           'thumbnail', // featured image
                                           'editor', //standard wysywig editor
                                           'page-attributes'),
                       'labels' => array(
                                           'name' => __( 'Press Articles' ),
                                           'singular_name' => __( 'Press Article' ),
                                           'add_new' => __( 'Add New' ),
                                           'add_new_item' => __( 'Add New Press Article' ),
                                           'edit' => __( 'Edit' ),
                                           'edit_item' => __( 'Edit Press Article' ),
                                           'new_item' => __( 'New Press Article' ),
                                           'view' => __( 'View Press Articles' ),
                                           'view_item' => __( 'View Press Article' ),
                                           'search_items' => __( 'Search Press Articles' ),
                                           'not_found' => __( 'No Press Article Found' ),
                                           'not_found_in_trash' => __( 'No Press Articles Found in Trash' ),
                                           'parent' => __( 'Parent Press Article' )
                       )
               )

   );

   register_taxonomy_for_object_type('post_tag', 'press'); // Change to match custom content name
}
add_action('init', 'post_type_press'); // Change to match custom content name

?>