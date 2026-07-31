<?php


function pure_editor_format_dropdown( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'pure_editor_format_dropdown' );



/*
* Callback function to filter the MCE settings
*/
 
function pure_insert_formats( $init_array ) {  
  
    $style_formats = array(  
        array(  
            'title' => 'h1',  
            'block' => 'span',  
            'classes' => 'h1',
            'wrapper' => true,
        ),
        array(  
            'title' => 'h2',  
            'block' => 'span',  
            'classes' => 'h2',
            'wrapper' => true,
        ),
        array(  
            'title' => 'h3',  
            'block' => 'span',  
            'classes' => 'h3',
            'wrapper' => true,
        ),
        array(  
            'title' => 'h4',  
            'block' => 'span',  
            'classes' => 'h4',
            'wrapper' => true,
        ),
        array(  
            'title' => 'h5',  
            'block' => 'span',  
            'classes' => 'h5',
            'wrapper' => true,
        )
    );


    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'pure_insert_formats' );



function pure_editor_styles() {
    add_editor_style( 'css/editor.css' );
}
add_action( 'init', 'pure_editor_styles' );


