<?php

// get the title and theme
$title = get_sub_field('title');
$theme = get_sub_field('theme');
$color = get_sub_field('color');


// if it's not empty, lets output it
if ( !empty( $title ) ) {
	?>
<div class="title-container <?php print $theme ?> <?php print $color ?>">
	<div class="wrap">
		<div class="title">
			<h1><?php print $title ?></h1>
		</div>
	</div>
</div>
	<?php
}
