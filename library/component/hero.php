<?php

// get the photo
$photo = get_sub_field('photo');


// if it's not empty, lets output it
if ( !empty( $photo ) ) {
	?>
<div class="wrap">
	<div class="hero-photo">
		<img src="<?php print $photo ?>" />
	</div>
</div>
	<?php
}

