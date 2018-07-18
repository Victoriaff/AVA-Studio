<?php

return array(
	'name'            => __( 'AVA Image', 'ava-studio' ),
	'base'            => 'ava_image',
	'content_element' => true,
	'category' => __( ava()->pluginName(), 'ava-studio' ),
	'params'          => array(

		/** Appearance */
		array(
			'type'          => 'ava_heading',
			'param_name'    => 'ava_heading',
			'_params' => array(
				'title'     => __( 'Border',  'ava-studio' ),
				'presets' => array(
					'preset' => 'border'
				)
			),
			'group'         => __( 'Appearance',  'ava-studio' ),
			'edit_field_class' => 'ava-param-wrapper ava-heading-wrapper',
		),
		/*
		array(
			'type'          => 'ava_subheading',
			'param_name'    => 'ava_subheading',
			'_params' => array(
				'title' => __( 'Border',  'ava-studio' ),
			),
			'group'         => __( 'Appearance', 'ava-studio' ),
			'edit_field_class' => 'ava-param-wrapper ava-subheading-wrapper',
		),
		*/

		// Border color tabs
		array(
			'type'          => 'ava_color_tabs',
			'class'         => '',
			'param_name'    => 'ava_bc_tabs',
			'value'         => '',
			'_params' => array(
				'title'     => __( 'Border Color',  'ava-studio' ),
				'presets' => array(
					'preset' => 'border'
				),
				'tabs' => array(
					'group' => 'ava_bc_group', // common class of items
					'items' => array(
						'ava_bc_all' => array(
							'title' => __( 'All', 'ava-studio' ),
							'class' => 'ava-tab-active'
						),
						'ava_bc_top' => array(
							'title' => __( 'Top', 'ava-studio' )
						),
						'ava_bc_right' => array(
							'title' => __( 'Right', 'ava-studio' )
						)
					)
				)
			),
			'group'         => __( 'Appearance',  'ava-studio' ),
			'edit_field_class' => 'ava-param-wrapper ava-tabs-wrapper',

		),
		array(
			'type'          => 'colorpicker',
			'heading'       => __( 'All borders', 'ava-studio' ),
			'class'         => '',
			'param_name'    => 'ava_bc_all',
			'value'         => '',
			'group'         => __( 'Appearance',  'ava-studio' ),
			'edit_field_class' => 'vc_col-sm-12 vc_column ava_bc_group ava_bc_all ava-param-wrapper',

			'_attr_group'   => 'border-color',
			'_attr'         => 'border-color',


		),
		array(
			'type'          => 'colorpicker',
			'heading'       => __( 'Top border', 'ava-studio' ),
			'class'         => '',
			'param_name'    => 'ava_bc_top',
			'value'         => '',
			'group'         => __( 'Appearance',  'ava-studio' ),
			'edit_field_class' => 'vc_col-sm-12 vc_column ava_bc_group ava_bc_top ava-param-wrapper ava-hide',

			'_attr_group'   => 'border-color',
			'_attr'         => 'border-top-color',

		),
		array(
			'type'          => 'colorpicker',
			'heading'       => __( 'Right border', 'ava-studio' ),
			'class'         => '',
			'param_name'    => 'ava_bc_right',
			'value'         => '',
			'group'         => __( 'Appearance',  'ava-studio' ),
			'edit_field_class' => 'vc_col-sm-12 vc_column ava_bc_group ava_bc_right ava-param-wrapper ava-hide',

			'_attr_group'   => 'border-color',
			'_attr'         => 'border-right-color',

		),



		/*
		array(
			'type'          => 'ava_border',
			'heading'       => __( 'Border',  'ava-studio' ),
			'group'         => __( 'Border',  'ava-studio' ),
			'param_name'    => 'ava_border',
		),
		*/

		array(
			'type'          => 'textfield',
			'heading'       => __( 'Extra class name',  'ava-studio' ),
			'param_name'    => 'el_class',
			'description'   => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.',  'ava-studio' )
		)
	)
);