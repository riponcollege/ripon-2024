<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>

	<div class="content-wide" role="main">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				?>
				<h1><?php the_title(); ?></h1>
				<div class="content-narrow">
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
				?>
				</div>
				<?php
			endwhile;
		endif;
		?>
	</div>

<?php

get_footer();

