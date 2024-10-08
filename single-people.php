<?php
/**
 * The Template for displaying all single posts
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); 
        ?>
<div class="title-container small red">
    <div class="title">
        <h1><?php the_title(); ?></h1>
    </div>
</div>
<div class="content-wide" role="main">
    <?php the_content(); ?>
</div>
        <?php
    endwhile;
endif;

get_components();

get_footer();

