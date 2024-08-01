<?php

global $supertitle, $title, $intro;

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

