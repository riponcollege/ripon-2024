<?php

$supertitle = get_sub_field('supertitle');
$title = get_sub_field('title');
$intro = get_sub_field('intro');
$padding = get_sub_field('padding');
$color = get_sub_field('color');

if ( !empty( $title ) ) { 
    ?>
<div class="section-title-container <?php print $padding . ' ' . $color; ?>">
    <div class="section-title">
        <?php if ( !empty( $supertitle ) ) { ?><p class="supertitle"><?php print $supertitle; ?></p><?php } ?>
        <h2><?php print $title ?></h2>
    </div>
    <?php if ( !empty( $intro ) ) { ?>
    <div class="section-intro">
        <?php print $intro; ?>
    </div>
    <?php } ?>
</div>
    <?php 
}

