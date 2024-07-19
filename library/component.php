<?php

function get_components() {

    // if we have components for this page
    if( have_rows('components') ):
        
        // loop through the components
        while ( have_rows('components') ) : the_row();

            // layout switch
            if ( get_row_layout() == 'hero' ):
                include 'component/hero.php';

            elseif ( get_row_layout() == 'title' ): 
                include 'component/title.php';

            elseif ( get_row_layout() == 'slides' ): 
                include 'component/slides.php';

            elseif ( get_row_layout() == 'content-one' ): 
                include 'component/content-one.php';

            elseif ( get_row_layout() == 'content-two' ): 
                include 'component/content-two.php';                                               

            elseif ( get_row_layout() == 'stats' ): 
                include 'component/stats.php';

            elseif ( get_row_layout() == 'quick-links' ): 
                include 'component/quick-links.php';
            
            elseif ( get_row_layout() == 'quotes' ): 
                include 'component/quotes.php';
            
            elseif ( get_row_layout() == 'quote-large' ): 
                include 'component/quote-large.php';

            endif;

        // End loop.
        endwhile;

    endif;

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

