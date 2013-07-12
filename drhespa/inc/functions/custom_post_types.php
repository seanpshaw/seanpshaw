<?php
// SLIDES ////////////////////

add_action('init', 'Orbit');

function Orbit(){
  $Orbit_args = array(
    'label' => __('Slides'),
    'singular_label' => __('Slides'),
    'public'  =>  true,
    'show_ui' =>  true,
    'capability_type' =>  'post',
    'hierarchical'  =>  true,
    'rewrite' =>  true,
    'supports'  =>  array('title', 'editor','page-attributes','thumbnail')
    );
  register_post_type('Orbit', $Orbit_args);
}

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

// MINI BANNERS ////////////////////

function post_type_minibanners() {

   register_post_type(
               'minibanners',
               array('label' => __('Mini Banners'),
                       'singular_label' => __('Mini Banner'),
                       'public' => true,
                       'rewrite' => array('slug' => 'mini-banners'), // modify the page slug / permalink
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
                                           'name' => __( 'Mini Banners' ),
                                           'singular_name' => __( 'Mini Banner' ),
                                           'add_new' => __( 'Add New' ),
                                           'add_new_item' => __( 'Add New Mini Banner' ),
                                           'edit' => __( 'Edit' ),
                                           'edit_item' => __( 'Edit Mini Banner' ),
                                           'new_item' => __( 'New Mini Banner' ),
                                           'view' => __( 'View Mini Banners' ),
                                           'view_item' => __( 'View Mini Banner' ),
                                           'search_items' => __( 'Search Mini Banners' ),
                                           'not_found' => __( 'No Mini Banners Found' ),
                                           'not_found_in_trash' => __( 'No Mini Banners Found in Trash' ),
                                           'parent' => __( 'Parent Mini Banner' )
                       )
               )

   );

   register_taxonomy_for_object_type('post_tag', 'minibanners'); // Change to match custom content name
}
add_action('init', 'post_type_minibanners'); // Change to match custom content name

// Accordion Content ////////////////////

function post_type_accordion_content() {

   register_post_type(
               'accordion_content',
               array('label' => __('Accordion Content'),
                       'singular_label' => __('Accordion Content'),
                       'public' => true,
                       'rewrite' => array('slug' => 'accordion-content'), // modify the page slug / permalink
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
                                           'name' => __( 'Accordion Content' ),
                                           'singular_name' => __( 'Accordion Content' ),
                                           'add_new' => __( 'Add New' ),
                                           'add_new_item' => __( 'Add New Accordion Content' ),
                                           'edit' => __( 'Edit' ),
                                           'edit_item' => __( 'Edit Accordion Content' ),
                                           'new_item' => __( 'New Accordion Content' ),
                                           'view' => __( 'View Accordion Content' ),
                                           'view_item' => __( 'View Accordion Content' ),
                                           'search_items' => __( 'Search Accordion Content' ),
                                           'not_found' => __( 'No Accordion Content Found' ),
                                           'not_found_in_trash' => __( 'No Accordion Content Found in Trash' ),
                                           'parent' => __( 'Parent Accordion Content' )
                       )
               )

   );

   register_taxonomy_for_object_type('post_tag', 'accordion_content'); // Change to match custom content name
}
add_action('init', 'post_type_accordion_content'); // Change to match custom content name

?>