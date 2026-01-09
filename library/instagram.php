<?php


// do instagram feed
function insta( $feed ) {

    // get the cache if it exists
    $insta_cache = get_insta_cache( $feed );

    // if the cache var isn't 'false', return it.
    if ( !$insta_cache ) {
        return refresh_insta_cache( $feed );
    } else {
        return json_decode( $insta_cache );
    }

}

// do instagram feed
function refresh_insta_cache( $feed ) {

    // get cache file name
    $insta_cache_file = get_insta_cache_filename( $feed );
    
    // otherwise, get the feed for it, and cache the result
    $feed_content = file_get_contents( $feed );
    print $feed_content;
    if ( !file_put_contents( $insta_cache_file, $feed_content ) ) {
        print 'Error writing cache file.';
    }

    return json_decode( $feed_content );
        
}


// function to get the cache filename from month, year, and category
function get_insta_cache_filename( $feed ) {

	// get upload directory info
	$upload_info = wp_upload_dir();

	// set up some variables to store cache urls
	$insta_cache_dir = $upload_info['basedir'] . '/insta-cache/';

	// create the cache directory if it doesn't exist
	if ( !is_dir( $insta_cache_dir ) ) {
		mkdir( $insta_cache_dir );
	}

	// gput together the filename and return it
	return $insta_cache_dir . get_uniqid( $feed ) . '.txt';

}


// get the month cache from month, year, and filename
function get_insta_cache( $feed ) {
	
	// get the cache filename
	$insta_cache_file = get_insta_cache_filename( $feed );

	if ( file_exists( $insta_cache_file ) ) {

        $modified_time_gmt = new DateTime( '@' . filemtime( $insta_cache_file ) );
        $modified_time_gmt->setTimeZone( wp_timezone() );
        $modified_timestamp = $modified_time_gmt->format( 'U' );
        $compare_timestamp = time() - ( 30 * 60 );

		// refresh the cache if the cache file is older than 30 minutes
		if ( $modified_timestamp < $compare_timestamp ) {
			return refresh_insta_cache( $feed );
		} else {
			return file_get_contents( $insta_cache_file );
		}
	}

}


// get the feed id
function get_uniqid( $feed ) {

    // return everything after the last slash in the feed url
    return substr( $feed, strrpos( $feed, '/' ) + 1 );

}

