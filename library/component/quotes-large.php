<?php $color = get_sub_field( 'color' ); ?>
<div class="quote-large-container <?php print $color ?>">
    <div class="wrap">
        <div class="quote-large-carousel">
            <div class="quotes-large">
            <?php
            if ( have_rows( 'quotes' ) ) :
                while ( have_rows( 'quotes' ) ) : the_row();

                    $photo = get_sub_field( 'photo' );
                    $content = get_sub_field( 'content' );
                    $citation = get_sub_field( 'citation' );
                    $subtitle = get_sub_field( 'subtitle' );

                    if ( !empty( $photo ) && !empty( $content ) && !empty( $citation ) ) :
                    ?>
                <div class="quote-large<?php print ( get_row_index() == 1 ? ' visible' : '' ) ?>">
                    <div class="quote-photo">
                        <img src="<?php print $photo['url'] ?>" alt="<?php print $photo['alt'] ?>" />
                    </div>
                    <div class="quote-content">
                        <div class="quote-content-inner<?php print ( $hide_quotes ? ' no-quotes' : '' ) ?>">
                            <?php print wpautop( $content ); ?>
                        </div>
                        <h4><?php print $citation ?></h4>
                        <?php if ( !empty( $subtitle ) ) { ?><p class="subtitle"><?php print $subtitle ?></p><?php } ?>
                    </div>
                </div>
                    <?php endif;
                endwhile;
            endif; ?>
            </div>
            <div class="quotes-large-carousel-nav">
                <a href="#" class="prev">&lt;</a>
                <a href="#" class="next">&gt;</a>
            </div>
        </div>
    </div>
</div>

