<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_664e26e56d06e',
	'title' => 'Components',
	'fields' => array(
		array(
			'key' => 'field_664e26e508e2c',
			'label' => 'Components',
			'name' => 'components',
			'aria-label' => '',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_flexible_advanced' => 0,
			'layouts' => array(
				'layout_6654e4ecb284d' => array(
					'key' => 'layout_6654e4ecb284d',
					'name' => 'hero',
					'label' => 'Hero',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_6654e501b284f',
							'label' => 'Module: Hero',
							'name' => 'module-hero',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_669a7fb78dd6b',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_6654f7dba7540' => array(
					'key' => 'layout_6654f7dba7540',
					'name' => 'title',
					'label' => 'Title',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_6654f7eb1c86a',
							'label' => 'Title',
							'name' => 'title',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '60',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
						),
						array(
							'key' => 'field_6654fcbc9e650',
							'label' => 'Theme',
							'name' => 'theme',
							'aria-label' => '',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '20',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'small' => 'Small',
								'large' => 'Large',
								'large-menu' => 'Large w/ Menu',
							),
							'default_value' => 'small',
							'return_format' => 'value',
							'multiple' => 0,
							'allow_null' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'allow_custom' => 0,
							'search_placeholder' => '',
						),
						array(
							'key' => 'field_6654f8031c86b',
							'label' => 'Color Scheme',
							'name' => 'color',
							'aria-label' => '',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '20',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'red' => 'Red',
								'tan' => 'Tan',
							),
							'default_value' => 'red',
							'return_format' => 'value',
							'multiple' => 0,
							'allow_null' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'allow_custom' => 0,
							'search_placeholder' => '',
						),
						array(
							'key' => 'field_6685474034259',
							'label' => 'Section Menu',
							'name' => 'nav-menu',
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
								0 => '- no menu -',
								'footer-faculty' => 'Footer - Faculty',
								'footer-overview' => 'Footer - Overview',
								'footer-students' => 'Footer - Students',
								'header-main' => 'Header - Main',
							),
							'default_value' => false,
							'return_format' => 'value',
							'multiple' => 0,
							'allow_null' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'allow_custom' => 0,
							'search_placeholder' => '',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_664e27c208e2e' => array(
					'key' => 'layout_664e27c208e2e',
					'name' => 'content-one',
					'label' => 'Content (1-column)',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_6699b4c45c53c',
							'label' => 'Module: Content (1-column)',
							'name' => 'module-one-column',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_6699b1be5fe5e',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_665512f5602e4' => array(
					'key' => 'layout_665512f5602e4',
					'name' => 'content-two',
					'label' => 'Content (2-column)',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_6699b7f0293d4',
							'label' => 'Module: Content (2-column)',
							'name' => 'modules-two-column',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_6699ac4b2da9a',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_665512f6602eb' => array(
					'key' => 'layout_665512f6602eb',
					'name' => 'content-three',
					'label' => 'Content (3-column)',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_665512f6602ed',
							'label' => 'Color',
							'name' => 'color',
							'aria-label' => '',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'red' => 'Red',
								'white' => 'White',
								'tan' => 'Tan',
							),
							'default_value' => 'white',
							'return_format' => 'value',
							'multiple' => 0,
							'allow_null' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'allow_custom' => 0,
							'search_placeholder' => '',
						),
						array(
							'key' => 'field_665518ae4988c',
							'label' => 'Vertical Alignment',
							'name' => 'valign',
							'aria-label' => '',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'vtop' => 'Top',
								'vcenter' => 'Center',
							),
							'default_value' => 'vtop',
							'return_format' => 'value',
							'multiple' => 0,
							'allow_null' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'allow_custom' => 0,
							'search_placeholder' => '',
						),
						array(
							'key' => 'field_665512f6602ef',
							'label' => 'Content One',
							'name' => 'content-one',
							'aria-label' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33.3333',
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
							'key' => 'field_665512f6602f0',
							'label' => 'Content Two',
							'name' => 'content-two',
							'aria-label' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33.3333',
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
							'key' => 'field_665512f6602f1',
							'label' => 'Content Three',
							'name' => 'content-three',
							'aria-label' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '33.3333',
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
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_6655f259ff354' => array(
					'key' => 'layout_6655f259ff354',
					'name' => 'quick-links',
					'label' => 'Quick Links',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_665769647b64c',
							'label' => 'Title',
							'name' => 'quick-links-title',
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
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
						),
						array(
							'key' => 'field_6655f33aff35b',
							'label' => 'Rows',
							'name' => 'rows',
							'aria-label' => '',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'acfe_repeater_stylised_button' => 0,
							'layout' => 'block',
							'min' => 1,
							'max' => 0,
							'collapsed' => 'field_6655f278ff357',
							'button_label' => 'Add Row',
							'rows_per_page' => 20,
							'sub_fields' => array(
								array(
									'key' => 'field_6655f278ff357',
									'label' => 'Title',
									'name' => 'title',
									'aria-label' => '',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '40',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'maxlength' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'parent_repeater' => 'field_6655f33aff35b',
								),
								array(
									'key' => 'field_6655f2b1ff359',
									'label' => 'Link Text',
									'name' => 'link-text',
									'aria-label' => '',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '30',
										'class' => '',
										'id' => '',
									),
									'default_value' => 'Learn more',
									'maxlength' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'parent_repeater' => 'field_6655f33aff35b',
								),
								array(
									'key' => 'field_6655f2c3ff35a',
									'label' => 'Link URL',
									'name' => 'link',
									'aria-label' => '',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '30',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'maxlength' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'parent_repeater' => 'field_6655f33aff35b',
								),
								array(
									'key' => 'field_6655f264ff356',
									'label' => 'Photo',
									'name' => 'photo',
									'aria-label' => '',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '30',
										'class' => '',
										'id' => '',
									),
									'uploader' => '',
									'return_format' => 'url',
									'acfe_thumbnail' => 0,
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
									'preview_size' => 'medium',
									'library' => 'all',
									'parent_repeater' => 'field_6655f33aff35b',
								),
								array(
									'key' => 'field_6655f282ff358',
									'label' => 'Content',
									'name' => 'content',
									'aria-label' => '',
									'type' => 'textarea',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '70',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'acfe_textarea_code' => 0,
									'maxlength' => '',
									'rows' => 4,
									'placeholder' => '',
									'new_lines' => '',
									'parent_repeater' => 'field_6655f33aff35b',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_665dd2aadac54' => array(
					'key' => 'layout_665dd2aadac54',
					'name' => 'quotes',
					'label' => 'Quotes (Multiple)',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_665dd3b2dac56',
							'label' => 'Module: Quotes (Multiple)',
							'name' => 'module-quotes-multiple',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_669a831999312',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_6660b2886f8d0' => array(
					'key' => 'layout_6660b2886f8d0',
					'name' => 'quote-large',
					'label' => 'Quote (Large)',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_669a7edb9cf3f',
							'label' => 'Module: Quote (Large)',
							'name' => 'module-quote-large',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_669a7e1351987',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_667c260d434e1' => array(
					'key' => 'layout_667c260d434e1',
					'name' => 'stats',
					'label' => 'Statistics',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_667c2633434e7',
							'label' => 'Module: Statistics',
							'name' => 'module-statistics',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => 'Small title above the main title.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_669a810de362a',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
				'layout_669873dfebda6' => array(
					'key' => 'layout_669873dfebda6',
					'name' => 'tabs',
					'label' => 'Tabs',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_669873f8ebda8',
							'label' => 'Tab',
							'name' => 'tabs',
							'aria-label' => '',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'acfe_repeater_stylised_button' => 0,
							'layout' => 'block',
							'min' => 0,
							'max' => 0,
							'collapsed' => '',
							'button_label' => 'Add Content',
							'rows_per_page' => 20,
							'sub_fields' => array(
								array(
									'key' => 'field_66987476ebda9',
									'label' => 'Label',
									'name' => 'label',
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
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'parent_repeater' => 'field_669873f8ebda8',
								),
								array(
									'key' => 'field_66987489ebdaa',
									'label' => 'Tab Components',
									'name' => 'tab-components',
									'aria-label' => '',
									'type' => 'clone',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'clone' => array(
										0 => 'group_6699aa7cc9825',
									),
									'display' => 'seamless',
									'layout' => 'block',
									'prefix_label' => 0,
									'prefix_name' => 0,
									'acfe_seamless_style' => 0,
									'acfe_clone_modal' => 0,
									'acfe_clone_modal_close' => 0,
									'acfe_clone_modal_button' => '',
									'acfe_clone_modal_size' => 'large',
									'parent_repeater' => 'field_669873f8ebda8',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_thumbnail' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
				),
			),
			'min' => '',
			'max' => '',
			'button_label' => 'Add Component',
			'acfe_flexible_stylised_button' => false,
			'acfe_flexible_hide_empty_message' => false,
			'acfe_flexible_empty_message' => '',
			'acfe_flexible_layouts_templates' => false,
			'acfe_flexible_layouts_previews' => false,
			'acfe_flexible_layouts_placeholder' => false,
			'acfe_flexible_layouts_thumbnails' => false,
			'acfe_flexible_layouts_settings' => false,
			'acfe_flexible_async' => array(
			),
			'acfe_flexible_add_actions' => array(
			),
			'acfe_flexible_remove_button' => array(
			),
			'acfe_flexible_layouts_state' => false,
			'acfe_flexible_modal_edit' => array(
				'acfe_flexible_modal_edit_enabled' => false,
				'acfe_flexible_modal_edit_size' => 'large',
			),
			'acfe_flexible_modal' => array(
				'acfe_flexible_modal_enabled' => false,
				'acfe_flexible_modal_title' => false,
				'acfe_flexible_modal_size' => 'full',
				'acfe_flexible_modal_col' => '4',
				'acfe_flexible_modal_categories' => false,
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => array(
		0 => 'block_editor',
		1 => 'the_content',
	),
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
	'modified' => 1721402704,
));

endif;