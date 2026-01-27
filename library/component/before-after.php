<?php

$image1 = get_sub_field( 'image_one' );
$image2 = get_sub_field( 'image_two' );

if ( !empty( $image1 ) && !empty( $image2 ) ) {
    ?>
<div class="before-after visible">
    <img src="<?php print $image1; ?>" alt="Before" />
    <img src="<?php print $image2; ?>" alt="After" />
</div>
    <?php
}
