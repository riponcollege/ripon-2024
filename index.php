<?php
/*
Home/catch-all template
*/

get_header(); 

?>
<div class="news">
	<div class="wrap">
		<div class="content-wide" role="main">

			<?php
			if ( is_search() ) {
				?><h1 class="post-title">Search Results for <span>'<?php print filter_var( $_REQUEST["s"], FILTER_SANITIZE_STRING); ?>'</span></h1><?php
			} else {
				?><h1 class="post-title">Our Blog</h1><?php
			}

			if ( have_posts() ) : 

				// Start the Loop.
				while ( have_posts() ) : the_post(); 
					?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
					<p class="quiet">Posted by <?php print get_the_author_link() ?> in <?php print get_the_category_list( ', ' ) ?>.</p>
					<hr />
					<?php
				endwhile;

			else :

				print "<p>There are currently no posts to list here.</p>";

			endif;
			?>
			
			<?php paginate(); ?>

		</div><!-- #primary -->
	</div>
</div>

<?php get_footer(); ?>