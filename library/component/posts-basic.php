<?php

// get post category(s)
$category = implode( ',', get_sub_field( 'category' ) );
$filter_arg = ( $mode !='all' ? ' cats="' . $category . '"' : '' );

// posts per page
$posts_per_page = get_sub_field( 'posts_per_page' );

$more_news = get_sub_field( 'more_news' );
$more_news_link = get_sub_field( 'more_news_link' );

?>
<div class="post-basic-container">
    <div class="post-basic">
        <?php print do_shortcode( '[articles ' . $filter_arg . ' style="list" posts_per_page="' . $posts_per_page . '" /]' ); ?>
    </div>
    <?php if ( $more_news ) : ?><p class="text-center"><a href="<?php print $more_news_link['url'] ?>" class="btn red"><?php print $more_news_link['title'] ?></a></p><?php endif; ?>
</div>
<?php

