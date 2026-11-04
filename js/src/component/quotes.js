// tab controls
jQuery(document).ready(function($) {

    if ($('.quotes-container').length) {

        $('.quotes-container').each(function() {
            var $quotes = $(this);
            var $quotes_inner = $quotes.find('.quotes-inner');
            var $nav_prev = $quotes.find('.nav-prev');
            var $nav_next = $quotes.find('.nav-next');

            var show_hide_controls = function() {
                var num_quotes = $quotes_inner.find('.quote').length;
                var quote_size = $quotes_inner.find('.quote').width() + parseFloat($quotes_inner.find('.quote').css('margin-right'));
                var total_quote_width = quote_size * num_quotes
                if (total_quote_width < $(window).width()) {
                    $nav_prev.hide();
                    $nav_next.hide();
                } else {
                    $nav_prev.show();
                    $nav_next.show();
                }
            }

            $nav_prev.on('click', function() {

                if (!$(this).hasClass('disable')) {

                    // get some info
                    var num_quotes = $quotes_inner.find('.quote').length;
                    var quote_size = $quotes_inner.find('.quote').width() + parseFloat($quotes_inner.find('.quote').css('margin-right'));

                    // total max story size, with modifier taken into account
                    var quotes_total_width = num_quotes * quote_size;

                    // calculate positions
                    var position_current = parseFloat($quotes_inner.css('margin-left'));
                    var position_new = position_current + quote_size;
                    var position_max = quotes_total_width - quote_size;

                    if (position_new == 0) {
                        $(this).addClass('disable');
                    } else {
                        $(this).removeClass('disable');
                    }

                    if (position_new < position_max) {
                        $nav_next.removeClass('disable');
                    }

                    $quotes_inner.css('margin-left', position_new + 'px');
                }
            });

            $nav_next.on('click', function() {

                if (!$(this).hasClass('disable')) {

                    // window width 
                    var window_width = $(window).width();

                    // get some info
                    var quote_size = $quotes_inner.find('.quote').width() + parseFloat($quotes_inner.find('.quote').css('margin-right'));
                    var quote_limit_modifier = Math.floor(window_width / quote_size);
                    var num_quotes = $quotes_inner.find('.quote').length - quote_limit_modifier;
                    // console.log(num_quotes);

                    // total max story size, with modifier taken into account
                    var quotes_total_width = num_quotes * quote_size;

                    // calculate positions
                    var position_current = parseFloat($quotes_inner.css('margin-left'));
                    var position_new = position_current - quote_size;
                    var position_max = -(quotes_total_width);

                    //console.log(position_current + ' ' + position_new + ' ' + position_max);

                    if (position_new == position_max) {
                        $(this).addClass('disable');
                    } else {
                        $(this).removeClass('disable');
                    }

                    if (position_new < 0) {
                        $nav_prev.removeClass('disable');
                    }

                    $quotes_inner.css('margin-left', position_new + 'px');
                }
            });

            $(window).resize(function() {
                $quotes_inner.css('margin-left', 0);
                show_hide_controls();
            });

            show_hide_controls();

        });

    }

});