<?php

if( have_rows('slide') ):
    
    print '<div class="slides">';

    // loop through the rows of data
    $num = 0;
    while ( have_rows('slide') ) : the_row();

        $background = get_sub_field('background');
        $content = get_sub_field('content');
        $link = get_sub_field('link');
        $color = get_sub_field('color');
        ?>
        <div class="slide<?php print ( $num == 0 ? ' visible' : '' ) . ( !empty( $link ) ? ' has-link' : '' ); print ' ' . $color ?>"
            <?php if ( !empty( $link ) ) { ?>data-href="<?php print $link ?>"<?php } ?>>
            <div class="slide-background" style="background-image: url(<?php print $background; ?>);"></div>
            <div class="slide-content">
                <div class="slide-content-inner">
                    <?php print $content ?>
                </div>
            </div>
        </div>
        <?php
        $num++;

    endwhile;

    if ( $num > 1 ) print '<div class="slides-nav"><a href="#" class="previous">Previous</a><a href="#" class="next">Next</a></div>';
    print '</div>';

endif;

