<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_669a7fb78dd6b',
	'title' => 'Module: Hero',
	'fields' => array(
		array(
			'key' => 'field_669a7fb913347',
			'label' => 'Photo',
			'name' => 'photo',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '90',
				'class' => '',
				'id' => '',
			),
			'uploader' => '',
			'return_format' => 'url',
			'library' => 'all',
			'acfe_thumbnail' => 0,
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'preview_size' => 'full',
		),
		array(
			'key' => 'field_66a1515db60db',
			'label' => 'Add Content',
			'name' => 'add-content',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '10',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'ui' => 1,
		),
		array(
			'key' => 'field_66a1516cb60dc',
			'label' => 'Content',
			'name' => 'content',
			'aria-label' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_66a1515db60db',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
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
	'modified' => 1721848226,
));

endif;