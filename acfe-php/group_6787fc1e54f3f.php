<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6787fc1e54f3f',
	'title' => 'Module: Posts',
	'fields' => array(
		array(
			'key' => 'field_6787fd4a84d01',
			'label' => '(Column 3/12)',
			'name' => '',
			'aria-label' => '',
			'type' => 'acfe_column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'columns' => '3/12',
			'endpoint' => 0,
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_6787fd9a84d06',
			'label' => 'Filtering Mode',
			'name' => 'mode',
			'aria-label' => '',
			'type' => 'radio',
			'instructions' => 'Select the filtering mode - choose to display all posts from all categories or select specific categories.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'all' => 'All Posts',
				'filtered' => 'Filtered',
			),
			'default_value' => 'all',
			'return_format' => 'value',
			'allow_null' => 0,
			'other_choice' => 0,
			'allow_in_bindings' => 0,
			'layout' => 'horizontal',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_6787fc5320158',
			'label' => 'Number of Posts',
			'name' => 'posts_per_page',
			'aria-label' => '',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '60',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'min' => '',
			'max' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'step' => 1,
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6787fd6884d03',
			'label' => '(Column 3/12)',
			'name' => '',
			'aria-label' => '',
			'type' => 'acfe_column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'columns' => '3/12',
			'endpoint' => 0,
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_6787fc78ed3e6',
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
				'white' => 'White',
				'tan' => 'Tan',
			),
			'default_value' => 'white',
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'allow_in_bindings' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'allow_custom' => 0,
			'search_placeholder' => '',
		),
		array(
			'key' => 'field_6787fd8b84d05',
			'label' => 'Padding',
			'name' => 'padding',
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
				'pad-normal' => 'Normal',
				'pad-side' => 'Side Padding Only',
				'pad-tall' => 'Tall',
			),
			'default_value' => 'pad-normal',
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'allow_in_bindings' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'allow_custom' => 0,
			'search_placeholder' => '',
		),
		array(
			'key' => 'field_6787fd6e84d04',
			'label' => '(Column 6/12)',
			'name' => '',
			'aria-label' => '',
			'type' => 'acfe_column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'columns' => '6/12',
			'endpoint' => 0,
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_6787fc1eabce0',
			'label' => 'Category',
			'name' => 'category',
			'aria-label' => '',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_6787fd9a84d06',
						'operator' => '==',
						'value' => 'filtered',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'category',
			'add_term' => 1,
			'save_terms' => 0,
			'load_terms' => 0,
			'return_format' => 'id',
			'field_type' => 'checkbox',
			'acfe_bidirectional' => array(
				'acfe_bidirectional_enabled' => '0',
			),
			'allow_in_bindings' => 1,
			'bidirectional' => 0,
			'multiple' => 0,
			'allow_null' => 0,
			'bidirectional_target' => array(
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
	'modified' => 1736965940,
));

endif;