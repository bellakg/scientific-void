<?php
// https://clicknathan.com/web-design/make-your-own-custom-post-formats-wordpress/
// hook into the init action and call custom_post_formats_taxonomies when it fires
add_action( 'init', 'custom_post_formats_taxonomies', 0 );

// create a new taxonomy we're calling 'format'
function custom_post_formats_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Formats', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Format', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Formats', 'textdomain' ),
		'all_items'         => __( 'All Formats', 'textdomain' ),
		'parent_item'       => __( 'Parent Format', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Format:', 'textdomain' ),
		'edit_item'         => __( 'Edit Format', 'textdomain' ),
		'update_item'       => __( 'Update Format', 'textdomain' ),
		'add_new_item'      => __( 'Add New Format', 'textdomain' ),
		'new_item_name'     => __( 'New Format Name', 'textdomain' ),
		'menu_name'         => __( 'Format', 'textdomain' ),
	);


	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'format' ),
		'capabilities' => array(
			'manage_terms' => '',
			'edit_terms' => '',
			'delete_terms' => '',
			'assign_terms' => 'edit_posts'
		),
		'public' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
	);
	register_taxonomy( 'format', array( 'post' ), $args ); // our new 'format' taxonomy
}


// programmatically create a few format terms
function example_insert_default_format() { // later we'll define this as our default, so all posts have to have at least one format
	wp_insert_term(
		'Default',
		'format',
		array(
		  'description'	=> '',
		  'slug' 		=> 'default'
		)
	);
}
add_action( 'init', 'example_insert_default_format' );


// repeat the following 11 lines for each format you want
function example_insert_map_format() {
	wp_insert_term(
		'Map', // change this to
		'format',
		array(
		  'description'	=> 'Adds a large map to the top of your post.',
		  'slug' 		=> 'map'
		)
	);
}
add_action( 'init', 'example_insert_map_format' );


// make sure there's a default Format type and that it's chosen if they didn't choose one
function moseyhome_default_format_term( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'format' => 'default' // change 'default' to whatever term slug you created above that you want to be the default
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'moseyhome_default_format_term', 100, 2 );


// replace checkboxes for the format taxonomy with radio buttons and a custom meta box
function wpse_139269_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'format' ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
            if ( ! class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist' ) ) {
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, $args = array() ) {
                        $output = parent::walk( $elements, $max_depth, $args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );
                        return $output;
                    }
                }
            }
            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }
    return $args;
}


add_filter( 'wp_terms_checklist_args', 'wpse_139269_term_radio_checklist' );