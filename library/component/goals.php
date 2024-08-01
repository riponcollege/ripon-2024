<?php

load_section_title();

$goal_name = get_sub_field( 'goal-name' );
$color = get_sub_field( 'color' );

if ( !empty( $goal_name ) ): 
    ?>
<div class="goals-container <?php print $color ?>">

    <?php include( 'section-title.php' ); ?>

        <div class="pie animate no-round" style="--p:80;--c:#97303d;">80%</div>

        <div class="goals-subgoals">
        <?php
        // loop through the rows of data
        $num = 1;
        while ( have_rows( 'goal-bars' ) ) : the_row();

            $icon = get_sub_field('icon');
            $stat_number = get_sub_field('stat-number');
            $subtitle = get_sub_field('subtitle');
            ?>
            <div class="goal">
                <h3><?php print $stat_number ?></h3>
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

