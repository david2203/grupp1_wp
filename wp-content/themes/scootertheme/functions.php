<?php 

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
 wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/main.css', array(), '0.1.0', 'all');
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
 'title-menu' => 'Scooter Haven'
 )
);

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'store',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Stores' ),
                'singular_name' => __( 'Store' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Stores'),
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
            'name'                => _x( 'Stores', 'Post Type General Name', 'grupp1_wp' ),
            'singular_name'       => _x( 'Store', 'Post Type Singular Name', 'grupp1_wp' ),
            'menu_name'           => __( 'Stores', 'grupp1_wp' ),
            'parent_item_colon'   => __( 'Parent Store', 'grupp1_wp' ),
            'all_items'           => __( 'All Stores', 'grupp1_wp' ),
            'view_item'           => __( 'View Store', 'grupp1_wp' ),
            'add_new_item'        => __( 'Add New Store', 'grupp1_wp' ),
            'add_new'             => __( 'Add New', 'grupp1_wp' ),
            'edit_item'           => __( 'Edit Store', 'grupp1_wp' ),
            'update_item'         => __( 'Update Store', 'grupp1_wp' ),
            'search_items'        => __( 'Search Store', 'grupp1_wp' ),
            'not_found'           => __( 'Not Found', 'grupp1_wp' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'grupp1_wp' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Stores', 'grupp1_wp' ),
            'description'         => __( 'Store news and reviews', 'grupp1_wp' ),
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
        register_post_type( 'store', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );

    add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');
 
function bbloomer_hide_shop_page_title($title) {
   if (is_shop()) $title = false;
   return $title;
}
   

?>