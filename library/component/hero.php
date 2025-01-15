<?php

// get the fields
$photo = get_sub_field('photo');
$add_content = get_sub_field( 'add-content' );
$content = get_sub_field( 'content' );


// if it's not empty, lets output it
if ( !empty( $photo ) ) {
	?>
<div class="hero-photo<?php print ( $add_content ? ' with-content' : '' ) ?>" style="background-image: url(<?php print $photo ?>);">
	<img src="<?php print $photo ?>" class="hero-photo" />
	<?php if ( $add_content ) { ?>
	<div class="hero-content-container">
		<div class="hero-content">
			<?php print $content ?>
		</div>
	</div>
	<?php } ?>
</div>
	<?php
}

