<?php
/* Load styles */
function load_stylesheets()
{
    $version = wp_get_theme()->get( 'Version' );
    wp_register_style('style-home', get_template_directory_uri() . '/assets/css/style-home.css', array(), $version, 'all');
    wp_enqueue_style('style-home');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


/*Add theme support for post formats*/
add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );


/*Add theme support: menus and register a custom nav menu*/
add_theme_support('menus');


function sv_menus(){

	$locations = array(
		'sv-header-menu' => "Header Menu",
        'sv-conside-left-menu' => "Left Sidebar Menu"
	);
    register_nav_menus($locations);
}

add_action( 'init', 'sv_menus' );

/* Add sidebars */

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





/*Theme support for thumbnail sizes*/
add_theme_support( 'post-thumbnails' );
add_image_size('thumb_image', 380, 214, true);
add_image_size('thumb_small', 200, 120, true);
set_post_thumbnail_size( 50, 50, array( 'center', 'center') );



/*
Assume you???re wanting to add this Featured Images for books and all posts except other all custom post types. How to do this. See the code below. It???ll enable the Featured Image for all the posts and custom post type called books only.

add_theme_support( 'post-thumbnails', array( 'post', 'books' ) );

*/
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height' => 480,
    'width'  => 720,
) );


/**
 * Registers support for Gutenberg wide images in Writy.
 */
function writy_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'writy_setup' );

