<?php
/* Load styles */
function load_stylesheets()
{
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

/* Include jquery */
function include_jquery()  
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery3.4.1.js', '', 1, true);
    wp_enqueue_script('jquery');

}
add_action('wp_enqueue_scripts', 'include_jquery');

function loadjs()
{
    wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
    wp_enqueue_script('customjs');

}
add_action('wp_enqueue_scripts', 'loadjs');


add_theme_support('menus');


add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
	register_nav_menus( array(
		'sm-top-menu' => __('Top Menu', 'scientificmass'),
	) );
}


add_action( 'widgets_init', 'sm_register_sidebars' );
    function sm_register_sidebars() {
        /* Register the 'primary' sidebar. */
        register_sidebar(
            array(
                'id'            => 'sidebar-top',
                'name'          => __( 'Sidebar-Top' ),
                'description'   => __( 'Sidebar Top.' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
            register_sidebar(
                array(
                    'id'            => 'sidebar-bottom',
                    'name'          => __( 'Sidebar-Bottom' ),
                    'description'   => __( 'Sidebar Bottom.' ),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h3 class="widget-title">',
                    'after_title'   => '</h3>',
                )
        );

        /* Repeat register_sidebar() code for additional sidebars. */
    }



 
/*Theme support*/

add_image_size('thumb_image', 380, 214, true);
add_image_size('thumb_small', 200, 120, true);
add_theme_support( 'post-thumbnails' );


/**
 * Registers support for Gutenberg wide images in Writy.
 */
function writy_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'writy_setup' );

