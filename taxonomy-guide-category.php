<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

$term = get_queried_object();
page_header( '<span>Guides:</span> ' . $term->name );

?>

<div class="content-wide news">
	<div class="articles card blog-listing">
	<?php

	while ( have_posts() ) : the_post();
		?>
		<div class="entry">
			<div class="thumbnail">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="entry-inner">
				<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</div>
		</div>
		<?php
	endwhile;

	?>
	</div>

	<div class="pagination">
		<?php pagination(); ?>
	</div>

</div>

<?php

get_footer();

?>