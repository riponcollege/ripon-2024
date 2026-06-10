<?php
    
$large_title = get_sub_field( 'quick-links-title' );
$title_element = get_sub_field( 'title_element' );
$title_element = ( empty( $title_element ) ? 'h2' : $title_element );
$padding = get_sub_field( 'padding' );
$color = get_sub_field( 'color' );

if ( have_rows('rows') ): 
    ?>
<div class="quick-links-container <?php print $color; ?>">
    <div class="wrap">
        <div class="quick-links <?php print $padding ?>">
        <?php if ( !empty( $large_title ) ) { ?><div class="quick-links-title"><?php print '<' . $title_element . '>' . $large_title . '</' . $title_element . '>'; ?></div><?php } ?>
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

