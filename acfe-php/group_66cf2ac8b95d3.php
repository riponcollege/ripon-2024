<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_66cf2ac8b95d3',
	'title' => 'Area of Study Details',
	'fields' => array(
		array(
			'key' => 'field_66cf2ac88e002',
			'label' => 'Overview Video',
			'name' => '_p_area_sidebar_video',
			'aria-label' => '',
			'type' => 'oembed',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		),
		array(
			'key' => 'field_66cf2b53fa078',
			'label' => 'Overview Document',
			'name' => '',
			'aria-label' => '',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'uploader' => '',
			'return_format' => 'array',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
			'library' => 'all',
		),
		array(
			'key' => 'field_66cf2b3cfa077',
			'label' => 'Mission Statement',
			'name' => '_p_area_mission',
			'aria-label' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
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
		array(
			'key' => 'field_66cf2b87fa079',
			'label' => 'Faculty Group',
			'name' => 'faculty',
			'aria-label' => '',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'people_cat',
			'add_term' => 0,
			'save_terms' => 0,
			'load_terms' => 0,
			'return_format' => 'id',
			'field_type' => 'select',
			'allow_null' => 0,
			'acfe_bidirectional' => array(
				'acfe_bidirectional_enabled' => '0',
			),
			'bidirectional' => 0,
			'multiple' => 0,
			'bidirectional_target' => array(
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'area',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => array(
		0 => 'block_editor',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'discussion',
		4 => 'comments',
		5 => 'revisions',
		6 => 'author',
		7 => 'format',
		8 => 'page_attributes',
		9 => 'categories',
		10 => 'tags',
		11 => 'send-trackbacks',
	),
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
	'modified' => 1729099502,
));

endif;