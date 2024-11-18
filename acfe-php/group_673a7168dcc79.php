<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_673a7168dcc79',
	'title' => 'Snippet Fields',
	'fields' => array(
		array(
			'key' => 'field_673a7168fa84c',
			'label' => 'Mode',
			'name' => 'mode',
			'aria-label' => '',
			'type' => 'radio',
			'instructions' => 'Choose the mode for this snippet. \'Code\' style snippets preserve all the special formatting and characters that are necessary for code to work correctly (no encoding), where the visual editor will give you a more traditional editing experience for bits of content that you just want to be able to include in multiple places. Beware when switching between the two modes on existing snippets (save first).',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '20',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'visual' => 'Visual Editor',
				'code' => 'Code Editor',
			),
			'default_value' => 'visual',
			'return_format' => 'value',
			'allow_null' => 0,
			'other_choice' => 0,
			'allow_in_bindings' => 0,
			'layout' => 'vertical',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_673a7203fa84d',
			'label' => 'Content',
			'name' => 'content',
			'aria-label' => '',
			'type' => 'acfe_code_editor',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_673a7168fa84c',
						'operator' => '==',
						'value' => 'code',
					),
				),
			),
			'wrapper' => array(
				'width' => '80',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'mode' => 'text/html',
			'lines' => 1,
			'indent_unit' => 4,
			'maxlength' => '',
			'rows' => 20,
			'max_rows' => '',
			'return_format' => array(
			),
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_673a7218fa84e',
			'label' => 'Content',
			'name' => 'content',
			'aria-label' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_673a7168fa84c',
						'operator' => '==',
						'value' => 'visual',
					),
				),
			),
			'wrapper' => array(
				'width' => '80',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'allow_in_bindings' => 0,
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
				'value' => 'snippet',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
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
	'modified' => 1731884705,
));

endif;