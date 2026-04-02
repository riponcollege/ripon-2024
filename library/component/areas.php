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
    <?php if ( $type!='curated' && count( $category )>1 ) : ?>
    <div class="area-filters">
        <a class="btn current" data-cat='all'>All</a>
        <?php foreach ( $category as $cat ) :
            $category_info = get_term_by( 'id', $cat, 'area_cat' ); ?>
        <a class="btn" data-cat="<?php print $cat; ?>"><?php print $category_info->name ?></a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="area-listing">

    <?php while ( $p->have_posts() ) : $p->the_post();
        // get the thumbnail
        $thumbnail = get_the_post_thumbnail_url();
        if ( empty( $thumbnail ) ) { $thumbnail = get_bloginfo( 'template_url') . '/img/placeholder-area.jpg'; }
        
        // get the area categories
        $area_categories = get_the_terms( get_the_ID(), 'area_cat' ); 
        $area_cats = array();
        foreach ( $area_categories as $cat ) {
            $area_cats[]=$cat->term_id;
        }
        ?>
        <a href="<?php the_permalink(); ?>">
        <div class="area-entry" data-cat="<?php print implode( ' ', $area_cats ) ?>" style="background-image: url(<?php print $thumbnail; ?>);">
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

