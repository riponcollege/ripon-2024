<?php

$title = get_sub_field( 'title' );
$intro = get_sub_field( 'intro' );
$color = get_sub_field( 'color' );

?>
<div class="stories-container <?php print $color ?>">
    <div class="stories-intro">
        <h2><?php print $title ?></h2>
        <?php print $intro; ?>
        <div class="nav-prev disable"></div>
        <div class="nav-next"></div>
    </div>
    <div class="stories-inner">
        <?php while ( have_rows( 'stories' ) ) : the_row(); 
            $story_title = get_sub_field( 'title' );
            $story_excerpt = get_sub_field( 'excerpt' );
            $story_photo = get_sub_field( 'photo' );
            $story_link = get_sub_field( 'link' );
            ?>
        <div class="story" data-link="<?php print $story_link; ?>">
            <img src="<?php print $story_photo['sizes']['post-thumbnail']; ?>">
            <div class="story-content">
                <h3><?php print $story_title; ?></h3>
                <?php print $story_excerpt; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>