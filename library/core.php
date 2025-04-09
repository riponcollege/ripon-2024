<?php


// include the main.js script in the header on the front-end.
function p_scripts() {
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'p_scripts' );


// register a couple nav menus
register_nav_menus( array(
	'header-main' => 'Header - Main',
	'header-aux' => 'Header - Aux',
    'footer-overview' => 'Footer - Overview',
    'footer-students' => 'Footer - Students',
    'footer-faculty' => 'Footer - Faculty'
) );


// register a generic sidebar.
register_sidebar( array(
	'id' => 'sidebar-generic',
	'name'=> 'General Sidebar',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widget-title"><h4>',
    'after_title' => '</h4></div>',
) );


// parse the query string
function parse_query_string() {
	$url_parts = wp_parse_url( $_SERVER['REQUEST_URI'] );
	parse_str( $url_parts['query'], $query_args );
	return $query_args;
}




// store the domain in a defined constant
function set_domain() {

	// make sure we don't already have a DOMAIN constant
	if ( !defined( 'DOMAIN' ) ) {

		// if there's a host set in server constants
		if ( isset( $_SERVER['HTTP_HOST'] ) ) {

			// store the domain temporarily after stripping some common stuff out
			define( 'DOMAIN', str_replace( ".jpederson.io", "", str_replace( ".edu", "", $_SERVER['HTTP_HOST'] ) ) );
			
		} else {

			// set a default this will be what gets set during wpcli commands.
			define( 'DOMAIN', 'ripon' );

		}
	}
	
}


// boolean function to determine if we're on ripon proper
function is_ripon() {

	// set the domain if we don't already have it
	set_domain();

	// check if we're on ripon proper
	if ( DOMAIN == 'www.ripon' || DOMAIN == 'ripon' || DOMAIN == 'ripon24' ) {
		return true;
	}

	// false if not
	return false;

}


// a boolean function to determine if we're on the alumni site
function is_alumni() {

	// set the domain if we don't already have it
	set_domain();

	// check for alumni domain
	if ( DOMAIN == 'alumni.ripon' || DOMAIN == 'ripon-alumni' ) {
		return true;
	}

	// false if not
	return false;

}


// a boolean function to determine if we're on the alumni site
function is_events() {

	// set the domain if we don't already have it
	set_domain();

	// check for events domain
	if ( DOMAIN == 'events.ripon' ||  DOMAIN == 'ripon-events' ) {
		return true;
	}

	// false if not
	return false;

}


// a boolean function to determine if we're on the employee site
function is_employees() {

	// set the domain if we don't already have it
	set_domain();

	// check for events domain
	if ( DOMAIN == 'employees.ripon' || DOMAIN == 'ripon-employees' ) {
		return true;
	}

	// false if not
	return false;

}



add_filter( 'body_class','site_classes' );
function site_classes( $classes ) {
 	
 	// use our site-specific boolean functions to include body classes
 	if ( is_ripon() ) $classes[] = 'site-ripon';
 	if ( is_alumni() ) $classes[] = 'site-alumni';
 	if ( is_events() ) $classes[] = 'site-events';
 	if ( is_employees() ) $classes[] = 'site-employees';
     
    return $classes;
}



if ( ! function_exists( 'pagination' ) ) :

    function pagination( $paged = '', $max_page = '' ) {
        $big = 999999999; // need an unlikely integer
        if( ! $paged ) {
            $paged = get_query_var('paged');
        }

        if( ! $max_page ) {
            global $wp_query;
            $max_page = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
        }

        echo paginate_links( array(
            'base'       => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text'  => __( '«' ),
            'next_text'  => __( '»' ),
            'type'       => 'list'
        ) );
    }
	
endif;


function page_header( $title ) {
	?>
<div class="title-container red">
	<div class="wrap">
		<div class="title">
			<h1><?php print $title ?></h1>
		</div>
	</div>
</div>
	<?php
}



function fn_search_courses_only($query) {
    if( $query->is_search && !is_admin() ) {
        $query->set('post_type', ( isset( $_REQUEST['post_type'] ) ? $_REQUEST['post_type'] : array( 'post', 'page', 'event', 'people' ) ) );
    }
}
add_action( 'pre_get_posts', 'fn_search_courses_only' );



function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'my_add_excerpts_to_pages' );

