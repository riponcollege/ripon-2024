// tab controls
jQuery(document).ready(function($) {

    if ($('.area-filters').length) {
        var filters = $('.area-filters');
        var listing = $('.area-listing');
        var entries = listing.find('.area-entry');
        filters.find('a.btn').click(function() {
            var clicked = String($(this).data('cat'));
            $('.area-filters a.current').removeClass('current');
            $(this).addClass('current');
            entries.each(function() {
                let entry_cats = String($(this).data('cat')).split(' ');
                if ($.inArray(clicked, entry_cats) !== -1) {
                    $(this).parent('a').removeClass('hidden');
                } else if (clicked == 'all') {
                    $(this).parent('a').removeClass('hidden');
                } else {
                    $(this).parent('a').addClass('hidden');
                }
            });
        });

    }

});