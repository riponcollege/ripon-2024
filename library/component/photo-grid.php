<?php

$padding = get_sub_field( 'padding' );
$color = get_sub_field( 'color' );

if ( have_rows( 'photos' ) ) : ?>
<div class="photo-grid-container <?php print $padding . ' ' . $color; ?>">
    <div class="photo-grid">
        <?php while ( have_rows( 'photos' ) ) : the_row(); ?>
        <a href="<?php print get_sub_field( 'link' ); ?>" style="background-image: url(<?php print get_sub_field( 'photo' ); ?>);">
            <div class="photo">
                <span><?php print get_sub_field( 'title' ); ?></span>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
</div>
<?php
endif;
