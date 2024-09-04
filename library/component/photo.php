<?php

// get the photo
$photo = get_sub_field('photo');


// if it's not empty, lets output it
if ( !empty( $photo ) ) {
	?>
<div class="photo">
	<img src="<?php print $photo ?>" class='rounded' />
</div>
	<?php
}

