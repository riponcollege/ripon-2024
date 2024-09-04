<?php

// add a wysiwyg 'short' class
add_action('admin_head', 'acf_wysiwyg_short');
function acf_wysiwyg_short() {
	?>
	<style>
    .short .acf-editor-wrap iframe {			
        height: 170px !important;
    }
    .short .mce-statusbar {
        display: none;
    }
	</style>
	<?php
}

