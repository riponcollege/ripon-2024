<?php
/*
Home/catch-all template
*/

get_header(); 


// do the page header
page_header( 'Ripon News' );


// parse the query string
$request = parse_query_string();

// lets globalize the wp_query var
global $wp_query, $paged;

// set the args based on current query
$args = $wp_query->query_vars;

// calculate results range to show above the result listing
if ( $paged > 0 ) {
	$result_range_start = ( ( $paged - 1 ) * $args['posts_per_page'] ) + 1;
	$result_range_end = ( $result_range_start + ( $args['posts_per_page'] - 1 ) );
	if ( $wp_query->found_posts > $result_range_end ) {
		$result_range = $result_range_start . ' - ' . $result_range_end; 
	} else {
		$result_range = $result_range_start . ' - ' . $wp_query->found_posts;
	}
} else {
	if ( $wp_query->found_posts > $args['posts_per_page'] ) {
		$result_range = '1 - ' . $args['posts_per_page'];
	} else {
		$result_range = '1 - ' . $wp_query->found_posts;
	}
}

// $args['page'] = ( $paged ? $paged : 1 );

// rerun the query
$query = new WP_Query( $args );

?>

<div class="news">
	<div class="wrap">
		<div class="content-wide" role="main">
			<h3>Browse by Category</h3>
			<p><?php wp_dropdown_categories( array( 'class' => 'quick-category-nav', 'value_field' => 'slug' ) ) ?></p>
			<hr />
			<div class="quiet total-results">
				There are <strong><?php echo $wp_query->found_posts; ?></strong> total posts. Showing results <strong><?php print $result_range; ?></strong>.
			</div>
			<hr />
			<div class="article-cards blog-listing">
			<?php

			while ( $query->have_posts() ) : $query->the_post();
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
	</div>
</div>

<?php

get_footer();

