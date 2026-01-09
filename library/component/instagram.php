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
        $posts = insta( $feed );
        foreach ( $posts->posts as $index => $post ) : 
            if ( $index < 3 ) : ?>
        <div class="insta-post">
            <div class="insta-post-attribution has-link" data-href="https://instagram.com/<?php print $posts->username ?>">
                <div class="insta-post-attribution-photo">
                    <img src="<?php print $posts->profilePictureUrl ?>" />
                </div>
                <div class="insta-post-attribution-name">
                    <?php print $posts->username ?>
                </div>
            </div>
            <div class="has-link" data-href="<?php print $post->permalink ?>">
                <div class="insta-post-content">
                <?php if ( $post->mediaType == 'VIDEO' ) : ?>
                    <video width="100%" controls poster="<?php print $post->sizes->large->mediaUrl ?>" style="aspect-ratio: <?php print $post->sizes->large->width ?> / <?php print $post->sizes->large->height ?>;">
                        <source src="<?php print $post->mediaUrl ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <img src="<?php print $post->mediaUrl ?>">
                <?php endif; ?>
                </div>
                <div class="insta-post-caption">
                    <?php print wpautop( $post->caption ) ?>
                </div>
            </div>
        </div>
            <?php endif;
        endforeach; ?>
    </div>
</div>
<?php
endif;

