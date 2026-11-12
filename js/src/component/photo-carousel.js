// onload
jQuery(document).ready(function($) {

    // grab the carousel
    $('.photo-carousel').each(function() {
        var carousel = $(this);
        var carousel_slides = carousel.find('.photo-carousel-slides');

        // set auto-rotate timer var so that it exists.
        var auto_rotate = 0;

        // get the slides
        var slides = carousel_slides.find('.photo');

        // count the slides
        var slide_count = slides.size();

        // if it exists
        if (typeof(carousel) !== 'undefined') {

            // grab the first slide
            var first_slide = slides.first();
            first_slide.addClass('visible');

            // grab the last slide
            var last_slide = slides.last();


            // function to switch to the previous slide
            var prev_slide = function() {

                // get current and next slide objects
                var current_slide = get_current_slide();
                var prev_slide = current_slide.prev(".photo");

                // if next slide doesn't exist, go back to the first
                if (!prev_slide.length) {
                    prev_slide = last_slide;
                }

                // switch the slides
                current_slide.removeClass('visible');
                prev_slide.addClass('visible');

            };


            // function to switch to the next side.
            var next_slide = function() {

                // get current and next slide objects
                var current_slide = get_current_slide();
                var next_slide = current_slide.next('.photo');

                // if next slide doesn't exist, go back to the first
                if (!next_slide.length) {
                    next_slide = first_slide;
                }

                // switch the slides
                current_slide.removeClass('visible');
                next_slide.addClass('visible');
            };


            // grab the current slide
            var get_current_slide = function() {
                return carousel.find('.photo.visible');
            };


            // set carousel initial height when the first image is loaded.
            setTimeout(function() {
                // once we're loaded up, set a timer to auto-rotate the slides.
                if (slide_count > 1) {
                    auto_rotate = setInterval(next_slide, 10000);
                }
            }, 500);


            // next/previous click
            carousel.find('a').click(function() {
                if ($(this).hasClass('prev')) {
                    prev_slide();
                } else {
                    next_slide();
                }

                // stop auto-rotation
                if (slide_count > 1) {
                    clearInterval(auto_rotate);
                }
            });

        }

    });

});