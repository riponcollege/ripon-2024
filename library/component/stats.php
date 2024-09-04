<?php

load_section_title();

?>
<div class="stats-container">
    <?php
    if ( have_rows('statistics') ):  ?>
        <div class="statistics"><?php
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

        endwhile; ?>
        </div>
        <?php
    endif;
    ?>
</div>
<?php

