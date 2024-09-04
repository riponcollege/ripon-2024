<?php
    
$title = get_sub_field( 'title' );

if ( have_rows('quotes') ): 
    ?>
<div class="quotes-container">
    <div class="quotes">
        <div class="quotes-inner">
        <?php
        // loop through the rows of data
        $num = 1;
        while ( have_rows( 'quotes' ) ) : the_row();

            $content = get_sub_field('content');
            $citation = get_sub_field('citation');
            $subtitle = get_sub_field('subtitle');
            ?>
            <div class="quote">
                <div class="quote-bubble">
                    <?php print wpautop( $content ); ?>
                </div>
                <h4><?php print $citation ?></h4>
                <p class="subtitle"><?php print $subtitle ?></p>
            </div>
            <?php
            $num++;

        endwhile;
        ?>
        </div>
    </div>
</div>
<?php
endif;

