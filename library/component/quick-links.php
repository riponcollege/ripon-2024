<?php
    
$large_title = get_sub_field( 'quick-links-title' );

if ( have_rows('rows') ): 
    ?>
<div class="quick-links-container">
    <div class="wrap">
        <div class="quick-links">
        <?php if ( !empty( $large_title ) ) { ?><div class="quick-links-title"><h2><?php print $large_title ?></h2></div><?php } ?>
    <?php
    // loop through the rows of data
    $num = 1;
    while ( have_rows( 'rows' ) ) : the_row();

        $photo = get_sub_field('photo');
        $title = get_sub_field('title');
        $content = get_sub_field('content');
        $link_text = get_sub_field('link-text');
        $link = get_sub_field('link');
        ?>
            <a href="<?php print $link; ?>">
            <div class="row <?php print ( is_int( $num / 2 ) ? 'even' : 'odd' ); ?>">
                <div class="column photo" style="background-image: url(<?php print $photo ?>);">&nbsp;</div>
                <div class="column content">
                    <h4><?php print $title ?></h4>
                    <p><?php print $content ?></p>
                    <p><span class="cta"><?php print $link_text ?> &xrarr;</span></p>
                </div>
            </div>
            </a>
        <?php
        $num++;

    endwhile;

    ?>
        </div>
    </div>
</div>
<?php
endif;

