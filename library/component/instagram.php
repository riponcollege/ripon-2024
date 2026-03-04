<?php

$intro = get_sub_field( 'intro' );
$feed = get_sub_field( 'feed' );

if ( !empty( $feed ) ) : ?>
<div class="instagram-container">
    <div class="intro">
        <?php print $intro ?>
    </div>
    <div class="instagram-posts">
        <?php
        $insta_posts = insta( $feed );
        foreach ( $insta_posts->posts as $index => $insta_post ) : 
            if ( $index < 4 ) : ?>
        <div class="insta-post">
            <div class="insta-post-attribution has-link" data-href="https://instagram.com/<?php print $insta_posts->username ?>">
                <div class="insta-post-attribution-photo">
                    <img src="<?php print $insta_posts->profilePictureUrl ?>" />
                </div>
                <div class="insta-post-attribution-name">
                    <?php print $insta_posts->username ?>
                </div>
            </div>
            <div class="has-link" data-href="<?php print $insta_post->permalink ?>">
                <div class="insta-post-content">
                <?php if ( $insta_post->mediaType == 'VIDEO' ) : ?>
                    <video width="100%" controls poster="<?php print $insta_post->sizes->large->mediaUrl ?>" style="aspect-ratio: <?php print $insta_post->sizes->large->width ?> / <?php print $insta_post->sizes->large->height ?>;">
                        <source src="<?php print $insta_post->mediaUrl ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <img src="<?php print $insta_post->mediaUrl ?>">
                <?php endif; ?>
                </div>
                <div class="insta-post-caption">
                    <?php print wpautop( wp_trim_words( $insta_post->caption, 50 ) ) ?>
                </div>
            </div>
        </div>
            <?php endif;
        endforeach; ?>
    </div>
</div>
<?php
endif;

