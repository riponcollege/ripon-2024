<?php

// get the title and theme
$mode = get_sub_field( 'mode' );
$color = get_sub_field( 'color' );
$padding = get_sub_field( 'padding' );
$more_events = get_sub_field( 'more_events' );
$more_events_link = get_sub_field( 'more_events_link' );


// set up query args that apply for both modes.
$args = array(
    'post_type' => 'event',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'meta_value',
    'meta_key' => '_p_event_start',
    'order' => 'ASC',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => '_p_event_start',
            'value' => date( 'Y-m-d G:i:s', time() ),
            'compare' => '>='
        )
    )
);


// mode switch
if ( $mode == 'filtered' ) {

    // if we're filtering by a category
    $category = get_sub_field( 'category' );

    $args['tax_query'] = array(
        array(
            'taxonomy' => 'event_cat',
            'field'    => 'slug',
            'terms'    => $category->slug
        )
    );

} else { 
    
    // otherwise, this is a curated list
    $event_ids = get_sub_field( 'events' );

}

// get the events out of the database
$card_query = new WP_Query( $args );

// if it's not empty, lets output it
if ( $card_query->have_posts() ):
?>
<div class="event-cards-container <?php print $color ?> <?php print $padding ?>">
    <div class="event-cards">
    <?php
	while ( $card_query->have_posts() ): $card_query->the_post();
        // get the fields
        $start = strtotime( get_field( '_p_event_start' ) );
        ?>
        <div class="event-card">
            <?php the_post_thumbnail( 'event-card' ); ?>
            <div class="card-date">
                <div class="month"><?php print date( 'M', $start ); ?></div>
                <div class="day"><?php print date( 'j', $start ); ?></div>
                <div class="year"><?php print date( 'Y', $start ); ?></div>
            </div>
            <hr>
            <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
            <?php the_excerpt(); ?>
            <p class="card-button"><a href="<?php the_permalink() ?>" class="btn blue">Event Info</a></p>
        </div>
        <?php
    endwhile;
    ?>
    </div>
    <?php if ( $more_events ) : ?><p class="text-center"><a href="<?php print $more_events_link['url'] ?>" class="btn red"><?php print $more_events_link['title'] ?></a></p><?php endif; ?>
</div>
<?php
endif;

wp_reset_query();