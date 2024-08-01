<?php

// get the title and theme
$color = get_sub_field( 'color' );
$valign = get_sub_field( 'valign' );
$style = get_sub_field( 'style' );
$reverse = get_sub_field( 'reverse' );
$content_one = get_sub_field( 'content-one' );
$content_two = get_sub_field( 'content-two' );


// if it's not empty, lets output it
if ( !empty( $content_one ) ) {
	?>
<div class="content-two-container <?php print $color ?>">
    <div class="content-two <?php print $valign; ?> <?php print $style ?> <?php print ( $reverse ? 'reverse' : '') ?>">
        <div class="column one">
            <?php print $content_one ?>
        </div>
        <div class="column two">
            <?php print $content_two ?>
        </div>
    </div>
</div>
	<?php
}
