<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
<div class="content-two-container white pad-tall">
    <?php if ( !empty( $title ) ) : ?><h2><?php print $title ?></h2><?php endif; ?>
    <div class="content-two top left">
        <div class="column one">
            <?php  if ( have_posts() ) :
                while ( have_posts() ) : the_post(); 
                    $event_start = get_field( '_p_event_start' );
                    $event_start_formatted = date( 'F jS, Y g:ia', strtotime( $event_start ) );
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
        <div class="column two">
            More events.
        </div>
    </div>
</div>

<?php

get_footer();

