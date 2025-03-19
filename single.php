<?php
/**
 * The Template for displaying all single posts
 */

get_header();

if ( have_posts() ) :

?>
<div class="content-two-container pad-tall single">
	<h1><?php the_title(); ?></h1>
    <div class="content-two left">
		<div class="column one">
			<?php 
			while ( have_posts() ) : the_post(); ?>
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
			?>
		</div>
		<div class="column two sidebar">
			<div class="box">
			<div class="box-header red">
					<h4>Related News</h4>
				</div>
				<div class="box-content">
					<?php
					$categories = get_the_category();
					$cats = array();
					foreach ( $categories as $cat ) {
						$cats[] = $cat->term_id;
					}

					$related = new WP_Query(array(
						'category__in' => $cats,
						'posts_per_page' => 2
					));

					if ( $related->have_posts() ) :
						while ( $related->have_posts() ) : $related->the_post(); ?>
							<div class="entry">
								<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
								<p class="date">Posted <?php the_date(); ?></p>
							</div><?php
						endwhile;
					endif;

					wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="box">
				<div class="box-header">
					<h4>Upcoming Events</h4>
				</div>
				<div class="box-content">
					<?php
					$events = get_upcoming_events( 3 );

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
endif;

get_footer();

