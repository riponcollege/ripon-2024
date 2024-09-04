<?php

load_section_title();

$goal_name = get_sub_field( 'goal-name' );
$color = get_sub_field( 'color' );

if ( !empty( $goal_name ) ): 
    ?>
<div class="goals-container <?php print $color ?>">

    <?php include( 'section-title.php' ); ?>
    
    <div class="goals">
        <div class="goal-main">
            <?php
            
            ?>
            <div class="pie animate no-round" style="--p:80;--c:#97303d;"><h2>80%</h2><h5>$65 of $75 million</h5></div>
        </div>
        <div class="goals-minor">
        <?php
        // loop through the rows of data
        if ( have_rows( 'minor_goals' ) ) :
            while ( have_rows( 'minor_goals' ) ) : the_row();

                $goal_name = get_sub_field('goal-name');
                $currency = get_sub_field('currency');
                $raised = get_sub_field('raised');
                $goal = get_sub_field('goal');
                $goal_unit = get_sub_field('goal-unit');

                $goal_percent = floor( ( $raised / $goal ) * 100 );
                ?>
            <div class="goal">
                <div class="info"><strong><?php print $goal_name ?></strong> | <?php print ( $currency ? "$" : '' ) . $goal . ' ' . $goal_unit ?></div>
                <div class="bar-container">
                    <div class="bar" style="width: <?php print $goal_percent; ?>%;"></div>
                    <div class="number"><?php print $goal_percent; ?>%</div>
                </div>
            </div>
                <?php

            endwhile;
        endif
        ?>
        </div>
    </div>

</div>
<?php
endif;

