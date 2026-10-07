<?php
/**
 * The Template for displaying all single posts
 */

get_header();

if ( have_posts() ) :

?>
<div class="content-one pad-tall single">
	<h1><?php the_title(); ?></h1>
		<div class="content-one-inner">
			<?php print get_field( 'content' ); ?>
		</div>
    </div>
</div>
<?php
endif;

get_footer();

