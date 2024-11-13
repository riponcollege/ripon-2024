<?php

load_section_title();

$goal_name = get_sub_field( 'goal-name' );
$is_currency = get_sub_field( 'currency' );
$raised = get_sub_field( 'raised' );
$goal = get_sub_field( 'goal' );
$color = get_sub_field( 'color' );

// set symbol to precede numbers
$currency = '';
if ( $is_currency ) {
    $currency = "$";
}

// get a pretty number from the raised and total amounts
$raised_pretty = floor( ( $raised / $goal ) * 100 );

// if we have goal name set
if ( !empty( $goal_name ) ): 
    ?>
<div class="goals-container <?php print $color ?>">

    <?php include( 'section-title.php' ); ?>
    
    <div class="goals">
        <div class="goal-main">
            <?php
            
            ?>
            <div class="pie animate no-round" style="--p:<?php print $raised_pretty; ?>;--c:#a10833;"><h2><?php print $raised_pretty; ?>%</h2><h5><?php print $currency . $raised ?> of <?php print $currency . $goal ?> million</h5></div>
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

