<?php

$title = get_sub_field( 'title' );
$columns = get_sub_field( 'columns' );

if ( have_rows( 'row' ) ) :
    ?>
    <div class="table">
        <table cellspacing=0 cellpadding=0>
    <?php
    if ( !empty( $title ) ) {
        ?>
            <tr>
                <th colspan="<?php print $columns ?>"><?php print $title; ?></th>
            </tr>
        <?php
    }

    while ( have_rows( 'row' ) ) : the_row();
        ?>
            <tr>
                <td class="label"><?php the_sub_field( 'label' ); ?></td>
                <td><?php the_sub_field( 'two' ); ?></td>
                <?php if ( $columns >= 3 ) : ?><td><?php the_sub_field( 'three' ); ?></td><?php endif; ?>
                <?php if ( $columns == 4 ) : ?><td><?php the_sub_field( 'four' ); ?></td><?php endif; ?>
            </tr>
        <?php
    endwhile;
    ?>
        </table>
    </div>
    <?php
endif;


