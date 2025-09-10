<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

$term = get_queried_object();
$all_guides = get_field( 'all-guides', 'option' );

?>
<div class="title-container <?php print $theme . ' ' . $color . ' ' . ( $menu_count<5 ? 'columns' : '' ) . ' count-' . $menu_count ?>">
	<div class="wrap">
		<div class="title">
			<h1><?php print '<span>Guides:</span> ' . $term->name ?></h1>
			<?php if ( !empty( $nav_menu ) && $theme == 'large-menu' ) { ?>
			<div class="section-nav">
				<?php wp_nav_menu( array( 'menu' => $nav_menu ) ); ?>
			</div>
			<?php } ?>
			<div class="title-button">
				<a href="<?php print get_permalink( $all_guides->ID ); ?>" class="btn white">&laquo; All Guides</a>
			</div>
		</div>
	</div>
</div>

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