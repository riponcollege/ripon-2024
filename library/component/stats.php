<?php
    
$supertitle = get_sub_field( 'supertitle' );
$title = get_sub_field( 'title' );
$intro = get_sub_field( 'intro' );

if ( have_rows('statistics') ): 
    ?>
<div class="stats-container">
    <div class="wrap">
        <div class="stats-title-container">
        <?php if ( !empty( $title ) ) { ?>
            <div class="stats-title">
                <?php if ( !empty( $supertitle ) ) { ?><p class="supertitle"><?php print $supertitle; ?></p><?php } ?>
                <h2><?php print $title ?></h2>
            </div>
            <div class="stats-intro">
                <?php print $intro; ?>
            </div>
        </div>
        <?php } ?>
        <div class="statistics">
        <?php
        // loop through the rows of data
        $num = 1;
        while ( have_rows( 'statistics' ) ) : the_row();

            $icon = get_sub_field('icon');
            $stat_number = get_sub_field('stat-number');
            $subtitle = get_sub_field('subtitle');
            ?>
            <div class="stat">
                <div class="stat-icon">
                    <img src="<?php print $icon; ?>" />
                </div>
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

