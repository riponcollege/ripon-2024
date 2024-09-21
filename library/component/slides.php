<?php

?>
<div class="slides-container">
    <?php
    if ( have_rows( 'slides' ) ) : 
    ?>
    <div class="slides">
    <?php
    $count = 0;

    while ( have_rows( 'slides' ) ) : the_row();
        $title = get_sub_field( 'title' );
        $link = get_sub_field( 'link' );
        $image = get_sub_field( 'background' );
        $label = get_sub_field( 'label' );

        if ( !empty( $image ) && !empty( $title ) ) :
            ?>
        <div class="slide <?php 
            print ( get_row_index() == 1 ? 'visible' : '' ); 
            print ( !empty( $link ) ? ' has-link' : '' ) ?>"<?php
            print 'style="background-image: url(' . $image . ');"';
            print ( !empty( $link ) ? 'data-href="' . $link . '"' : '' ) ?>>

            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h1 class="slide-title"><?php print $title; ?></h1>
                <?php if ( !empty( $label ) ) : ?>
                    <a href="<?php print $link ?>" class="btn white"><?php print $label; ?></a>
                <?php endif; ?>
            </div>
        </div>
            <?php

            $count++;
        endif;
    endwhile;

    if ( $count > 1 ) : ?>
        <div class="slides-nav">
            <a class="previous">Previous</a>
            <a class="next">Next</a>
        </div>
        <?php
    endif;
    ?>
        <a href="#content-start" class="scroll-to-content"></a>
    </div>
    <?php
    endif;
    
?>
</div>
<a name="content-start"></a>
        
