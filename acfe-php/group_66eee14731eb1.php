<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_66eee14731eb1',
	'title' => 'Event Details',
	'fields' => array(
		array(
			'key' => 'field_66eee39913933',
			'label' => 'All Day Event',
			'name' => '_p_event_all_day',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '20',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'allow_in_bindings' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'ui' => 1,
		),
		array(
			'key' => 'field_66eee1470793d',
			'label' => 'Start',
			'name' => '_p_event_start',
			'aria-label' => '',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '40',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'F j, Y g:i a',
			'return_format' => 'm/d/Y g:i a',
			'first_day' => 0,
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_66eee25c9bbab',
			'label' => 'Ends',
			'name' => '_p_event_end',
			'aria-label' => '',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_66eee39913933',
						'operator' => '!=',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '40',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'F j, Y g:i a',
			'return_format' => 'm/d/Y g:i a',
			'first_day' => 1,
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_66eee3ba13934',
			'label' => 'Location Description',
			'name' => '_p_event_location',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_66eee3cb13935',
			'label' => 'Event Website',
			'name' => '_p_event_website',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'event',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1731518467,
));

endif;