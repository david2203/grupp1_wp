<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> 8c469357aeed2a4e9a2fe2ba8e7cfc1b475418f3

// Woocommerce
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//includes registered and enqueued styles from enqueue.phpß

 
//enqueing some styles
function wpdocs_theme_name_scripts() {
 wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), '0.1.0', 'all');
 wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/css/font-awesome.css', array(), '0.1.0', 'all');
 wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/style.css', array(), '0.1.0', 'all');
 wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css', array(), '0.1.0', 'all');
 wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.js', array(), '1.0.0', true );
 wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}
 
function get_site_features() {
 add_theme_support('post-thumbnails');
}
 //function for theme config
add_action('after_setup_theme', 'get_site_features');
add_theme_support('post-thumbnails');



 //actions for enqueing
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

 
// funktion för att få menyer dropdown på adminpanelen i WP
 
add_theme_support('menus');
register_nav_menus(
 
 array(
 
 'main-menu' => 'Om oss menu',
 'new-menu' => 'Support menu'
 )
);
 
/* Registrera menyer */
add_theme_support('menus');
register_nav_menus(
 array(
 'header-menu' => 'Header Menu',
 )
);

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'footer',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Footers' ),
                'singular_name' => __( 'Footer' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Footers'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Footers', 'Post Type General Name', 'labb1-david' ),
            'singular_name'       => _x( 'Footer', 'Post Type Singular Name', 'labb1-david' ),
            'menu_name'           => __( 'Footers', 'labb1-david' ),
            'parent_item_colon'   => __( 'Parent Footer', 'labb1-david' ),
            'all_items'           => __( 'All Footers', 'labb1-david' ),
            'view_item'           => __( 'View Footer', 'labb1-david' ),
            'add_new_item'        => __( 'Add New Footer', 'labb1-david' ),
            'add_new'             => __( 'Add New', 'labb1-david' ),
            'edit_item'           => __( 'Edit Footer', 'labb1-david' ),
            'update_item'         => __( 'Update Footer', 'labb1-david' ),
            'search_items'        => __( 'Search Footer', 'labb1-david' ),
            'not_found'           => __( 'Not Found', 'labb1-david' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'labb1-david' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Footers', 'labb1-david' ),
            'description'         => __( 'Footer news and reviews', 'labb1-david' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'footer', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );


?>