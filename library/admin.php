<?php

// set wysiwyg editors to min height instead of fixed.
add_action('admin_head', 'admin_styles');
function admin_styles() {
	?>
	<style>
		iframe[id^='wysiwyg-acf-field'] {
			min-height:40px;
		}
	</style>
	<?php
}

