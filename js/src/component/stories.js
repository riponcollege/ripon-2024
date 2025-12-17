

// tab controls
jQuery(document).ready(function($){

	if ( $( '.stories-container' ).length ) {

        $( '.stories-container' ).each(function(){
            var $stories = $(this);
            var $stories_inner = $stories.find( '.stories-inner' );
            var $nav_prev = $stories.find( '.nav-prev' );
            var $nav_next = $stories.find( '.nav-next' );

            $nav_prev.on( 'click', function(){

                if ( !$( this ).hasClass('disable') ) {
                    // get some info
                    var num_stories = $stories_inner.find( '.story' ).length;
                    var story_size = $stories_inner.find( '.story' ).width() + parseFloat( $stories_inner.find( '.story' ).css( 'margin-right' ) );
                    var stories_total_width = num_stories * story_size;

                    // calculate positions
                    var position_current = parseFloat( $stories_inner.css( 'margin-left' ) );
                    var position_new = position_current + story_size;
                    var position_max = stories_total_width - story_size;

                    if ( position_new == 0 ) {
                        $( this ).addClass( 'disable' );
                    } else {
                        $( this ).removeClass( 'disable' );
                    }

                    if ( position_new < position_max ) {
                        $nav_next.removeClass( 'disable' );
                    }
 
                    $stories_inner.css( 'margin-left', position_new +'px' );
                }
            });

            $nav_next.on( 'click', function(){

                if ( !$( this ).hasClass('disable') ) {
                    // get some info
                    var num_stories = $stories_inner.find( '.story' ).length;
                    var story_size = $stories_inner.find( '.story' ).width() + parseFloat( $stories_inner.find( '.story' ).css( 'margin-right' ) );
                    var stories_total_width = num_stories * story_size;

                    // calculate positions
                    var position_current = parseFloat( $stories_inner.css( 'margin-left' ) );
                    var position_new = position_current - story_size;
                    var position_max = stories_total_width - story_size;

                    if ( position_new == -(position_max) ) {
                        $( this ).addClass( 'disable' );
                    } else {
                        $( this ).removeClass( 'disable' );
                    }

                    if ( position_new < 0 ) {
                        $nav_prev.removeClass( 'disable' );
                    }
 
                    $stories_inner.css( 'margin-left', position_new +'px' );
                }
            });

            $(window).resize(function(){
                $stories_inner.css( 'margin-left', 0 );
            });
        });

	}

});

