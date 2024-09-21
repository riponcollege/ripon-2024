

// onload
jQuery(document).ready(function($){

	// grab the showcase
	$( '.slides' ).each(function(){
		var showcase = $( this );

		// set auto-rotate timer var so that it exists.
		var auto_rotate = 0;

		// get the slides
		var slides = showcase.find('.slide');

		// count the slides
		var slide_count = slides.size();

		// if the screen is the wider than 768
		if ( $(window).innerWidth() >= 768 ) {

			// loop through the slides and set the top margins if the screen is larger than 768px wide.
			slides.each(function(){

				// select the slide content div
				var slide_content = $(this).find('.slide-content');

				// find the top padding so we can account for it in our margin calculation
				// var slide_content_padding = slide_content.css( 'padding-top' ).replace('px','');

				// calculate the top margin on the slide content container so it's centered vertically
				// var slide_content_target_margin = -( slide_content.height() / 2 ) - slide_content_padding ;

				// apply our top margins
				// slide_content.css( 'margin-top', slide_content_target_margin );

			});
		}

		// if it exists
		if ( typeof( showcase ) !== 'undefined' ) {

			// grab the first slide
			var first_slide = slides.first();
			first_slide.addClass('visible');

			// grab the last slide
			var last_slide = slides.last();


			// function to switch to the previous slide
			var prev_slide = function() {

				// get current and next slide objects
				var current_slide = get_current_slide();
				var prev_slide = current_slide.prev(".slide");

				// if next slide doesn't exist, go back to the first
				if ( !prev_slide.length ) {
					prev_slide = last_slide;
				}

				// switch the slides
				current_slide.removeClass( 'visible' );
				prev_slide.addClass( 'visible' );

			};
			

			// function to switch to the next side.
			var next_slide = function() {

				// get current and next slide objects
				var current_slide = get_current_slide();
				var next_slide = current_slide.next( '.slide' );

				// if next slide doesn't exist, go back to the first
				if ( !next_slide.length ) {
					next_slide = first_slide;
				}

				// switch the slides
				current_slide.removeClass( 'visible' );
				next_slide.addClass( 'visible' );
			};


			// grab the current slide
			var get_current_slide = function(){
				return showcase.find( '.slide.visible' );
			};


			// set showcase initial height when the first image is loaded.
			setTimeout( function() {
				// once we're loaded up, set a timer to auto-rotate the slides.
				if ( slide_count > 1 ) {
					auto_rotate = setInterval( next_slide, 10000 );
				}
			}, 500 );


			// next/previous click
			showcase.find( '.slides-nav a' ).click(function(){
				if ( $(this).hasClass( 'previous' ) ) {
					prev_slide();
				} else {
					next_slide();
				}

				// stop auto-rotation
				if ( slide_count > 1 ) {
					clearInterval( auto_rotate );
				}
			});

		}

	});


	// 
	$('.slide').on('click', function(){

		if ( $(this).data('href') ) {
			var link = $(this).data('href');
			var cl = $(this).attr( 'class' );
			console.log( cl );

			if ( link.match( /youtube.com/g ) || link.match( /youtu.be/g ) || link.match( /vimeo.com/g ) || cl.match( /iframe/g ) ) {
				$.magnificPopup.open({
					items: {
						src: link
					},
					type: 'iframe'

					// You may add options here, they're exactly the same as for $.fn.magnificPopup call
					// Note that some settings that rely on click event (like disableOn or midClick) will not work here
				}, 0);
			} else {
				location.href = $(this).data('href');
			}
		}

	});

});

