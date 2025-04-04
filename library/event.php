<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );


// let's create the function for the custom type
function event_post_type() { 

	// creating (registering) the custom type 
	register_post_type( 'event', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Events', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Event', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Events', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Event', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Event', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Event', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Event', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Event', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the events listed on the site.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-calendar-alt', /* the icon for the custom post type menu */
			'rewrite'	=> array( 
				'slug' => 'event', 
				'with_front' => false 
			), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'page',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' )
		) /* end of options */
	); /* end of register post type */

	// register_taxonomy_for_object_type( 'category', 'event' );	
	
}


// adding the function to the Wordpress init
add_action( 'init', 'event_post_type');



// now let's add custom categories (these act like categories)
register_taxonomy( 'event_cat', 
	array( 'event' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Event Categories', 'ptheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Event Category', 'ptheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Event Categories', 'ptheme' ), /* search title for taxomony */
			'all_items' => __( 'All Event Categories', 'ptheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Event Category', 'ptheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Event Category:', 'ptheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Event Category', 'ptheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Event Category', 'ptheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Event Category', 'ptheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Event Category Name', 'ptheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => false
	)
);



// the rewrite rules for event pages
function event_rewrite() {

	// get the events page id
	$events_page = get_page_by_path( 'events' );
	$page_id = $events_page->ID;

	// add the rewrite rule
	add_rewrite_rule('^events/*', 'index.php?page_id=' . $page_id, 'top');

}
add_action( 'init', 'event_rewrite' );



// parse the event url and determine defaults if we don't have all we need
function parse_events_url() {

	// make our globals
	global $event_cat, $event_yr, $event_mo, $event_mo_name;

	// get the request uri
	$url = str_replace( '/events/', '', $_SERVER['REQUEST_URI'] );

	// get url parts
	$url_parts = explode( '/', $url );

	// if we have a year
	if ( !empty( $url_parts[0] ) ) {
		$event_cat = $url_parts[0] ;
	}
	if ( !isset( $event_cat ) ) {
		// or set to all categories
		$event_cat = 'all';
	}

	// if we have a year
	if ( !empty( $url_parts[1] ) ) {
		$event_yr = $url_parts[1];
	} else { 
		// or current year
		$event_yr = date( 'Y' );
	}

	// if we have a month
	if ( !empty( $url_parts[2] ) ) {
		$event_mo = $url_parts[2];
		$event_mo_name = date( 'M', strtotime( $event_yr . '-' . $event_mo . '-01' ) );
	} else {
		// or current month
		$event_mo = date( 'n' );
		$event_mo_name = date( 'M' );
	}

}


// checks an event url to see if it's got all the required parameters, and redirect it if not.
function check_events_url() {

	// make our globals
	global $event_cat, $event_yr, $event_mo, $event_mo_name;

	// get the request uri
	$url = str_replace( '/events/', '', $_SERVER['REQUEST_URI'] );

	// get the request uri parts
	$url_parts = explode( '/', $url );

	// parse the existing url
	parse_events_url();

	// verify that we have all the parameters we need in the url
	if ( !isset( $url_parts[1] ) || !isset( $url_parts[2] ) || !isset( $url_parts[3] ) ) {
		
		// redirect to the defaults we set with parse_events_url function above
		wp_redirect( '/events/' . $event_cat . '/' . $event_yr . '/' . $event_mo . '/' );

	}

}


// get the events for a given month
function get_month_events( $m, $y, $category='all' ) {

	$args = array(
		'meta_query' => array(
			'relation' => 'OR',
			array(
				array(
					'key' => '_p_event_start',
					'value' => $y . '-' . str_pad( $m, 2, '0', STR_PAD_LEFT ),
					'compare' => 'LIKE'
				),
				array(
					'key' => '_p_event_end',
					'value' => $y . '-' . str_pad( $m, 2, '0', STR_PAD_LEFT ),
					'compare' => 'LIKE'
				)
			)
		),
		'post_type' => 'event',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_key' => '_p_event_start',
		'posts_per_page' => 100
	);


	// add event category to the query if it's not showing all events
	if ( $category != 'all' ) {
		$args[ 'event_cat' ] = $category;
	}


	$event_query = new WP_Query( $args );
	$events = $event_query->get_posts();

	foreach ( $events as $key => $event ) {
		$event_info = array();
		$event_info = get_post_custom( $event->ID );

		foreach ( $event_info as $info_key => $info_item ) {		
			$events[$key]->$info_key = $info_item[0];
		}
	}

	wp_reset_query();
	
	return $events;

}


// get upcoming events based on optional category
function get_upcoming_events( $limit, $category = 0, $exclude = 0 ) {

	$timestamp_start = date( 'Y-m-d', mktime( 0, 0, 0 ) );

	$args = array(
		'meta_query' => array(
			array(
				'key' => '_p_event_start',
				'value' => $timestamp_start,
				'compare' => '>=',
			)
		),
		'post_type' => 'event',
		'orderby' => 'meta_value',
		'meta_key' => '_p_event_start',
		'order' => 'ASC',
		'posts_per_page' => $limit
	);

	if ( !empty( $category ) ) {
		$categories = explode( ',', $category );
		if ( is_string( $categories[0] ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'event_cat',
					'field' => 'slug',
					'terms' => $categories
				)
			);
		} else {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'event_cat',
					'field' => 'id',
					'terms' => $categories
				)
			);
		}
	}

	if ( $exclude > 0 ) {
		if ( is_array( $exclude ) ) :
			$ex_clause = $exclude;
		else:
			$ex_clause = array( $exclude );
		endif;
		$args['post__not_in'] = $ex_clause;
	}

	$event_query = new WP_Query( $args );
	$events = $event_query->get_posts();

	foreach ( $events as $key => $event ) {
		$event_info = array();
		$event_info = get_post_custom( $event->ID );

		foreach ( $event_info as $info_key => $info_item ) {		
			$events[$key]->$info_key = $info_item[0];
		}
	}

	wp_reset_query();
	
	return $events;

}


// determine the previous month
function get_previous_month( $month, $year ) {
	if ( $month == 1 ) {
		return array( 'month' => 12, 'year' => $year-1 );
	} else {
		return array( 'month' => $month-1, 'year' => $year );
	}
}


// determine the next month
function get_next_month( $month, $year ) {
	if ( $month == 12 ) {
		return array( 'month' => 1, 'year' => $year+1 );
	} else {
		return array( 'month' => $month+1, 'year' => $year );
	}
}


// function to get the cache filename from month, year, and category
function get_month_cache_filename( $month, $year, $category = 'all' ) {

	// get upload directory info
	$upload_info = wp_upload_dir();

	// set up some variables to store cache urls
	$events_cache_dir = $upload_info['basedir'] . '/events-cache/';

	// create the cache directory if it doesn't exist
	if ( !is_dir( $events_cache_dir ) ) {
		mkdir( $events_cache_dir );
	}

	// gput together the filename and return it
	return $events_cache_dir . $month . '-' . $year . '-' . $category . '.txt';

}


// get the month cache from month, year, and filename
function get_month_cache( $month, $year, $category = 'all' ) {
	
	// get the cache filename
	$event_cache_file = get_month_cache_filename( $month, $year, $category );

	if ( file_exists( $event_cache_file ) ) {

		// refresh the cache if the cache file is older than 30 minutes
		if ( filemtime( $event_cache_file ) < ( time() - ( 60 * 60 ) ) ) {
			return false;
		} else {
			return file_get_contents( $event_cache_file );
		}
	}

}


// show month events
function show_month_events( $month, $year, $category = 'all' ) {

	// set up the events base url
	$event_base_url = "/events/";

	// get the cache
	$month_cache = get_month_cache( $month, $year, $category );

	// if we have cached the month code
	if ( $month_cache && !isset( $_REQUEST['fresh'] ) ) {
		
		// output the cache file
		print $month_cache;

	} else {
	
		// get the cache filename
		$event_cache_file = get_month_cache_filename( $month, $year, $category );

		// let's make an empty calendar
		$calendar = '';

		// get the events for the month.
		$events = get_month_events( $month, $year, $category );

		// show next and previous month links.
		$prev = get_previous_month( $month, $year );
		$prev_ts = mktime( 0, 0, 0, $prev['month'], 1, $prev['year'] );
		$next = get_next_month( $month, $year );
		$next_ts = mktime( 0, 0, 0, $next['month'], 1, $next['year'] );

		// open the table tags
		$calendar .= '<div class="calendar-container"><div class="calendar-grid">';

		// add the prev and next buttons to switch months
		$calendar .= '<a href="' . $event_base_url . $category . '/' . $prev['year'] . '/' . $prev['month'] . '/" class="month-nav previous">&lt; Prev</a>';
		$calendar .= '<a href="' . $event_base_url . $category . '/' . $next['year'] . '/' . $next['month'] . '/" class="month-nav next">Next &gt;</a>';

		// get the month name based on the month and year passed
		$month_name = date( 'M', strtotime( $year . '-' . $month . '-01' ) );

		// month name
		$calendar .= '<h4>' . $month_name . " " . $year . '</h4>';

		// begin the table
		$calendar .= '<table cellpadding="0" cellspacing="0" class="calendar">';

		// day titles
		$headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
		$calendar .= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings ) . '</td></tr>';

		// days and weeks vars now ...
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();

		// row for week one
		$calendar .= '<tr class="calendar-row">';

		// print "blank" days until the first of the current week
		for ( $x = 0; $x < $running_day; $x++ ) :
			$calendar .= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		// keep going with days....
		for ( $list_day = 1; $list_day <= $days_in_month; $list_day++ ) :

			// let's check the start and end of the day
			$day_start = mktime( 0, 0, 0, $month, $list_day, $year );
			$day_end = mktime( 23, 59, 59, $month, $list_day, $year );

			// loop through all the events and list them for this day.
			$day_events = '';
			foreach ( $events as $event ) {
				if ( ( strtotime( $event->_p_event_start ) >= $day_start && strtotime( $event->_p_event_start ) <= $day_end ) ) {
					$day_events .= 'event';
				}
			}

			// start building out the day.
			$calendar .= '<td class="calendar-day' . ( !empty( $day_events ) ? ' has-events' : '' ) . '" data-day="' . $month . '-' . $list_day . '">' . $list_day . '</td>';

			// end row if it's the end of the week.
			if ( $running_day == 6 ) :
				$calendar .= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar .= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;

		endfor;

		// finish the rest of the days in the week
		if ( $days_in_this_week < 8 ) :
			for ( $x = 1; $x <= ( 8 - $days_in_this_week ); $x++ ) :
				$calendar .= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;

		// end final row
		$calendar .= '</tr>';

		// close the table
		$calendar .= '</table>';

		// get the category dropdown
		$event_categories = get_terms(array(
			'taxonomy' => 'event_cat',
			'hide_empty' => true,
		));

		// category filter dropdown
		$calendar .= '<div class="event-category-switcher-container"><label for="event-category-switcher">Event Category</label><select name="event-category-switcher" class="event-category-switcher">';
		$calendar .= '<option value="/events/all/' . $year . '/' . $month . '/"' . ( $category == 'all' ? ' selected' : '' ) . '>- All Categories -</option>';
		foreach ( $event_categories as $event_category ) {
			$calendar .= '<option value="/events/' . $event_category->slug . '/' . $year . '/' . $month . '/"' . ( $event_category->slug == $category ? ' selected' : '' ) . '>' . 
				$event_category->name . 
				'</option>';
		}
		$calendar .= '</select>';

		// show category filter clear link if there's a category set
		if ( $category != 'all' ) $calendar .= '<a href="' . $event_base_url . 'all/' . $next['year'] . '/' . $next['month'] . '/" class="clear-category-filter">Show All Categories</a>';
		
		// close category filter div
		$calendar .= '</div>';
		
		// close the grid container
		$calendar .= '</div>';

		// loop through all the events and list them for this day.
		$events_list = '';
		if ( !empty( $events ) ) {
			foreach ( $events as $event ) {
				$show_times = ( date( "g:ia", strtotime( $event->_p_event_start ) ) != '12:00am' ? true : false );
				$same_day = ( date( "FjY", strtotime( $event->_p_event_start ) ) == date( "FjY", strtotime( $event->_p_event_end ) ) ? true : false );
				$start_time = ( $show_times ? date( "F jS g:i a", strtotime( $event->_p_event_start ) ) : date( "F jS", strtotime( $event->_p_event_start ) ) );
				$end_time = ( $same_day ? ( $show_times ? date( "g:i a", strtotime( $event->_p_event_end ) ) : '' ) : ( $show_times ? date( "F jS g:i a", strtotime( $event->_p_event_end ) ) : date( "F jS", strtotime( $event->_p_event_end ) ) ));
				$events_list .= "<div class='event' data-day='" . date( 'n', strtotime( $event->_p_event_start ) ) . "-" . date( 'j', strtotime( $event->_p_event_start ) ) . "'>
					<div class='event-title'>" . ( $event->_p_event_nolink == 'on' ? "" : "<a href=\"" . ( !empty( $event->_p_event_website ) ? $event->_p_event_website : get_permalink( $event->ID ) ) . "\" target='_blank'>" ) . $event->post_title . ( $event->_p_event_nolink == 'on' ? "" : "</a>" ) . "</div>
					<div class='event-time'>" . $start_time . ( !$same_day ? " - " . $end_time : '' ) . "</div>
					<div class='event-description'>" . $event->post_excerpt . "</div>
				</div>";
			}
		} else {
			$events_list .= '<p>No events to list for the selected month.</p>';
		}

		// add an empty div to populate event list into (for use on mobile).
		$calendar .= '<div class="calendar-event-list"><div class="calendar-event-list-title"><h4>Upcoming Events</h4></div><a class="clear-filter">Show All</a>' . $events_list . '</div></div>';
		
		// create the cache file, erring if we can't
		if ( !file_put_contents( $event_cache_file, $calendar ) ) {
			print 'Error writing cache file.';
		}

		/* all done, return result */
		print $calendar;

	}

}


// get a list of event categories in an array
function get_event_categories() {
    $args = array(
		'orderby'            => 'name',
		'order'              => 'ASC',
		'number'             => null,
		'echo'               => 0,
		'taxonomy'           => 'event_cat',
    );
    return get_categories( $args ); 
}


// filter events by category using a dropdown menu
function filter_by_event_type() {

	wp_dropdown_categories( 
		array(
			'show_option_all' => 'All Event Categories',
			'orderby' => 'NAME', 
			'taxonomy' => 'event_cat',
			'class' => 'event-category',
			'exclude' => '7756',
			'hierarchical' => 1,
			'depth' => 1,
			'selected' => ( isset( $_GET['event_category'] ) ? $_GET['event_category'] : 0 )
		) 
	);

}


// returns a duration from start and end timestamps
function duration( $start, $end ) {
	// get duration in seconds
	$duration_seconds = $end - $start;

	// calculate days, then hours, then minutes
	$days = floor( $duration_seconds / 86400 );
	$hours = floor( ( $duration_seconds - ( $days * 86400 ) ) / 3600 );
	$minutes = floor( ( $duration_seconds - ( $days * 86400 ) - ( $hours * 3600 ) ) / 60 );

	// build a time string
	$time_string_parts = array();
	if ( $days > 0 ) $time_string_parts[] = $days . ' day' . ( $days > 1 ? 's' : '' );
	if ( $hours > 0 ) $time_string_parts[] = $hours . ' hour' . ( $hours > 1 ? 's' : '' );
	if ( $minutes > 0 ) $time_string_parts[]= $minutes . ' minute' . ( $minutes > 1 ? 's' : '' );

	// return it.
	return implode( ", ", $time_string_parts );
}


// set the event columns for the event custom post type
add_filter( 'manage_edit-event_columns', 'edit_event_columns' ) ;
function edit_event_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Event' ),
		'start' => __( 'Date' ),
		'category' => __( 'Category' ),
	);

	return $columns;
}


// add some post clauses to select more fields when we get events.
add_filter( 'posts_clauses', 'manage_event_clauses', 1, 2 );
function manage_event_clauses( $pieces, $query ) {
	global $wpdb;

	/**
	* We only want our code to run in the main WP query
	* AND if an orderby query variable is designated.
	*/
	if ( $query->get( 'post_type' ) == 'event' && $query->get( 'orderby' ) == 'event_cat' ) {

		// Get the order query variable - ASC or DESC
		$order = strtoupper( $query->get( 'order' ) );

		// Make sure the order setting qualifies. If not, set default as ASC
		if ( $order != 'ASC' ) $order = 'DESC';

		// join category name
		$pieces[ 'join' ] .= " LEFT JOIN $wpdb->term_relationships wp_termrel ON wp_termrel.object_id = {$wpdb->posts}.ID ";
		$pieces[ 'join' ] .= " LEFT JOIN $wpdb->term_taxonomy wp_termtax ON wp_termrel.term_taxonomy_id = wp_termtax.term_id ";
		$pieces[ 'join' ] .= " LEFT JOIN $wpdb->terms wp_terms ON wp_terms.term_id = wp_termtax.term_id ";
		
		// add order
		$pieces[ 'orderby' ] = "wp_terms.name $order";

	}

	return $pieces;

}




// event shortcode
function events_shortcode( $event_atts ) {

	// set shortcode defaults
	$a = shortcode_atts( array(
		'limit' => 5,
		'category' => 0,
		'show_excerpt' => 0,
		'display' => 'list'
	), $event_atts );


	// get the events
	$events = get_upcoming_events( $a['limit'], $a['category'] );

	// start an empty event.
	$list = '';

	// list the events
	if ( !empty( $events ) ) {
		$list .= '<div class="event-list">';
		$num = 0;
		foreach ( $events as $event ) {

			// piece together an excerpt.
			$excerpt = ( !empty( $event->post_excerpt ) ? $event->post_excerpt : wp_trim_words( $event->post_content, 30 ) . "[...]" );

			$list .= '<div class="event' . ( $num == 0 ? ' first' : '' ) . '">';
			$list .= '<div class="event-date">';
				$list .= '<span class="event-date-month">' . date( 'M', strtotime( $event->_p_event_start ) ) . '</span>';
				$list .= '<span class="event-date-day">' . date( 'j', strtotime( $event->_p_event_start ) ) . '</span>';
			$list .= '</div>';
			$list .= '<h3><a href="' . ( !empty( $event->_p_event_website ) ? $event->_p_event_website : get_permalink( $event->ID ) ) . '"' . ( !empty( $event->_p_event_website ) ? ' target="_blank"' : '' ) . '>' . $event->post_title . '</a></h3>';
			$list .= '<div class="event-excerpt">' . $excerpt . '</div>';
			$list .= '</div>';
			$num++;
		}
		$list .= '</div>';
	}

	return $list;

}
add_shortcode( 'events', 'events_shortcode' );


// add a people shortcode
function event_agenda_shortcode( $atts ) {

	// set default params and override with those in shortcode
	extract( shortcode_atts( array(
		'category' => '',
		'show_title' => 0,
		'style' => ''
	), $atts ));

	// if we have a slug
	if ( !empty( $category ) ) {
		
		// get the agenda posts matching the slug
		$agenda_events = get_posts( array(
			'posts_per_page' => -1,
			'post_type' => 'event',
			'post_status' => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => 'event_cat',
					'field' => 'slug',
					'terms' => $category
				),
			),
			'meta_query' => array(
				'relation' => 'AND',
				'event_start' => array(
					'key' => '_p_event_start'
				),
				'event_end' => array(
					'key' => '_p_event_end',
				),
			),
			'orderby' => array(
				'event_start' => 'ASC',
				'event_end' => 'ASC',
			),
		) );
		
		// if we're displaying by day
		if ( $style == 'group-days' ) {
			$day_stepper = 0;
		}

	    // make sure we have agenda items
	    if ( !empty( $agenda_events ) ) {

			// if we don't have a current day
			if ( !isset( $current_day ) ) {
				$current_day = date( 'F j, Y', strtotime( get_field( '_p_event_start', $agenda_events[0]->ID ) ) );
			}

			$agenda_content = '';

			// show header if we're grouping by days
			if ( stristr( $style, 'group-days' ) && !stristr( $style, 'no-title' ) ) $agenda_content .= '<h3 class="agenda-day-header">' . $current_day . '</h3>';

			// empty content in case we don't have agenda items
			$agenda_content .= '<div class="agenda-container' . ( !empty( $agenda_style ) ? ' ' . $agenda_style : '' ) . '">';

			// start generating the agenda code
			$agenda_content .= '<section class="agenda">';

			// if we're supposed to display the headers, do so
			$agenda_content .='<div class="agenda-item agenda-heading">' . 
				'<div class="time">' . ( $style == 'group-days' ? 'Time' : 'Date/Time' ) . '</div>' .
				( !stristr( $style, 'no-location' ) ? '<div class="location">Location</div>' : '' ) .
				'<div class="content">Session Information</div>' .
			'</div>';

			foreach ( $agenda_events as $item ) {

				// get the time, location, and description
				$time = strtotime( get_field( '_p_event_start', $item->ID ) );
				$time_end = strtotime( get_field( '_p_event_end', $item->ID ) );
				$virtual = get_field( 'virtual', $item->ID );
				$location = get_field( '_p_event_location_text', $item->ID );
				$description = apply_filters( 'the_content', $item->post_excerpt );
				$color = get_field( 'color', $item->ID );
				if ( !$color ) $color = 'grey';

				// if we're grouping by days
				if ( $style == 'group-days' && $current_day != date( 'F j, Y', $time ) ) {

					// set the current day
					$current_day = date( 'F j, Y', $time );

					// close the previous days agenda div
					$agenda_content .= '</section></div>';

					$agenda_content .= '<h3 class="agenda-day-header">' . $current_day . '</h3>';

					// empty content in case we don't have agenda items
					$agenda_content .= '<div class="agenda-container' . ( !empty( $agenda_style ) ? ' ' . $agenda_style : '' ) . '">';
	
					// start generating the agenda code
					$agenda_content .= '<section class="agenda">';
	
					// if we're supposed to display the headers, do so
					$agenda_content .='<div class="agenda-item agenda-heading">' . 
						'<div class="time">' . ( $style == 'group-days' ? 'Time' : 'Date/Time' ) . '</div>' .
						( !stristr( $style, 'no-location' ) ? '<div class="location">Location</div>' : '' ) .
						'<div class="content">Session Information</div>' .
					'</div>';

				}

				// put together the people
				$people = get_field( 'people', $item->ID );
				$people_content = '';
				if ( !empty( $people ) ) {
					foreach ( $people as $person ) {
						// get some info about the person
						$person_title = get_post_meta( $person, '_p_person_title', 1 );
						$person_org = get_post_meta( $person, '_p_person_organization', 1 );

						$person_info = get_post( $person );
						$people_content .= '<div class="person">' . 
							'<div class="person-thumbnail"><a href="' . get_the_permalink( $person_info ) . '"><img src="' . get_the_post_thumbnail_url( $person_info ) . '" class="person-thumbnail" /></a></div>' .
							'<div class="person-info"><strong><a href="' . get_the_permalink( $person_info ) . '">' . $person_info->post_title . '</a></strong>' . ( !empty( $person_title ) ? '<br>' . $person_title : '' ) . ( !empty( $person_org ) ? '<br>' . $person_org : '' ) . '</div>' .
						'</div>';
					}
				}

				// put together the sponsors
				$sponsor_content = '';
				if ( have_rows( 'sponsors', $item->ID  ) ) {
					while ( have_rows( 'sponsors', $item->ID ) ) : the_row();
						$sponsor_content .= '<div class="sponsor"><img src="' . get_sub_field( 'logo' ) . '" alt="' . get_sub_field( 'name' ) . '" /></div>';
					endwhile;
				}
				
				// get the date/time to list in agenda table
				if ( stristr( $style, 'group-days' ) ) {
					$datetime = str_replace( ':00', '', date( 'g:i a', $time ) ) . ' - ' . str_replace( ':00', '', date( 'g:i a', $time_end ) ) . ( $virtual ? ' PT' : '' );
				} else {
					$times = format_times( $time, $time_end, 1, $virtual );
					$datetime = $times['formatted'];
				}

				// create agenda item
				$agenda_content .='<div class="agenda-item ' . $color . '">' . 
					'<div class="time"><strong>' . $datetime . '</strong></div>' .
					( !stristr( $style, 'no-location' ) ? '<div class="location">' . $location . '</div>' : '' ) .
					'<div class="content">' . 
					'<strong><a href="' . get_permalink( $item ) . '">' . $item->post_title . '</a></strong>' .
					'<div class="description">' . $description . '</div>' . 
					( !empty( $people_content ) ? '<div class="people">' . $people_content . '</div>' : '' ). 
					( !empty( $sponsor_content ) ? '<div class="sponsors">' . $sponsor_content . '</div>' : '' ) .
					'</div>' .
				'</div>';

			}

			// close the agenda div
			$agenda_content .= '</section>';

	    }

		$agenda_content .= '</div>';
    }

	return $agenda_content;
}
add_shortcode( 'event-agenda', 'event_agenda_shortcode' );


// format times for output in agendas and event pages
function format_times( $time_start = 0, $time_end = 0, $short = false, $virtual = false ) {

	// empty array to return
	$return = array();

	// if we have a start date/time
	if ( $time_start > 0 ) {

		// get the short month names for start and end
		$start_short_month = get_ap_month( date( 'n', $time_start ) );
		$end_short_month = get_ap_month( date( 'n', $time_end ) );

		// start dates+times in multiple timezones
		$return['start_date'] = ( $short ? get_ap_month( date( 'n', $time_start ) ) : date( 'F', $time_start ) ) . ' ' . date( 'j', $time_start ) . '<sup>' . date( 'S', $time_start ) . '</sup>';
		$return['start_time'] = str_replace( ':00', '', date( ( $short ? 'g:ia' : 'g:i a' ), $time_start ) );
		$return['start_time_mt'] = str_replace( ':00', '', date( ( $short ? 'g:ia' : 'g:i a' ), $time_start + 3600 ) );
		$return['start_time_et'] = str_replace( ':00', '', date( ( $short ? 'g:ia' : 'g:i a' ), $time_start + ( 3600 * 3 ) ) );
		
		// end times in multiple timezones
		$return['end_date'] = ( $short ? get_ap_month( date( 'n', $time_end ) ) : date( 'F', $time_end ) ) . ' ' . date( 'j', $time_end ) . '<sup>' . date( 'S', $time_end ) . '</sup> ';
		$return['end_time'] = str_replace( ':00', '', date( ( $short ? 'g:ia' : 'g:i a' ), $time_end ) );
		$return['end_time_mt'] = str_replace( ':00', '', date( ( $short ? 'g:ia' : 'g:i a' ), $time_end + 3600 ) );
		$return['end_time_et'] = str_replace( ':00', '', date( ( $short ? 'g:ia' : 'g:i a' ), $time_end + ( 3600 * 3 ) ) );

		// store whether or not to display times based on if they're midnight
		$return['show_start_time'] = ( $return['start_time'] == '12 am' || $return['start_time'] == '12am' ? false : true );
		$return['show_end_time'] = ( $return['end_time'] == '12 am' || $return['end_time'] == '12am' ? false : true );

		// determine if the start and end are the same day
		$return['is_multiday'] = ( date( 'md', $time_start ) == date( 'md', $time_end ) ? false : true );

		// check if start and end happen on same day
		if ( $return['start_date'] == $return['end_date'] ) $return['is_multiday'] = false;

		// if we also have an end time
		$return['has_end'] = ( $time_end > 0 ? true : false );

		// store the string we'll use between dates and times
		$at = ( !$short ? ' ' : '' ) . '<span class="date-at">@</span>' . ( !$short ? ' ' : '' );
		$from = ' <span class="date-at">from</span> ';
		$dash = ( !$short ? ' ' : '' ) . '<span class="date-at">&mdash;</span>' . ( !$short ? ' ' : '' );

		// format the date
		if ( $return['is_multiday'] ) {

			// show multi-day event
			$return['formatted'] = $return['start_date'] . ( $return['show_start_time'] ? $at . $return['start_time'] : '' ) . 
				( $return['has_end'] ? $dash . '<span class="nowrap">' . $return['end_date'] . 
				( $return['show_end_time'] ? $at . $return['end_time'] : '' ) . '</span>' : '' );

		} else {
			
			if ( $virtual ) {
				$return['formatted'] = '<strong>' . $return['start_date'] . '</strong><br>' .
					( $return['show_start_time'] ? ( !$return['has_end'] ? $at : '' ) . '<span class="nowrap">' . $return['start_time'] : '' ) . 
					( $return['show_end_time'] ? ( $return['has_end'] ? $dash . $return['end_time'] : '' ) : '' ) . ' PT</span><br>' . 
					( $return['show_start_time'] ? ( !$return['has_end'] ? $at : '' ) . '<span class="nowrap">' . $return['start_time_mt'] : '' ) . 
					( $return['show_end_time'] ? ( $return['has_end'] ? $dash . $return['end_time_mt'] : '' ) : '' ) . ' MT</span><br>' . 
					( $return['show_start_time'] ? ( !$return['has_end'] ? $at : '' ) . '<span class="nowrap">' . $return['start_time_et'] : '' ) . 
					( $return['show_end_time'] ? ( $return['has_end'] ? $dash . $return['end_time_et'] : '' ) : '' ) . ' ET</span>';

			} else {

				// show same day event start and end or date without end time.
				$return['formatted'] = $return['start_date'] . ( $return['has_end'] ? ( !$short ? $from : '<span class="date-at">:</span> ' ) : '' ) . 
					( $return['show_start_time'] ? ( !$return['has_end'] ? $at : '' ) . '<span class="nowrap">' . $return['start_time'] : '' ) . 
					( $return['show_end_time'] ? ( $return['has_end'] ? $dash . $return['end_time'] : '' ) : '' ) . '</span>';
					
			}

		}

	} else {

		// return empty if we don't have a start time
		$return['start_date'] = false;
		$return['start_time'] = false;
		$return['end_date'] = false;
		$return['end_time'] = false;
		$return['show_start_time'] = false;
		$return['show_end_time'] = false;
		$return['is_multiday'] = false;
		$return['has_end'] = false;
		$return['formatted'] = false;
		
	}
	
	// return it
	return $return;
}


// event-cta shortcode
function events_cta_shortcode( $event_atts ) {

	// set shortcode defaults
	$a = shortcode_atts( array(
		'limit' => -1,
		'category' => 0,
		'show_excerpt' => 0,
		'display' => 'list'
	), $event_atts );


	// get the events
	$events = get_upcoming_events( $a['limit'], $a['category'] );

	// start an empty event.
	$list = '';

	// list the events
	if ( !empty( $events ) ) {
		$list .= '<div class="event-list-cta' . ( $a['display'] == 'narrow' ? ' narrow' : '' ) . '">';
		$num = 0;
		foreach ( $events as $event ) {

			// piece together an excerpt.
			$excerpt = ( !empty( $event->post_excerpt ) ? $event->post_excerpt : wp_trim_words( $event->post_content, 20 ) );

			$link_url = get_permalink( $event->ID );

			// open the event item
			$list .= '<div class="event' . ( $num == 0 ? ' first' : '' ) . '">';

			// narrow styles
			if ( $a['display'] == 'narrow' ) {
				$list .= '<div class="event-date">';
					$list .= '<span class="event-date-month">' . date( 'M', $event->_p_event_start ) . '</span>';
					$list .= '<span class="event-date-day">' . date( 'j', $event->_p_event_start ) . '</span>';
				$list .= '</div>';
			} else {
				// state-related event list-style branding
				$list .= '<div class="event-branding ' . $event->_p_event_branding . '">';
				$list .= '<img src="' . get_bloginfo( 'template_url' ) . '/img/event-brand/' . $event->_p_event_branding . '.svg" />';
				$list .= '</div>';
			}

			// start event columns
			$list .= '<div class="event-cta-columns">';

			$time_start = strtotime( $event->_p_event_start );
			$time_end = strtotime( $event->_p_event_end );
			$time_formatted = format_times( $time_start, $time_end, 1 );
			
			// start event info
			$list .= '<div class="event-info">';
			$list .= '<h3><a href="' . ( !empty( $event->_p_event_website ) ? $event->_p_event_website : get_permalink( $event->ID ) ) . '"' . ( !empty( $event->_p_event_website ) ? ' target="_blank"' : '' ) . '>' . $event->post_title . '</a></h3>';
			$list .= '<div class="event-date">' . $time_formatted['formatted'] /* date( 'M j, Y \a\t g:i a', strtotime( $event->_p_event_start ) ) */ . '</div>';
			$list .= '<p class="event-excerpt">' . $excerpt . '</p>';
			$list .= '</div>';

			$registration_text = $event->_p_event_registration_text;
			if ( empty( $event->_p_event_registration_text ) ) {
				$registration_text = 'Register Now';
			}

			// start event ctas
			$list .= '<div class="event-ctas">';
			$list .= '<a href="' . $link_url . '" class="more-info">More Info</a>';
			$list .= '<a href="' . $event->_p_event_registration . '" class="register">' . $registration_text . '</a>';
			if ( !empty( $event->_p_event_cta1_link ) ) $list .= '<a href="' . $event->_p_event_cta1_link . '" class="cta1">' . $event->_p_event_cta1_text . '</a>';
			if ( !empty( $event->_p_event_cta2_link ) ) $list .= '<a href="' . $event->_p_event_cta2_link . '" class="cta2">' . $event->_p_event_cta2_text . '</a>';
			$list .= '</div>';

			// end event columns
			$list .= '</div>';

			// close the event item
			$list .= '</div>';
			$num++;
		}
		$list .= '</div>';
	}

	return $list;

}
add_shortcode( 'events-cta', 'events_cta_shortcode' );



function wpa84258_admin_posts_sort_last_name( $query ){
    global $pagenow;
    if ( is_admin() && 'edit.php' == $pagenow && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'event' ) {
		$query->set( 'meta_key', '_p_event_start' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'DESC' );
    }
}
add_action( 'pre_get_posts', 'wpa84258_admin_posts_sort_last_name' );



// add content to custom event admin listing columns
add_action( 'manage_event_posts_custom_column', 'manage_event_columns', 10, 2 );
function manage_event_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'start' :

			/* Get the post meta. */
			$start = get_post_meta( $post_id, '_p_event_start', true );

			print $start;
			/* If no duration is found, output a default message. 
			if ( empty( $start ) ) {
				echo __( '-' );

			} else if ( is_numeric( $start ) ) {
				printf( date( 'Y/m/d @ g:ia', $start ) );
			
			} else {
				printf( date( 'Y/m/d @ g:ia', strtotime( $start ) ) );
			}
			*/
			break;

		/* If displaying the 'genre' column. */
		case 'category' :

			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'event_cat' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'event_cat' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'event_cat', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( 'No Category' );
			}

			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}


// enable sortable columns for event post type
add_filter("manage_edit-event_sortable_columns", 'edit_event_sort');
function edit_event_sort( $columns ) {
	// $columns['start'] = '_p_event_start';
	return array();
}


// add the event data to the RSS feed for event post types.
function rss_event_date() {
	global $post;
	if ( $post->post_type == 'event' ) {
		print "<eventDate>" . date( 'r', get_post_meta( $post->ID, CMB_PREFIX . 'event_start', 1 ) ) . "</eventDate>";
	}
}
add_action( 'rss2_item', 'rss_event_date' );


// hook into feed and sort/limit event post type by event date.
function rss_event_sort( $query ) {
	if ( $query->is_feed && ( !empty( $query->get('event_cat') ) || $query->get('post_type')=='event' ) ) {
		$query->set('orderby','meta_value');
		$query->set('meta_key', CMB_PREFIX . 'event_start');
		$query->set('order','ASC');
		$query->set('posts_per_page','30');
		$query->set('meta_value',mktime());
		$query->set('meta_compare','>=');
	}
	return $query;
}
add_filter( 'pre_get_posts', 'rss_event_sort' );


add_filter( 'cron_schedules', 'add_15m_interval' );
function add_15m_interval( $schedules ) { 
    $schedules['fifteen_minutes'] = array(
        'interval' => 900,
        'display'  => esc_html__( 'Every Fifteen Minutes' ) );
    return $schedules;
}


// register an action that does the event cleanup
add_action( 'event_cleanup', 'event_cleanup' );


// if we don't have a schedule created
if ( !wp_next_scheduled( 'event_cleanup' ) ) {

	// clean up old events on the same schedule.
	wp_schedule_event( time(), 'fifteen_minutes', 'event_cleanup' );
}


function event_cleanup() {

	// get the retention setting from the database
	$retention = get_field( 'event-retention', 'option' );

	// select all events older than a hear ago
	$timestamp_old = time() - ( 86400 * $retention );

	$args = array(
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => '_p_event_start',
				// 'value' => date( 'Y-m-d G:i:s', $timestamp_old ),
				'value' => $timestamp_old,
				'compare' => '<='
			)
		),
		'post_type' => 'event',
		'orderby' => 'meta_value_num',
		'meta_key' => '_p_event_start',
		'order' => 'ASC',
		'posts_per_page' => 50
	);

	// get the posts
	$to_delete = new WP_Query( $args );

	// if we have posts.
	if ( $to_delete->have_posts() ) {

		// loop through them
		while ( $to_delete->have_posts() ) : $to_delete->the_post();

			// delete (forcing deletion from the database).
			wp_delete_post( get_the_ID(), 1 );

		endwhile;
	}

}


