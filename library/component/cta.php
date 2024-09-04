<?php

$title = get_sub_field( 'title' );
$padding = get_sub_field( 'padding' );
$color = get_sub_field( 'color' );

?>
<div class="cta-container <?php print $padding . ' ' . $color; ?>">
    <div class="cta">
        <?php print ( !empty( $title ) ? '<h2 class="cta-title">' . $title . '</h2>' : '' ); ?>
        <?php get_template_part( 'library/component/cta_buttons'); ?>
    </div>
</div>