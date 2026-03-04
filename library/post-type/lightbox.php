<?php



// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function lightbox_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'lightbox', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __( 'Lightboxes', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Lightbox', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Lightboxes', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Lightbox', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Lightbox', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Lightbox', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Lightbox', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Lightbox', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the lightboxes.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-lightbulb', /* the icon for the custom post type menu */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => false,
			'supports' => array( 'title', 'revisions' )
		) /* end of options */
	); /* end of register post type */
	
	// add post tags to our cpt
	// register_taxonomy_for_object_type( 'post_tag', 'lightbox' );
	
}


// adding the function to the Wordpress init
add_action( 'init', 'lightbox_post_type');


// function outputs the lightbox code into the footer
// of each page.
function get_lightbox() {
    
	// retrieve and store the current post id
	global $post;

	// if the post type is set
	if ( !is_null( $post ) ) {

		// store the post id
		$current_page = $post->ID;

		// get all the lightboxes
		$the_query = new WP_Query(array(
			'post_type' => 'lightbox'
		));

		// if we have lightboxes
		if ( $the_query->have_posts() ) {

			// loop through the lightboxes and display the lightbox only
			// if the page is selected as a display location for the
			// lightbox
			while ( $the_query->have_posts() ) {

				// boolean to dictate whether a lightbox will display.
				$display_lightbox = false;
				
				// get this lightbox
				$the_query->the_post();

				// get the posts/pages/events this lightbox is supposed to display on
				$lightbox_pages = get_field( 'lightbox_pages' );
				$lightbox_urls = get_field( 'lightbox_urls' );
				$lightbox_content = get_field( 'lightbox_content' );
				$pageload = get_field( 'pageload' );
				$expires = get_field( 'expires' );
				$theme = get_field( 'theme' );

				// get the cookie name, if it's empty, set to the post id.
				$cookie = get_field( 'cookie' );
				if ( empty( $cookie ) ) {
					$cookie = get_the_ID();
				}

				// has the cookie name and add a prefix
				$cookie = 'lightbox-' . md5( $cookie );

				// if this page/event id is selected
				if ( is_array( $lightbox_pages ) ) {
					if ( in_array( $current_page, $lightbox_pages ) ) $display_lightbox = true;
				}

				// if this url is selected 
				$current_url = $_SERVER['REQUEST_URI'];

				// separate multiple specific urls for the match
				$lightbox_urls_array = explode( ',', $lightbox_urls );

				// check our url list is a valid array
				if ( is_array( $lightbox_urls_array ) ) {
					foreach ( $lightbox_urls_array as $lightbox_url ) {

						// trim the spaces from the url fragment so we can use it as a match
						$pattern = trim( $lightbox_url, ' ' );

						// if the current url matches the specified
						if ( fnmatch( $pattern, $current_url ) && !$display_lightbox ) {
							$display_lightbox = true;
						}

						// if we have any excludes
						if ( stristr( $pattern, '!' ) ) {
							if ( fnmatch( str_replace( '!', '', $pattern ), $current_url ) ) {
								$display_lightbox = false;
								break;
							}
						}
					}
				}

				// if the lightbox is supposed to be on this page.
				if ( $display_lightbox ) {
					print '<div class="lightbox-theme" data-expires="' . $expires . '" data-pageload="' . ( $pageload  ? 'true' : 'false' ) . '" data-cookie="' . $cookie . '">';
					print '<div class="lightbox-content">' . $lightbox_content . '</div>';
					print '</div>';
				}
			}
		}
		
		// restore original postdata
		wp_reset_postdata();
			
	}

}
add_action( 'wp_footer', 'get_lightbox' );

