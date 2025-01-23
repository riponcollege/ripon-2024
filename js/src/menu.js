

// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// show/hide menus when they click the toggler
	var header = $( 'header' );
	var menu_toggle = header.find( 'a.menu-toggle' );
	var menu = header.find( 'nav.main' );
	var header_search = header.find( '.search' );
	menu_toggle.click(function(){

		// if the menu is visible, hide it, 
		if ( menu.is( ':visible' ) ) {
			menu.hide();
			header_search.hide();
		} else {
			menu.show();
			header_search.show();
		}

		// when user clicks a link in the menu, open submenu if it exists.
		menu.find( 'a' ).click(function(){
			var parent_li = $( this ).parent( 'li' );
			var submenu = $( this ).next( '.submenu' );
			if ( !submenu.is( ':visible' ) && !parent_li.hasClass('no-submenu') ) {
				event.preventDefault();
				parent_li.addClass( 'open' );
			}
		});

	});

	// quicknav functionality
	$('select.quick-nav').on( 'change', function(){
		if ( $(this).val() != '' ) {
			location.href = $(this).val();
		}
	});
	
});

