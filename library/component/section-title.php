<?php

$supertitle = get_sub_field('supertitle');
$title = get_sub_field('title');
$intro = get_sub_field('intro');

if ( !empty( $title ) ) { 
    ?>
<div class="section-title-container">
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

