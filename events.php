<?php
/**
 * Template Name: Events Calendar
 */

check_events_url();

get_header(); 

get_components();

?>	
	<div id="content" class="wrap content-wide" role="main">
		<?php

		// output month
		show_month_events( $event_mo, $event_yr, $event_cat );

		?>
	</div><!-- #content -->

<?php

get_footer();

