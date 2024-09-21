<?php

$type = get_sub_field( 'type' );
$color = get_sub_field( 'color' );
$category = get_sub_field( 'area_category' );
$specific = get_sub_field( 'area_specific' );



if ( ( $type == 'curated' && !empty( $specific ) ) || ( $type == 'filtered' && !empty( $category ) ) ) : 
    ?>
<div class="areas-container <?php print $color; ?> <?php print $padding ?>">
    <?php

    // set some query vars
    $vars = array( 
        "posts_per_page" => 200,
        "post_type" => 'area',
        "orderby" => 'title',
        "order" => 'ASC',
        "post_status" => 'publish',
    );

    if ( $type == 'curated' ) :
        $vars["post__in"] = $specific;
    else:
        $vars["tax_query"] = array(
            array (
                'taxonomy' => 'area_cat',
                'field' => 'id',
                'terms' => $category,
            )
        );
    endif;

    // run the query
    $p = new WP_Query( $vars );
    
    if ( $p->have_posts() ) : ?>
    <div class="area-listing">

    <?php while ( $p->have_posts() ) : $p->the_post(); 
        $thumbnail = get_the_post_thumbnail_url();
        if ( empty( $thumbnail ) ) { $thumbnail = get_bloginfo( 'template_url') . '/img/placeholder-area.jpg'; } ?>
        <a href="<?php the_permalink(); ?>">
        <div class="area-entry" style="background-image: url(<?php print $thumbnail; ?>);">
            <div class="area-name"><?php the_title(); ?></div>
        </div>
        </a>
    <?php endwhile; ?>

    </div>
    
    <?php else: ?>
    <p>No areas found in database.</p>
    <?php endif; ?>

<?php 

    // reset the post data
    wp_reset_postdata();
?>

</div>
    <?php
endif;

