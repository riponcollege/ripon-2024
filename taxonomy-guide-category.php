<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

$term = get_queried_object();
page_header( '<span>Guides:</span> ' . $term->name );

?>

<div class="content-wide">
	<div class="guides-container">
	<?php

	$item = 1;
	$menu = array();

	while ( have_posts() ) : the_post();
		$menu[] = '<li' . ( $item == 1 ? ' class="current"' : '' ) . ' data-id="' . $item . '">' . get_the_title() . '</li>';
		$content .= '<div class="guide-entry guide-' . $item . ( $item == 1 ? ' visible' : '' ) . '">
			<div class="guide-entry-inner"><h2>' . get_the_title() . '</h2>' . apply_filters( 'the_content', get_the_content() ) . '</div>
		</div>';
		$item++;
	endwhile;

	if ( !empty( $menu ) ) {
		?>
		<div class="guide-menu">
			<h6>Select a Guide:</h6>
			<ul><?php print implode( '', $menu ) ?></ul>
		</div>
		<div class="guide-content">
			<?php print $content ?>
		</div>
		<?php
	}

	?>
	</div>

	<div class="pagination">
		<?php pagination(); ?>
	</div>

</div>

<?php

get_footer();

?>