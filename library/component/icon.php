<?php

$icon = get_sub_field( 'icon' );
$content = get_sub_field( 'content' );

if ( !empty( $icon ) && !empty( $content ) ) :
    ?>
    <div class="icon-container">
        <div class="icon">
            <img src="<?php print $icon ?>" />
        </div>
        <div class="icon-content">
            <?php print $content ?>
        </div>
    </div>
    <?php
endif;

