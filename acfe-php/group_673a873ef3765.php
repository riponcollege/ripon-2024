<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_673a873ef3765',
	'title' => 'Basic Module: Snippet',
	'fields' => array(
		array(
			'key' => 'field_673a873fcb8e4',
			'label' => 'Snippet',
			'name' => 'snippet',
			'aria-label' => '',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'snippet',
			),
			'post_status' => '',
			'taxonomy' => '',
			'return_format' => 'object',
			'multiple' => 0,
			'save_custom' => 0,
			'save_post_status' => 'publish',
			'acfe_bidirectional' => array(
				'acfe_bidirectional_enabled' => '0',
			),
			'allow_null' => 0,
			'allow_in_bindings' => 0,
			'bidirectional' => 0,
			'ui' => 1,
			'bidirectional_target' => array(
			),
			'save_post_type' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => false,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1731889006,
));

endif;