<?php

$people_category = get_sub_field( 'group' );
$search = get_sub_field( 'search' );
$include_bio = get_sub_field( 'include-bio' );
$color = get_sub_field( 'color' );

// if the people category
if ( !empty( $people_category ) ) :

    // set some query vars
    $vars = array( 
        "posts_per_page" => 200,
        "post_type" => 'people',
        "orderby" => 'meta_value',
        "meta_key" => '_p_person_lname',
        "order" => 'ASC',
        "tax_query" => array(
            array (
                'taxonomy' => 'people_cat',
                'field' => 'id',
                'terms' => $people_category,
            )
        )
    );

    // run the query
    $p = new WP_Query( $vars );
    ?>

<section class="people-container <?php print $color ?>">
    <?php if ( $search ) : ?>
    <div class="people-search">
        <input type="text" name="people-search-term" id="s" placeholder="Search Name, Academic Department, or Title">
    </div>
    <?php endif; ?>

    <?php if ( $p->have_posts() ) : ?>
    <div class="people-listing">

    <?php while ( $p->have_posts() ) : $p->the_post(); ?>
        <div class="person-entry visible">
            <div class="person-photo">
                <?php 
                print ( $link ? '<a href="' . get_the_permalink() . '">' : '' ) . 
                    '<img src="' . get_the_post_thumbnail_url() . '">' . 
                    ( $link ? '</a>' : '' ); 
                ?>
            </div>
            <div class="person-info">
                <h4><?php print ( $link ? '<a href="' . get_the_permalink() . '">' : '' ) . get_field( "_p_person_lname" ) . ', ' . get_field( "_p_person_fname" ) . ( $link ? '</a>' : '' ) ?></h4>
                <p class="person-title"><?php print get_field( "_p_person_title" ); ?></p>
                <?php
                if ( $include_bio ) {
                    print '<p class="person-link"><a href="' . get_permalink() . '">View Bio</a></p>';
                }
                ?>
            </div>
        </div>
    <?php endwhile; ?>

    </div>
    
    <?php else: ?>
    <p>No people found in database.</p>
    <?php endif; ?>

</section>

<?php 

// reset the post data
wp_reset_postdata();

endif;
