<?php

function get_components() {

    // if we have components for this page
    if( have_rows('components') ):
        
        // loop through the components
        while ( have_rows('components') ) : the_row();

            // include the specific layout
            get_template_part( 'library/component/' . get_row_layout() );

        endwhile;

    endif;

}



function load_section_title() {
    global $supertitle, $title, $intro;
    $supertitle = get_sub_field( 'supertitle' );
    $title = get_sub_field( 'title' );
    $intro = get_sub_field( 'intro' );
}



// Dynamically populate select field with menu items when it has the name 'nav-menu'
// @link https://www.advancedcustomfields.com/resources/acf-load_field/
// @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
add_filter( 'acf/load_field/name=nav-menu', 'nav_menus_load' );
function nav_menus_load( $field ) {
    $menus = wp_get_nav_menus();
    $field['choices'][0] = '- no menu -';
    if ( ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            $field['choices'][ $menu->slug ] = $menu->name;
        }
    }
    return $field;
}



