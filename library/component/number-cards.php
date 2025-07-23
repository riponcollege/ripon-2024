<?php

$title = get_sub_field( 'title' );
$intro = get_sub_field( 'intro' );
$background = get_sub_field( 'background' );

if ( have_rows( 'card' ) ) : ?>
<div class="number-cards" style="background-image:url(<?php print $background ?>)">
    <div class="number-cards-inner">
        <div class="column">
            <h2><?php print $title ?></h2>
            <div class="intro">
                <?php print $intro; ?>
            </div>
            <?php
            while ( have_rows( 'card' ) ) : the_row();
                $cutout = get_sub_field( 'cutout' );
                ?>
            <div class="card<?php print ( !empty( $cutout ) ? ' with-cutout' : '' ) ?>">
                <?php if ( !empty( $cutout ) ) { ?>
                <div class="card-cutout">
                    <img src="<?php print $cutout ?>" />
                </div>
                <?php } ?>
                <div class="card-content">
                    <h4 class="title"><?php the_sub_field( 'title' ); ?></h4>
                    <h3 class="number"><?php the_sub_field( 'number' ); ?></h3>
                    <?php the_sub_field( 'card_content' ) ?>
                    <?php 
                    $button_text = get_sub_field( 'button_text' );
                    $button_link = get_sub_field( 'button_link' );
                    if ( !empty( $button_text ) && !empty( $button_link ) ) { ?>
                    <div class="button-block"><a href="<?php print $button_link ?>" class="btn red"><?php print $button_text ?></a></div>
                    <?php } ?>
                </div>
            </div>
            <?php 
            if ( get_row_index() === 1 ) {
                ?></div><div class="column"><?php
            }
        endwhile; ?>
    </div>
</div><?php
endif;

