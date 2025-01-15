<?php

// get post list specs
$mode = get_sub_field( 'mode' );
$filter_arg = '';
if ( $mode == 'filtered' ):
    $category = implode( ',', get_sub_field( 'category' ) );
    $filter_arg = ( $mode !='all' ? ' cats="' . $category . '"' : '' );
endif;

// posts per page
$posts_per_page = get_sub_field( 'posts_per_page' );
$color = get_sub_field( 'color' );
$padding = get_sub_field( 'padding' );

?>
<div class="post-list-container <?php print $color . ' ' . $padding ?>">
    <div class="post-list">
        <?php print do_shortcode( '[articles ' . $filter_arg . ' posts_per_page="' . $posts_per_page . '" /]' ); ?>
    </div>
</div>
<?php

