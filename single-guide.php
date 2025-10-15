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
    </div>
</div>
<?php
endif;

get_footer();

