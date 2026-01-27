

jQuery.expr[':'].icontains = function(a, i, m) {
    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};
  
  
// onload responsive footer and menu stuff
jQuery(document).ready(function($){

    // if there's a people search field
    if ( $( '.people-search' ) ) {

        // when the search field is typed into
        $( '.people-search input[type=text]' ).on( 'keyup', function(){

            // make all people visible so we can search them
            $( '.person-entry').addClass('visible');

            // if the person doesn't contain the text, hide it.
            $( ".person-entry:not(:icontains('" + $(this).val() + "'))" ).removeClass('visible');
            
        });
    }

});
  
