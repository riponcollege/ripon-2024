

// onload
jQuery(document).ready(function($){

    $('.guide-menu li').on( 'click', function(){

        // remove highlight from menu item, and hide visible guide.
        $( '.guide-menu li.current' ).removeClass( 'current' );
        $( '.guide-entry.visible' ).removeClass( 'visible' );
        
        // show selected item, and highlight menu item
        $(this).addClass('current');
        $( '.guide-entry.guide-'+$(this).data( 'id' ) ).addClass( 'visible' );
        
    });

});

