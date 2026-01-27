<?php


if ( have_rows( 'instance' ) ) : ?>
<div class="before-after-carousel">
    <div class="before-after-carousel-slides">
    <?php while ( have_rows( 'instance' ) ) : the_row();
        $image1 = get_sub_field( 'image_one' );
        $image2 = get_sub_field( 'image_two' );
        ?>
        <div class="before-after<?php print ( get_row_index() == 1 ? ' visible' : '' ); ?>">
            <img src="<?php print $image1; ?>" alt="Before" />
            <img src="<?php print $image2; ?>" alt="After" />
        </div>
    <?php endwhile; ?>
    </div>
    <a class="prev">Prev</a>
    <a class="next">Next</a>
</div>
<?php
endif;

