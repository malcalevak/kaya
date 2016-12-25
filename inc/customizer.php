<?php
/**
 * Kaya Theme Customizer.
 *
 * @package Kaya
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kaya_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'kaya_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kaya_customize_preview_js() {
	wp_enqueue_script( 'kaya_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kaya_customize_preview_js' );


/**
 * Adding Help Options
 */
function kaya_add_help_options($wp_customize) {
	$wp_customize->add_section('kaya_help', array(
		'title' => 'Need Setup Help? Start Here',
		'description' => '<strong>Kaya Setup Instructions</strong><br /><br />
		<a href="https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/">Cick here for Setup Guide</a><br /><br />
		<strong>Kaya Help Forum</strong><br /><br />
		If you have already read the full setup instructions above and still do not understand how to setup the theme, you can post a question in the forum. <br /></br />Make sure to read the pinned thread about how to post a request for help.<br /><br /><a href="https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/">Forum</a>',
		'priority' => 10
	));
}
add_action('customize_register', 'kaya_add_help_options');


/**
 * Create Logo Setting and Upload Control
 */
function kaya_add_logo($wp_customize) {
	// add a setting for the site logo
	$wp_customize->add_setting('kaya_logo', array('sanitize_callback' => ''));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kaya_logo',
		array(
			'label' =>  __( 'Upload Logo', 'kaya' ),
			'section' => 'title_tagline',
			'settings' => 'kaya_logo',
		) 
	) );

	// add a setting for the site retina logo
	$wp_customize->add_setting('kaya_retina_logo', array('sanitize_callback' => ''));
	// Add a control to upload the retina logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kaya_retina_logo',
		array(
			'label' =>  __( 'Upload Retina Logo (twice size of regular logo)', 'kaya' ),
			'section' => 'title_tagline',
			'settings' => 'kaya_retina_logo',
		) 
	) );
}
add_action('customize_register', 'kaya_add_logo');

/**
 * Adding Colors Options
 */
function kaya_add_colors($wp_customize) {
	$wp_customize->add_setting('kaya_header_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_header_background_color', array(
		'label'        => __( 'Header Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_header_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_footer_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_footer_background_color', array(
		'label'        => __( 'Footer Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_footer_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_lower_footer_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_lower_footer_background_color', array(
		'label'        => __( 'Footer Copyright Area Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_lower_footer_background_color',
		) 
	) );
	// add a setting for the text color
	$wp_customize->add_setting('kaya_text_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_text_color', array(
		'label'        => __( 'Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_text_color',
		) 
	) );

	// add a setting for the text color
	$wp_customize->add_setting('kaya_menu_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_menu_background_color', array(
		'label'        => __( 'Menu Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_menu_background_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_heading_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_heading_color', array(
		'label'        => __( 'Heading Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_heading_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_link_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_link_color', array(
		'label'        => __( 'Link Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_link_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_link_hover_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_link_hover_color', array(
		'label'        => __( 'Link Hover Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_link_hover_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_button_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_button_color', array(
		'label'        => __( 'Button Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_button_text_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
'kaya_button_text_color', array(
		'label'        => __( 'Button Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_text_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_button_hover_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_button_hover_color', array(
		'label'        => __( 'Button Hover Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_hover_color',
		) 
	) );

	$wp_customize->add_setting('kaya_button_hover_text_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
'kaya_button_hover_text_color', array(
		'label'        => __( 'Button Hover Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_hover_text_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_social_icon_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_social_icon_color', array(
		'label'        => __( 'Social Icon Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_social_icon_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_social_icon_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_social_icon_background_color', array(
		'label'        => __( 'Social Icon Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_social_icon_background_color',
		) 
	) );
}
add_action('customize_register', 'kaya_add_colors');


/**
 * Adding Header Options
 */
function kaya_add_header_options($wp_customize) {
	$wp_customize->add_section('kaya_header', array(
		'title' => 'Header Options',
		'description' => 'Settings for Header',
		'priority' => 60,
	));
	
	$wp_customize->add_setting('kaya_header_columns');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_header_columns', array(
		'label'           => __( 'Number of Header Columns', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'one_column' => 'Single Column',
								'two_column' => 'Two Columns',
								'three_column' => 'Three Columns',
								'four_column' => 'Four Columns',
							 ),
		'section'         => 'kaya_header',
		'settings'   => 'kaya_header_columns',
		)
	) );
	
	$wp_customize->add_setting('kaya_sticky_header');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
'kaya_sticky_header', array(
		'label'           => __( 'Make Header Sticky', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_header',
		'settings'   => 'kaya_sticky_header',
		)
	) );
	
	$wp_customize->add_setting('kaya_hide_mobile_button_menu');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_hide_mobile_button_menu', array(
		'label'           => __( 'Hide Mobile Menu', 'kaya' ),
		'description'	  => 'Check to hide the mobile menu, useful when using a third party menu plugin',
		'type'            => 'checkbox',
		'section'         => 'kaya_header',
		'settings'   => 'kaya_hide_mobile_button_menu',
		)
	) );
}
add_action('customize_register', 'kaya_add_header_options');


/**
 * Adding General Options
 */
function kaya_add_general($wp_customize) {
	$wp_customize->add_section('kaya_general', array(
		'title' => 'General Options',
		'description' => 'Settings for Content',
		'priority' => 20,
	));
	
	$wp_customize->add_setting('kaya_grid_width');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_grid_width', array(
		'label'           => __( 'Grid Width (default is 1140px)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_grid_width',
		)
	) );
	
	$wp_customize->add_setting('kaya_content_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_content_in_grid', array(
		'label'           => __( 'Apply Grid to Main Site Content', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_content_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_header_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_header_in_grid', array(
		'label'           => __( 'Apply Grid to Header', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_header_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_in_grid', array(
		'label'           => __( 'Apply Grid to Whole Footer', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_footer_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_page_sidebar');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_page_sidebar', array(
		'label'           => __( 'Default Sidebar Setting for Pages', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'no_sidebar' => 'No Sidebar',
								'left_sidebar' => 'Left Sidebar',
								'right_sidebar' => 'Right Sidebar',
							 ),
		'section'         => 'kaya_general',
		'settings'   => 'kaya_page_sidebar',
		)
	) );
	
	$wp_customize->add_setting('kaya_post_sidebar');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_post_sidebar', array(
		'label'           => __( 'Default Sidebar Setting for Blog Posts', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'no_sidebar' => 'No Sidebar',
								'left_sidebar' => 'Left Sidebar',
								'right_sidebar' => 'Right Sidebar',
							 ),
		'section'         => 'kaya_general',
		'settings'   => 'kaya_post_sidebar',
		)
	) );
	
	$wp_customize->add_setting('kaya_stylesheet_version');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_stylesheet_version', array(
		'label'           => __( 'Stylesheet Version', 'kaya' ),
		'description'	  => __( 'By default WordPress uses the current WP version as the stylesheet version. If you wish to alter that, enter a different value here', 'kaya'),
		'type'            => 'number',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_stylesheet_version',
		)
	) );
	
	$wp_customize->add_setting('kaya_google_analytics');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_google_analytics', array(
		'label'           => __( 'Google Analytics', 'kaya' ),
		'description'	  => __( 'Enter your Google Analytics number here, it should be of the format UA-00000000-0', 'kaya'),
		'type'            => 'text',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_google_analytics',
		)
	) );
}
add_action('customize_register', 'kaya_add_general');


/**
 * Adding Footer Section Options
 */
function kaya_add_footer($wp_customize) {
	$wp_customize->add_section('kaya_footer', array(
		'title' => 'Footer',
		'description' => 'Footer Settings',
		'priority' => 120,
	));
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_show_footer_columns');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_show_footer_columns', array(
		'label'           => __( 'Show the Footer Columns', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_show_footer_columns',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_columns_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_columns_in_grid', array(
		'label'           => __( 'Apply Grid to Footer Columns', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_footer_columns_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_columns');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_columns', array(
		'label'           => __( 'Number of Footer Columns', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'one_column' => 'Single Column',
								'two_column' => 'Two Columns',
								'three_column' => 'Three Columns',
								'four_column' => 'Four Columns',
							 ),
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_footer_columns',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_right');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_right', array(
		'label'           => __( 'Content for Right side of Lower Footer', 'kaya' ),
		'description'	  => __( 'Enter content to replace the credit info', 'kaya'),
		'type'            => 'text',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_footer_right',
		)
	) );
}
add_action('customize_register', 'kaya_add_footer');


/**
 * Adding 404 Page Options
 */
function kaya_add_404($wp_customize) {
	$wp_customize->add_section('kaya_404', array(
		'title' => '404 Error Page',
		'description' => '404 Error Page',
		'priority' => 130,
	));
	
	$wp_customize->add_setting('kaya_404_title');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_404_title', array(
		'label'           => __( '404 Page Title', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_404',
		'settings'   => 'kaya_404_title',
		)
	) );
	
	$wp_customize->add_setting('kaya_404_content');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_404_content', array(
		'label'           => __( '404 Page Content', 'kaya' ),
		'type'            => 'textarea',
		'section'         => 'kaya_404',
		'settings'   => 'kaya_404_content',
		)
	) );
}
add_action('customize_register', 'kaya_add_404');


/**
 * Adding SEO Options
 */
function kaya_add_seo($wp_customize) {
	$wp_customize->add_section('kaya_seo', array(
		'title' => 'SEO Options',
		'description' => 'Add Schema.org JSON LD markup to your site. Just enter your information into the sections below and the markup will automatically be added your site. Leave empty any content you do not have. If you would like more information on the schema, plesae see this <a href="https://whitespark.ca/blog/the-json-ld-markup-guide-to-local-business-schema/">blog article</a> on it.',
		'priority' => 140,
	));
	
	$wp_customize->add_setting('kaya_schema_type');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_type', array(
		'label'           => __( 'Schema Type', 'kaya' ),
		'description'	  => __( '<a href="https://docs.google.com/spreadsheets/d/1Ed6RmI01rx4UdW40ciWgz2oS_Kx37_-sPi7sba_jC3w/edit#gid=0">Click here</a> to view type options. For example, if you are a dentist look for Dentist in the left column and then see "http://schema.org/Dentist" in the right column, you would enter just "Dentist" (not the http://schema.org/ part)', 'kaya'),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_type',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_additional_type');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_additional_type', array(
		'label'           => __( 'Schema Additional Type', 'kaya' ),
		'description'	  => __( 'If the above type is not specific enough, add your additional type here. To find your additional type look for a wikipedia article describing what you do. For example, a web developer would find http://en.wikipedia.org/wiki/Web_developer and then replace the wikipedia part to get http://www.productontology.org/id/Web_developer', 'kaya'),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_additional_type',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_name');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_name', array(
		'label'           => __( 'Schema Name', 'kaya' ),
		'description'	  => __( 'If the name you want used in your schema is different than your site name, add it here.', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_name',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_description');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_description', array(
		'label'           => __( 'Description', 'kaya' ),
		'description'	  => __( 'A short description. For example, if you are a dentist, then a short description of your practice.', 'kaya' ),
		'type'            => 'textarea',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_description',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_address_street');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_address_street', array(
		'label'           => __( 'Address - Street', 'kaya' ),
		'description'	  => __( 'Enter your street address, for example "123 Main St"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_address_street',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_address_locality');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_address_locality', array(
		'label'           => __( 'Address - Locality', 'kaya' ),
		'description'	  => __( 'Enter your locality, for example "New York City"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_address_locality',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_address_region');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_address_region', array(
		'label'           => __( 'Address - Region', 'kaya' ),
		'description'	  => __( 'Enter your region, for example "New York"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_address_region',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_address_postal');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_address_postal', array(
		'label'           => __( 'Address - Postal Code', 'kaya' ),
		'description'	  => __( 'Enter your postal code, for example "12345"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_address_postal',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_address_country');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_address_country', array(
		'label'           => __( 'Address - Country', 'kaya' ),
		'description'	  => __( 'Enter your country, for example "USA"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_address_country',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_map');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_map', array(
		'label'           => __( 'Map URL', 'kaya' ),
		'description'	  => __( 'Enter your google maps URL', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_map',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_latitude');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_latitude', array(
		'label'           => __( 'Latitute', 'kaya' ),
		'description'	  => __( 'Enter your latitude, for example "41.1573"', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_latitude',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_longitude');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_longitude', array(
		'label'           => __( 'Longitude', 'kaya' ),
		'description'	  => __( 'Enter your latitude, for example "-75.8901"', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_longitude',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_phone');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_phone', array(
		'label'           => __( 'Phone Number', 'kaya' ),
		'description'	  => __( 'For example "570-555-1234"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_phone',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_open_hours_1');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_open_hours_1', array(
		'label'           => __( 'Open Hours', 'kaya' ),
		'description'	  => __( 'The primary hours you are open. For example if you are open Monday through Thursday 9am - 5pm you would put "Mo,Tu,We,Th 09:00-17:00"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_open_hours_1',
		)
	) );
	$wp_customize->add_setting('kaya_schema_open_hours_2');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_open_hours_2', array(
		'label'           => __( 'Additional Open Hours', 'kaya' ),
		'description'	  => __( 'For example if you are also open Friday 9am - 12pm you would put "Fr 09:00-12:00"', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_open_hours_2',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_review_value');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_review_value', array(
		'label'           => __( 'Average Review Value', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_review_value',
		)
	) );
	
	$wp_customize->add_setting('kaya_schema_review_count');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_schema_review_count', array(
		'label'           => __( 'Number of Reviews', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_seo',
		'settings'   => 'kaya_schema_review_count',
		)
	) );
}
add_action('customize_register', 'kaya_add_seo');



/**
 * Adding Social Section Options
 */
function kaya_add_social($wp_customize) {
	$wp_customize->add_section('kaya_social', array(
		'title' => 'Social Media URLs',
		'description' => 'URLS for your social media accounts',
		'priority' => 110,
	));
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_facebook');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_facebook', array(
		'label'           => __( 'Facebook', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_facebook',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_twitter');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_twitter', array(
		'label'           => __( 'Twitter', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_twitter',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_linkedin');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_linkedin', array(
		'label'           => __( 'LinkedIn', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_linkedin',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_google_plus');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_google_plus', array(
		'label'           => __( 'Google Plus', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_google_plus',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_skype');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_skype', array(
		'label'           => __( 'Skype', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_skype',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_youtube');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_youtube', array(
		'label'           => __( 'YouTube', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_youtube',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_vimeo');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_vimeo', array(
		'label'           => __( 'Vimeo', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_vimeo',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_instagram');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_instagram', array(
		'label'           => __( 'Instagram', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_instagram',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_pinterest');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_pinterest', array(
		'label'           => __( 'Pinterest', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_pinterest',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_yelp');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_yelp', array(
		'label'           => __( 'Yelp', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_yelp',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_rss');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_rss', array(
		'label'           => __( 'RSS', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_rss',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_email');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_email', array(
		'label'           => __( 'E-mail Address', 'kaya' ),
		'type'            => 'email',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_email',
		)
	) );
}
add_action('customize_register', 'kaya_add_social');


/**
 * Adding Font Section Options
 */
function kaya_add_fonts($wp_customize) {
	$wp_customize->add_section('kaya_fonts', array(
		'title' => 'Font Sizes',
		'description' => 'All custom font sizes need to be in pixels. If you want your h1 to be 40px, then enter the number 40.',
		'priority' => 40,
	));
	
	$wp_customize->add_setting('kaya_heading_1');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_1', array(
		'label'           => __( 'Heading 1', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_1',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_2');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_2', array(
		'label'           => __( 'Heading 2', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_2',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_3');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_3', array(
		'label'           => __( 'Heading 3', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_3',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_4');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_4', array(
		'label'           => __( 'Heading 4', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_4',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_5');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_5', array(
		'label'           => __( 'Heading 5', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_5',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_6');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_6', array(
		'label'           => __( 'Heading 6', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_6',
		)
	) );
	
	$wp_customize->add_setting('kaya_paragraph');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_paragraph', array(
		'label'           => __( 'Paragraph', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_paragraph',
		)
	) );
	
	$wp_customize->add_setting('kaya_social_icon_size');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_social_icon_size', array(
		'label'           => __( 'Social Icons', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_social_icon_size',
		)
	) );
}
add_action('customize_register', 'kaya_add_fonts');