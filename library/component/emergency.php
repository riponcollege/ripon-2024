<?php

$content = get_sub_field( 'content' );
$link = get_sub_field( 'link' );
$color = get_sub_field( 'color' );

$unique_id = get_the_ID() . '-' . get_row_index() . '-' . md5( $content );

if ( !empty( $content) ) : ?>
<div class="emergency-container <?php print $color ?>" data-id="<?php print $unique_id; ?>">
    <a class="close">close emergency bar</a>
    <?php if ( !empty( $link ) ) print '<a href="' . $link . '">'; ?>
    <div class="emergency">
        <?php print $content ?>
    </div>
    <?php if ( !empty( $link ) ) print '</a>'; ?>
</div>
<?php endif; ?>
