<?php

// get the title and theme
$color = get_sub_field('color');
$style = get_sub_field('style');
$content_one = get_sub_field('content-one');


// if it's not empty, lets output it
if ( !empty( $content_one ) ) {
	?>
<div class="content-one <?php print $color ?> <?php print $style ?>">
	<div class="content-one-inner">
		<?php print $content_one ?>
	</div>
</div>
	<?php
}
