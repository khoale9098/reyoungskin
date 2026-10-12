<?php
/**
 * ReyoungSkin Theme Customizer.
 *
 * @package ReyoungSkin
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function reyoungskin_customize_register( $wp_customize ) {
	// Add Section for Contact & Global Info
	$wp_customize->add_section( 'reyoungskin_global_info', array(
		'title'       => __( 'Global Info & Contacts', 'reyoungskin' ),
		'priority'    => 30,
		'description' => __( 'Manage your phone number, email, address, booking links, and social media.', 'reyoungskin' ),
	) );

	// Phone Number
	$wp_customize->add_setting( 'reyoungskin_phone', array(
		'default'           => '021 231 5978',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'reyoungskin_phone', array(
		'label'   => __( 'Phone Number', 'reyoungskin' ),
		'section' => 'reyoungskin_global_info',
		'type'    => 'text',
	) );

	// Email
	$wp_customize->add_setting( 'reyoungskin_email', array(
		'default'           => 'reyoungskin@gmail.com',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'reyoungskin_email', array(
		'label'   => __( 'Email Address', 'reyoungskin' ),
		'section' => 'reyoungskin_global_info',
		'type'    => 'email',
	) );

	// Address
	$wp_customize->add_setting( 'reyoungskin_address', array(
		'default'           => '437 Remuera Road, Remuera, Auckland 1050',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'reyoungskin_address', array(
		'label'   => __( 'Physical Address', 'reyoungskin' ),
		'section' => 'reyoungskin_global_info',
		'type'    => 'textarea',
	) );

	// Booking Link
	$wp_customize->add_setting( 'reyoungskin_booking_link', array(
		'default'           => 'https://www.fresha.com/book-now/reyoung-skin-r31eq3r8/services?lid=2890981&eid=5108859&share=true&pId=2795259',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'reyoungskin_booking_link', array(
		'label'       => __( 'Fresha Booking Link', 'reyoungskin' ),
		'section'     => 'reyoungskin_global_info',
		'type'        => 'url',
	) );

	// Facebook
	$wp_customize->add_setting( 'reyoungskin_facebook', array(
		'default'           => 'https://www.facebook.com/profile.php?id=61582669332322',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'reyoungskin_facebook', array(
		'label'   => __( 'Facebook Link', 'reyoungskin' ),
		'section' => 'reyoungskin_global_info',
		'type'    => 'url',
	) );

	// Instagram
	$wp_customize->add_setting( 'reyoungskin_instagram', array(
		'default'           => 'https://www.instagram.com/reyoung__skin',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'reyoungskin_instagram', array(
		'label'   => __( 'Instagram Link', 'reyoungskin' ),
		'section' => 'reyoungskin_global_info',
		'type'    => 'url',
	) );

	// --- SECTION: IMAGES ---
	$wp_customize->add_section( 'reyoungskin_images', array(
		'title'       => __( 'Theme Images', 'reyoungskin' ),
		'priority'    => 35,
		'description' => __( 'Upload your logo and background images here.', 'reyoungskin' ),
	) );

	// Logo
	$wp_customize->add_setting( 'reyoungskin_hero_logo', array(
		'default'           => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'reyoungskin_hero_logo', array(
		'label'      => __( 'Upload Logo', 'reyoungskin' ),
		'section'    => 'reyoungskin_images',
		'settings'   => 'reyoungskin_hero_logo',
	) ) );

	// Hero Image
	$wp_customize->add_setting( 'reyoungskin_hero_image', array(
		'default'           => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Hero%20banner%20image.jpeg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'reyoungskin_hero_image', array(
		'label'      => __( 'Upload Hero Banner Image', 'reyoungskin' ),
		'section'    => 'reyoungskin_images',
		'settings'   => 'reyoungskin_hero_image',
	) ) );

	// About Image
	$wp_customize->add_setting( 'reyoungskin_about_image', array(
		'default'           => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/about.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'reyoungskin_about_image', array(
		'label'      => __( 'Upload About Section Image', 'reyoungskin' ),
		'section'    => 'reyoungskin_images',
		'settings'   => 'reyoungskin_about_image',
	) ) );

	// Contact Image (Footer)
	$wp_customize->add_setting( 'reyoungskin_contact_image', array(
		'default'           => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/contact.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'reyoungskin_contact_image', array(
		'label'      => __( 'Upload Contact Image', 'reyoungskin' ),
		'section'    => 'reyoungskin_images',
		'settings'   => 'reyoungskin_contact_image',
	) ) );

	// Map Image
	$wp_customize->add_setting( 'reyoungskin_map_image', array(
		'default'           => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/Google%20Map.jpeg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'reyoungskin_map_image', array(
		'label'      => __( 'Upload Map Image', 'reyoungskin' ),
		'section'    => 'reyoungskin_images',
		'settings'   => 'reyoungskin_map_image',
	) ) );

	// --- SECTION: PRICING PAGE ---
	// --- SECTION: SERVICES SECTION ---
	$wp_customize->add_section( 'reyoungskin_services_section', array(
		'title'       => __( 'Services Section (Homepage)', 'reyoungskin' ),
		'priority'    => 38,
		'description' => __( 'Customize the Our Services section on the front page.', 'reyoungskin' ),
	) );

	// Services Section Title
	$wp_customize->add_setting( 'reyoungskin_services_title', array(
		'default'           => 'Our Services',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'reyoungskin_services_title', array(
		'label'   => __( 'Section Title', 'reyoungskin' ),
		'section' => 'reyoungskin_services_section',
		'type'    => 'text',
	) );

	// Services Button Text
	$wp_customize->add_setting( 'reyoungskin_services_button_text', array(
		'default'           => 'See Pricing',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'reyoungskin_services_button_text', array(
		'label'   => __( 'Button Text', 'reyoungskin' ),
		'section' => 'reyoungskin_services_section',
		'type'    => 'text',
	) );

	// Services Button Link
	$wp_customize->add_setting( 'reyoungskin_services_button_link', array(
		'default'           => '/pricing',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'reyoungskin_services_button_link', array(
		'label'   => __( 'Button Link', 'reyoungskin' ),
		'section' => 'reyoungskin_services_section',
		'type'    => 'text',
	) );

	// Services Background Color
	$wp_customize->add_setting( 'reyoungskin_services_bg_color', array(
		'default'           => '#CFE1D9',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'reyoungskin_services_bg_color', array(
		'label'   => __( 'Section Background Color', 'reyoungskin' ),
		'section' => 'reyoungskin_services_section',
	) ) );

	// Pricing Page Settings
	$wp_customize->add_section( 'reyoungskin_pricing_page', array(
		'title'       => __( 'Pricing Page Settings', 'reyoungskin' ),
		'priority'    => 40,
		'description' => __( 'Customize the hero section and contact details specifically for the Pricing page.', 'reyoungskin' ),
	) );

	// Pricing Hero Title
	$wp_customize->add_setting( 'reyoungskin_pricing_hero_title', array(
		'default'           => 'Service Details<br class="hidden sm:block"> & Pricing',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'reyoungskin_pricing_hero_title', array(
		'label'   => __( 'Hero Title', 'reyoungskin' ),
		'section' => 'reyoungskin_pricing_page',
		'type'    => 'textarea',
	) );

	// Pricing Hero Image
	$wp_customize->add_setting( 'reyoungskin_pricing_hero_image', array(
		'default'           => 'https://cdn.jsdelivr.net/gh/khoale9098/reyoungskin@main/imgs/pricing.jpeg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'reyoungskin_pricing_hero_image', array(
		'label'      => __( 'Upload Pricing Hero Image', 'reyoungskin' ),
		'section'    => 'reyoungskin_pricing_page',
		'settings'   => 'reyoungskin_pricing_hero_image',
	) ) );

	// Pricing Book Now Text
	$wp_customize->add_setting( 'reyoungskin_pricing_book_now_text', array(
		'default'           => 'BOOK NOW',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'reyoungskin_pricing_book_now_text', array(
		'label'   => __( 'Book Now Button Text', 'reyoungskin' ),
		'section' => 'reyoungskin_pricing_page',
		'type'    => 'text',
	) );

	// Pricing Phone Override
	$wp_customize->add_setting( 'reyoungskin_pricing_phone', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'reyoungskin_pricing_phone', array(
		'label'       => __( 'Phone Number Override', 'reyoungskin' ),
		'description' => __( 'Leave blank to use the global phone number.', 'reyoungskin' ),
		'section'     => 'reyoungskin_pricing_page',
		'type'        => 'text',
	) );
}
add_action( 'customize_register', 'reyoungskin_customize_register' );
