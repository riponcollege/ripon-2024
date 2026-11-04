<?php


if ( have_rows( 'items' ) ) : ?>
<div class="photo-carousel">
    <div class="photo-carousel-slides">
    <?php while ( have_rows( 'items' ) ) : the_row();
        $photo = get_sub_field( 'photo' );
        ?>
        <div class="photo<?php print ( get_row_index() == 1 ? ' visible' : '' ); ?>">
            <img src="<?php print $photo['url']; ?>" alt="<?php print $photo['alt'] ?>" rel="preload" />
        </div>
    <?php endwhile; ?>
    </div>
    <a class="prev">Prev</a>
    <a class="next">Next</a>
</div>
<?php
endif;

