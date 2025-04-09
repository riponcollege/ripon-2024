<?php
// search results template

get_header(); 

?>
<?php page_header( "Search: <span>'" . htmlspecialchars( $_REQUEST["s"] ) . "'</span>" ) ?>
<div class="search">
	<div class="wrap">
		<div id="content" class="wrap content-wide search-list" role="main">
			<?php include( 'searchform-advanced.php' ); ?>
			<hr />
			<div class="quiet total-results">
				Found <strong><?php echo $wp_query->found_posts; ?></strong> total results. Showing results <strong><?php print $result_range; ?></strong>.
			</div>
			<div class="entries">
			<?php
			if ( have_posts() ) {
				$count = 1;
				while ( have_posts() ) : the_post();
					?>
					<div class="entry <?php print $post->post_type ?>">
						<div class="description">
							<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							<?php 

							// output the excerpt
							the_excerpt();
							
							$categories = get_the_category();
							if ( !empty( $categories ) ) { 
								?>
							<p class="quiet">Posted <strong><?php print get_the_date( 'F jS, Y' ); ?></strong> in <strong><?php print get_cat_name( $categories[0]->term_id ); ?></strong></p>
								<?php
							}

							?>
						</div>
					</div>
					<?php
					$count++;
				endwhile;
				?>
			</div>
            <div class="pagination">
                <?php pagination(); ?>
            </div>
				<?php
			} else {
				print "<p>Sadly, your search returned no results. Please try another or navigate using the main menu.</p>";
			}
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
<?php 

wp_reset_postdata();

get_footer();

