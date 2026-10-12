<?php
/**
 * Register Advanced Custom Fields (ACF) locally.
 * This file will automatically register fields if the ACF plugin is installed and active.
 */

if ( function_exists( 'acf_add_local_field_group' ) ) {

	// 1. Front Page Fields (Home)
	acf_add_local_field_group( array(
		'key'      => 'group_front_page_sections',
		'title'    => 'Front Page Sections',
		'fields'   => array(
			// Hero Section
			array(
				'key'          => 'field_hero_tab',
				'label'        => 'Hero Section',
				'type'         => 'tab',
			),
			array(
				'key'          => 'field_hero_headline',
				'label'        => 'Hero Headline',
				'name'         => 'hero_headline',
				'type'         => 'text',
				'instructions' => 'e.g. Reyoung. Renew. Restore.',
				'default_value'=> 'Reyoung.<br>Renew.<br>Restore.',
			),
			array(
				'key'          => 'field_hero_subheadline',
				'label'        => 'Hero Subheadline',
				'name'         => 'hero_subheadline',
				'type'         => 'textarea',
				'instructions' => 'Short description under the headline.',
				'default_value'=> "Strengthen your skin from\nwithin and enjoy a more\nyouthful look wth Reyoung.",
				'new_lines'    => 'br',
			),

			// About Section
			array(
				'key'          => 'field_about_tab',
				'label'        => 'About Section',
				'type'         => 'tab',
			),
			array(
				'key'          => 'field_about_title',
				'label'        => 'About Title',
				'name'         => 'about_title',
				'type'         => 'text',
				'default_value'=> 'We care<br>about you',
			),
			array(
				'key'          => 'field_about_subtitle',
				'label'        => 'About Subtitle',
				'name'         => 'about_subtitle',
				'type'         => 'text',
				'default_value'=> 'Youthful skin isn’t about<br>looking younger overnight',
			),
			array(
				'key'          => 'field_about_content',
				'label'        => 'About Content',
				'name'         => 'about_content',
				'type'         => 'textarea',
				'default_value'=> "It's about nurturing your skin with treatments that restore its natural balance,\nenhance its radiance, and protect its future. At Reyoung Skin, we combine\nadvanced skincare technology with gentle, personalized care to help you achieve\nlasting results that reflect your inner vitality.",
				'new_lines'    => 'br',
			),
			// Services Section
			array(
				'key'          => 'field_services_tab',
				'label'        => 'Services Section',
				'type'         => 'tab',
			),
			array(
				'key'          => 'field_services_section_title',
				'label'        => 'Services Section Title',
				'name'         => 'services_section_title',
				'type'         => 'text',
				'default_value'=> 'Our Services',
			),
			array(
				'key'          => 'field_services_cta_text',
				'label'        => 'CTA Button Text',
				'name'         => 'services_cta_text',
				'type'         => 'text',
				'default_value'=> 'See Pricing',
			),
			array(
				'key'          => 'field_services_cta_link',
				'label'        => 'CTA Button Link',
				'name'         => 'services_cta_link',
				'type'         => 'text',
				'default_value'=> '/pricing',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
		'menu_order' => 0,
		'position'   => 'normal',
		'style'      => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	) );



	// 2. Service Item CPT Fields
	acf_add_local_field_group( array(
		'key'      => 'group_service_item',
		'title'    => 'Service Item Details',
		'fields'   => array(
			array(
				'key'          => 'field_service_image',
				'label'        => 'Service Image',
				'name'         => 'service_image',
				'type'         => 'image',
				'instructions' => 'Upload image for this service (recommended 4:3 ratio).',
				'return_format'=> 'array',
				'preview_size' => 'medium',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'service_item',
				),
			),
		),
		'menu_order' => 0,
		'position'   => 'normal',
		'style'      => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	) );



	// 3. Pricing Item CPT Fields
	acf_add_local_field_group( array(
		'key'      => 'group_pricing_item',
		'title'    => 'Pricing Item Details',
		'fields'   => array(
			array(
				'key'          => 'field_pricing_price',
				'label'        => 'Price',
				'name'         => 'price',
				'type'         => 'text',
				'instructions' => 'e.g. $69 or $50 (30mins) / $65 (45mins)',
			),
			array(
				'key'          => 'field_pricing_was_price',
				'label'        => 'Was Price (Old Price)',
				'name'         => 'was_price',
				'type'         => 'text',
				'instructions' => 'e.g. $159 (will be displayed with strikethrough)',
			),
			array(
				'key'          => 'field_pricing_extra_price',
				'label'        => 'Extra Price Note',
				'name'         => 'extra_price',
				'type'         => 'text',
				'instructions' => 'e.g. $89 LED included (displayed next to the price)',
			),
			array(
				'key'          => 'field_pricing_column',
				'label'        => 'Display Column',
				'name'         => 'column',
				'type'         => 'select',
				'choices'      => array(
					'left'  => 'Left Column',
					'right' => 'Right Column',
				),
				'default_value'=> 'left',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'pricing_item',
				),
			),
		),
		'menu_order' => 0,
		'position'   => 'normal',
		'style'      => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	) );

}

