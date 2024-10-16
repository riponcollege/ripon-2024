<?php 

$color = get_sub_field( 'color' );
$padding = get_sub_field( 'padding' );

if ( have_rows( 'facts' ) || have_rows( 'column' ) ) : ?>
<div class="facts-container ">
    <div class="facts <?php print $padding . ' ' . $color ?>">
    <?php
    if ( have_rows( 'facts' ) ): ?>
        <div class="facts-inner">
        <?php while ( have_rows( 'facts' ) ) : the_row();

            $highlight = get_sub_field('highlight');
            $label = get_sub_field('label');
            $description = get_sub_field('description');
            ?>
            <div class="fact">
                <h3><span><?php print $highlight ?></span> <?php print $label ?></h3>
                <p class="description"><?php print $description ?></p>
            </div>
            <?php
            $num++;

        endwhile; ?>
        </div>
        <?php
    endif;
    ?>
    <?php
    if ( have_rows( 'column' ) ): ?>
        <div class="data-points">
        <?php while ( have_rows( 'column' ) ) : the_row();

            $title = get_sub_field('title');
            ?>
            <div class="points">
                <h5><?php print $title ?></h5>
                <ul>
                <?php 
                if ( have_rows( 'datapoints' ) ): 
                    while ( have_rows( 'datapoints' ) ) : the_row();
                        print "<li>" . get_sub_field( 'point' ) . "</li>";
                    endwhile;
                endif;
                ?></ul>
            </div>
            <?php
            $num++;

        endwhile; ?>
        </div>
    <?php endif; ?>
    </div>
</div>
<?php
endif;

