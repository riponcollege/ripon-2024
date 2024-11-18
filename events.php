<?php
/**
 * Template Name: Events Calendar
 */

get_header(); 

check_events_url();

get_components();

?>
	<div class="title-container red">
		<div class="wrap">
			<div class="title">
				<h1>Events</h1>
			</div>
		</div>
	</div>
	
	<div id="content" class="wrap content-wide" role="main">
		<?php

		// output month
		show_month_events( $event_mo, $event_yr, $event_cat );

		?>
	</div><!-- #content -->

<?php

get_footer();

