<?php

$mode = get_sub_field( 'mode' );
$padding = get_sub_field( 'padding' );
$color = get_sub_field( 'color' );
$filtering = get_sub_field( 'filtering' );
$categories = get_sub_field( 'categories' );
$sort = get_sub_field( 'sort' );

if ( $filtering == 'all' ) {
    $guide_categories = get_terms( array( 
        'taxonomy' => 'guide-category',
        'orderby' => 'name',
        'order' => 'ASC'
    ) );
} else {
    $guide_categories = get_terms( array( 
        'taxonomy' => 'guide-category',
        'orderby' => 'name',
        'order' => 'ASC',
        'include' => $categories
    ) );
}

if ( !empty( $guide_categories ) && $mode == 'guides' ) : ?>

<div class="guides <?php print $color ?> <?php print $padding ?>">
    <?php 
    foreach ( $guide_categories as $guide_cat ) :
        
        $args = array(
            'post_type' => 'guide',
            'tax_query' => array(
                array(
                    'taxonomy' => 'guide-category', // Replace with your custom taxonomy slug
                    'field'    => 'slug', // or 'term_id' or 'name'
                    'terms'    => $guide_cat->slug, // Replace with the slug of the term you want to query
                ),
            ),
        );

        if ( $sort == 'sort' ) {
            $args['meta_query'] = array(
                'sort' => array(
                    'key' => 'sort', 
                    'compare' => 'EXISTS',
                    'type' => 'NUMERIC',
                ),
            );
            $args['orderby'] = 'sort title';
            $args['order'] = 'ASC';
        }
        $guides = new WP_Query( $args );

        if ( $guides->have_posts() ) : ?>
    <div class="guide-column accordions">
        <h4><?php print $guide_cat->name; ?></h4>
        <?php while ( $guides->have_posts() ) : $guides->the_post(); ?>
        <div class="guide-entry accordion red">
            <div class="guide-name accordion-handle"><?php the_title(); ?></div>
            <div class="guide-description accordion-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
        <?php 
        endif;
        wp_reset_postdata();
    endforeach;  
    ?>
</div>

<?php else: ?>

<div class="areas-container guide-categories <?php print $color; ?> <?php print $padding ?>">
    <div class="area-listing">

    <?php foreach ( $guide_categories as $guide_cat ) : 
        $thumbnail = get_field( 'image', $guide_cat->taxonomy . '_' . $guide_cat->term_id ); ?>
        <a href="/guide-category/<?php print $guide_cat->slug; ?>/">
        <div class="area-entry guide-entry" style="background-image: url(<?php print $thumbnail; ?>);">
            <div class="area-name"><?php print $guide_cat->name; ?></div>
        </div>
        </a>
    <?php endforeach; ?>

    </div>

</div>

<?php endif; ?>

