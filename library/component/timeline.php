<?php

$background = get_sub_field( 'background' );
$background_image = get_sub_field( 'background-photo' );
$foreground_color = get_sub_field( 'foreground-color' );

$title = get_sub_field( 'title' );
$content = get_sub_field( 'content' );
$photo = get_sub_field( 'photo' );
$style = get_sub_field( 'style' );
$side = get_sub_field( 'side' );


?>
<div class="timeline <?php print $style ?> <?php print $side ?> <?php print ( $background == 'photo' ? 'fore-' . $foreground_color : '' ); ?> <?php print $background; ?>" <?php print ( $background == 'photo' ? 'style="background-image: url(' . $background_image . ')"' : '' ); ?>>
    <div class="timeline-line"></div>
    <div class="timeline-inner">
        <div class="timeline-photo">
            <?php if ( !empty( $photo ) ) : ?>
            <img src="<?php print $photo ?>" class="rounded" />
            <?php endif; ?>
        </div>
        <div class="timeline-content">
            <h3><?php print $title; ?></h3>
            <?php print $content ?>
        </div>
    </div>
</div>
