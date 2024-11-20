<?php

// get the title and theme
$title = get_sub_field('title');
$theme = get_sub_field('theme');
$color = get_sub_field('color');
$nav_menu = get_sub_field('nav-menu');

$menu_obj = wp_get_nav_menu_object( $nav_menu );
$menu_count = $menu_obj->count;

// if it's not empty, lets output it
if ( !empty( $title ) ) {
	?>
<div class="title-container <?php print $theme . ' ' . $color . ' ' . ( $menu_count<5 ? 'columns' : '' ) . ' count-' . $menu_count ?>">
	<div class="wrap">
		<div class="title">
			<h1><?php print $title ?></h1>
			<?php if ( !empty( $nav_menu ) && $theme == 'large-menu' ) { ?>
			<div class="section-nav">
				<?php wp_nav_menu( array( 'menu' => $nav_menu ) ); ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
	<?php
}
