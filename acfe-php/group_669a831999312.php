<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_669a831999312',
	'title' => 'Module: Quotes (Multiple)',
	'fields' => array(
		array(
			'key' => 'field_665dd3b2dac56',
			'label' => 'Title',
			'name' => 'title',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
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
			'key' => 'field_66e46f7d0bc7c',
			'label' => 'Color',
			'name' => 'color',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'tan' => 'Tan',
				'white' => 'White',
			),
			'default_value' => 'tan',
			'return_format' => 'value',
			'multiple' => 0,
			'allow_custom' => 0,
			'placeholder' => '',
			'search_placeholder' => '',
			'allow_null' => 0,
			'allow_in_bindings' => 0,
			'ui' => 0,
			'ajax' => 0,
		),
		array(
			'key' => 'field_665dd3bddac57',
			'label' => 'Quotes',
			'name' => 'quotes',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 0,
			'layout' => 'block',
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_665dd3c6dac58',
					'label' => 'Content',
					'name' => 'content',
					'aria-label' => '',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'acfe_textarea_code' => 0,
					'maxlength' => '',
					'rows' => 5,
					'placeholder' => '',
					'new_lines' => '',
					'parent_repeater' => 'field_665dd3bddac57',
				),
				array(
					'key' => 'field_665dd4093d2fc',
					'label' => 'Citation',
					'name' => 'citation',
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
					'placeholder' => 'Jane Doe',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_665dd3bddac57',
				),
				array(
					'key' => 'field_665dd4583d2fd',
					'label' => 'Citation Subtitle',
					'name' => 'subtitle',
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
					'placeholder' => 'Bachelors: Early Education',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_665dd3bddac57',
				),
			),
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
	'label_placement' => 'top',
	'instruction_placement' => 'field',
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
	'modified' => 1729099754,
));

endif;