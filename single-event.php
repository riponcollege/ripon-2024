<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
<div class="content-two-container white pad-tall single">
    <?php if ( !empty( $title ) ) : ?><h2><?php print $title ?></h2><?php endif; ?>
    <div class="content-two top left">
        <div class="column one">
            <?php  if ( have_posts() ) :
                while ( have_posts() ) : the_post(); 
                    $event_start = get_field( '_p_event_start' );
                    $event_start_formatted = str_replace( '12:00am', '', date( 'F jS, Y g:ia', strtotime( $event_start ) ) );
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <hr>
                    <h3><?php print $event_start_formatted; ?></h3>
                    <h4>Location: <?php the_field( '_p_event_location' ); ?></h4>
                    <hr>
                    <div class="post-thumbnail">
                    <?php
                    $featured_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
                    the_post_thumbnail();
                    if ( !empty( $featured_caption ) ) {
                        echo '<p class="wp-caption-text">' . $featured_caption . '</p>';
                    }
                    ?>
                    </div>
                    <?php
                    the_content();
                endwhile;
            endif; ?>
        </div>
        <div class="column two sidebar">
            <div class="box">
                <div class="box-header">
                    <h4>Upcoming Events</h4>
                </div>
                <div class="box-content">
                    <?php
                    $events = get_upcoming_events( 3, 0, get_the_ID() );

                    foreach ( $events as $event ) : ?>
                    <div class="entry">
                        <h6><a href="<?php print get_permalink( $event->ID ); ?>"><?php print $event->post_title; ?></a></h6>
						<p class="date"><?php print str_replace( '12:00am', '', date( 'M jS, Y g:ia', strtotime( $event->_p_event_start ) ) ); ?></p>
                    </div><?php
                    endforeach;

                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();

