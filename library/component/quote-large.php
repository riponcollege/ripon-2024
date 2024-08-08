<?php


$photo = get_sub_field('photo');
$content = get_sub_field('content');
$citation = get_sub_field('citation');
$subtitle = get_sub_field('subtitle');
$color = get_sub_field('color');

if ( !empty( $photo ) && !empty( 'content' ) && !empty( $citation ) ) {
    ?>
<div class="quote-large-container <?php print $color ?>">
    <div class="wrap">
        <div class="quote-large">
            <div class="quote-photo">
                <img src="<?php print $photo; ?>" />
            </div>
            <div class="quote-content">
                <div class="quote-content-inner">
                    <?php print wpautop( $content ); ?>
                </div>
                <h4><?php print $citation ?></h4>
                <?php if ( !empty( $subtitle ) ) { ?><p class="subtitle"><?php print $subtitle ?></p><?php } ?>
            </div>
        </div>
    </div>
</div>
    <?php
}

