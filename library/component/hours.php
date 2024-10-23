<?php

$hours_title = get_sub_field( 'hours-title' );
$contact_title = get_sub_field( 'contact-title' );

?>
<div class="hours-contact-container">
<?php
if ( have_rows( 'hours' ) ) : ?>
    <div class="hours-container">
        <div class="hours-title"><h3><?php print $hours_title ?></h3></div>
        <div class="hours">
            <?php while ( have_rows( 'hours' ) ) : the_row(); ?>
            <div class="hours-item">
                <p><strong><?php print get_sub_field( 'label' ); ?></strong><br>
                <?php print get_sub_field( 'value' ); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php
endif;

if ( have_rows( 'contact' ) ) : ?>
    <div class="contact-container">
        <div class="contact-inner">
            <div class="contact-title"><h3><?php print $contact_title ?></h3></div>
            <div class="contacts">
                <?php while ( have_rows( 'contact' ) ) : the_row(); ?>
                <div class="contact-item">
                    <p><strong><?php print get_sub_field( 'label' ); ?></strong><br>
                    <?php print get_sub_field( 'value' ); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="contact-social">
            <?php while ( have_rows( 'social' ) ) : the_row(); ?>
            <a href="<?php print get_sub_field( 'link' ); ?>"><img src="<?php print get_bloginfo( 'template_url') . '/img/social/' . get_sub_field( 'network' ); ?>.svg" /></a>
            <?php endwhile; ?>
        </div>
    </div>
    <?php
endif;
?>
</div>