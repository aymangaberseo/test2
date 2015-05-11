<?php 
add_theme_support( 'post-thumbnails' ); 

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'My right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'My left sidebar',
		'id'            => 'home_left_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) ); 

}

add_action( 'after_setup_theme', 'my_menu' );
function my_menu() {
    
    register_nav_menus( array(
       'home_nav_menu' => __( 'Home Menu', 'home' ),
       'home_nav_menu1' => __( 'Home Menu1', 'home' ),
       'home_nav_menu2' => __( 'Home Menu2', 'home' ),
        )
      );
  
}

add_action( 'widgets_init', 'arphabet_widgets_init' );


add_action( 'init', 'codex_doctor_init' );
/**
 * Register a doctor post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_doctor_init() {
	$labels = array(
		'name'               => _x( 'Doctors', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Doctor', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Doctors', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Doctor', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'doctor', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Doctor', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Doctor', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Doctor', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Doctor', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Doctors', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Doctors', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Doctors:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No doctors found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No doctors found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'doctor' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail','revisions','custom-fields'),
                'menu_icon'          => 'dashicons-id-alt',
	);

	register_post_type( 'doctor', $args );
}


add_action( 'init', 'codex_hospital_init' );
/**
 * Register a hospital post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_hospital_init() {
	$labels = array(
		'name'               => _x( 'Hospitals', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Hospital', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Hospitals', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Hospital', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'hospital', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Hospital', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Hospital', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Hospital', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Hospital', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Hospitals', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Hospitals', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Hospitals:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No hospitals found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No hospitals found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'hospital' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' )
	);

	register_post_type( 'hospital', $args );
}

// hook into the init action and call create_service_taxonomies when it fires
add_action( 'init', 'create_service_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "service"
function create_service_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Services', 'taxonomy general name' ),
		'singular_name'     => _x( 'Service', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Services' ),
		'all_items'         => __( 'All Services' ),
		'parent_item'       => __( 'Parent Service' ),
		'parent_item_colon' => __( 'Parent Service:' ),
		'edit_item'         => __( 'Edit Service' ),
		'update_item'       => __( 'Update Service' ),
		'add_new_item'      => __( 'Add New Service' ),
		'new_item_name'     => __( 'New Service Name' ),
		'menu_name'         => __( 'Service' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', array( 'doctor','hospital' ), $args );

}