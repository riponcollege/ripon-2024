<?php

$supertitle = get_sub_field('supertitle');
$title = get_sub_field('title');
$title_element = get_sub_field( 'title_element' );
$title_element = ( empty( $title_element ) ? 'h2' : $title_element );
$intro = get_sub_field('intro');
$padding = get_sub_field('padding');
$color = get_sub_field('color');

if ( !empty( $title ) ) { 
    ?>
<div class="section-title-container <?php print $padding . ' ' . $color; ?>">
    <div class="section-title">
        <?php if ( !empty( $supertitle ) ) { ?><p class="supertitle"><?php print $supertitle; ?></p><?php } ?>
        <?php print '<' . $title_element . '>' . $title . '</' . $title_element . '>'; ?>
    </div>
    <?php if ( !empty( $intro ) ) { ?>
    <div class="section-intro">
        <?php print $intro; ?>
    </div>
    <?php } ?>
</div>
    <?php 
}

