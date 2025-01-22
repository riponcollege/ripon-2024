<?php

$padding = get_sub_field( 'padding' );
$style = get_sub_field( 'style' );
$color = get_sub_field( 'color' );

if ( have_rows( 'photos' ) ) : ?>
<div class="photo-grid-container <?php print $padding . ' ' . $color; ?>">
    <div class="photo-grid <?php print $style ?>">
        <?php while ( have_rows( 'photos' ) ) : the_row(); ?>
        <a href="<?php print get_sub_field( 'link' ); ?>">
            <div class="photo" style="background-image: url(<?php print get_sub_field( 'photo' ); ?>);">
                <span><?php print get_sub_field( 'title' ); ?>
                <?php if ( $style == 'whats-new' && !empty( get_sub_field( 'link_text' ) ) ) : ?><div class="photo-cta"><?php print get_sub_field( 'link_text' ); ?></div><?php endif; ?></span>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
</div>
<?php
endif;
