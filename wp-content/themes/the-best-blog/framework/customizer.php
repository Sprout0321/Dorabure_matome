<?php

define( 'KIRKI_PATH', dirname( __FILE__ ) . '/customizer' );
define( 'KIRKI_URL', get_template_directory_uri() . '/framework/customizer' );
include_once( dirname( __FILE__ ) . '/customizer/kirki.php' );
function the_best_blog_customizer_configuration() {

	$args = array(
		'url_path' => get_template_directory_uri() . '/framework/customizer/'
	);

	return $args;

}

add_filter( 'kirki/config', 'the_best_blog_customizer_configuration' );

function the_best_blog_add_panels_sections( $wp_customize ) {

	$wp_customize->remove_section( 'colors' );

	$wp_customize->add_panel( 'the_best_blog_header', array(
		'title'    => esc_html__( 'Header Options', 'the-best-blog' ),
		'priority' => 25,
	) );

	$wp_customize->add_section( 'the_best_blog_header_logo', array(
		'title'    => esc_html__( 'Website Logo', 'the-best-blog' ),
		'panel'    => 'the_best_blog_header',
		'priority' => 10,
	) );

	$wp_customize->add_section( 'the_best_blog_header_billboard', array(
		'title'    => esc_html__( 'Billboard Section', 'the-best-blog' ),
		'panel'    => 'the_best_blog_header',
		'priority' => 10,
	) );

	$wp_customize->add_section( 'the_best_blog_menu_options', array(
		'title'    => esc_html__( 'Menu Options', 'the-best-blog' ),
		'panel'    => 'the_best_blog_header',
		'priority' => 10,
	) );

	$wp_customize->add_section( 'the_best_blog_typography', array(
		'title'    => esc_html__( 'Typography Options', 'the-best-blog' ),
		'priority' => 25,
	) );

	$wp_customize->add_section( 'the_best_blog_layout', array(
		'title'    => esc_html__( 'Layout Options', 'the-best-blog' ),
		'priority' => 30,
	) );

	$wp_customize->add_section( 'the_best_blog_social', array(
		'title'    => esc_html__( 'Social Options', 'the-best-blog' ),
		'priority' => 40,
	) );

	$wp_customize->add_panel( 'the_best_blog_additional', array(
		'title'    => esc_html__( 'Additional Options', 'the-best-blog' ),
		'priority' => 140,
	) );

	$wp_customize->add_section( 'the_best_blog_related_posts', array(
		'title'    => esc_html__( 'Related Posts Options', 'the-best-blog' ),
		'panel'    => 'the_best_blog_additional',
		'priority' => 10,
	) );

	$wp_customize->add_section( 'the_best_blog_social_share', array(
		'title'    => esc_html__( 'Social Share Options', 'the-best-blog' ),
		'panel'    => 'the_best_blog_additional',
		'priority' => 20,
	) );

	$wp_customize->add_section( 'the_best_blog_newsletter_sections', array(
		'title'    => esc_html__( 'Newsletter Sections', 'the-best-blog' ),
		'panel'    => 'the_best_blog_additional',
		'priority' => 20,
	) );

	$wp_customize->add_section( 'the_best_blog_links', array(
		'title'    => esc_html__( 'The Best Press Support Links', 'the-best-blog' ),
		'priority' => 150,
	) );
}

add_action( 'customize_register', 'the_best_blog_add_panels_sections' );

function the_best_blog_typography_customizer_fields( $fields ) {
	$fields[] = array(
		'type'     => 'color',
		'settings' => 'the_best_blog_text_color',
		'label'    => esc_html__( 'Main Color', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => '#7d7d7d',
		'priority' => 10,
		'output'   => array(
			'element'  => 'body',
			'property' => 'color',
		)
	);

	$fields[] = array(
		'type'     => 'color',
		'settings' => 'the_best_blog_headers_color',
		'label'    => esc_html__( 'Headers Color', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => '#ff9933',
		'priority' => 10,
		'output'   => array(
			'element'  => '.post-title, .entry-title, .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6, .widget-title, blockquote::before',
			'property' => 'color',
		)
	);

	$fields[] = array(
		'type'     => 'color',
		'settings' => 'the_best_blog_links_color',
		'label'    => esc_html__( 'Links Color', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => '#ff9933',
		'priority' => 10,
		'output'   => array(
			'element'  => '.entry-content a, .entry-content a:link, .entry-content a:visited, .entry-content a:hover',
			'property' => 'color',
		)
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'the_best_blog_body_font_family',
		'label'       => esc_html__( 'Body Font-Family', 'the-best-blog' ),
		'description' => esc_html__( 'Choose any google font you want!', 'the-best-blog' ),
		'section'     => 'the_best_blog_typography',
		'default'     => 'Ubuntu',
		'priority'    => 10,
		'choices'     => Kirki_Fonts::get_font_choices(),
		'output'      => array(
			'element'  => 'body',
			'property' => 'font-family',
		)
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'the_best_blog_headers_font_family',
		'label'       => esc_html__( 'Headers Font-Family', 'the-best-blog' ),
		'description' => esc_html__( 'Choose any google font you want!', 'the-best-blog' ),
		'section'     => 'the_best_blog_typography',
		'default'     => 'Ubuntu',
		'priority'    => 10,
		'choices'     => Kirki_Fonts::get_font_choices(),
		'output'      => array(
			'element'  => 'h1, h2, h3, h4, h5, h6, .post-title, .entry-title, .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6, .widget-title',
			'property' => 'font-family',
		)
	);

	$fields[] = array(
		'type'     => 'slider',
		'settings' => 'the_best_blog_base_font_size',
		'label'    => esc_html__( 'Base font-size', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'priority' => 20,
		'default'  => 16,
		'choices'  => array(
			'min'  => 4,
			'max'  => 32,
			'step' => 1,
		),
		'output'   => array(
			'property' => 'font-size',
			'units'    => 'px',
			'element'  => 'body',
		)
	);

	$fields[] = array(
		'type'     => 'slider',
		'settings' => 'the_best_blog_font_base_weight',
		'label'    => esc_html__( 'Base Font Weight', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => 100,
		'priority' => 25,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
		'output'   => array(
			'element'  => 'body',
			'property' => 'font-weight',
		),
	);

	$fields[] = array(
		'type'     => 'slider',
		'settings' => 'the_best_blog_font_base_height',
		'label'    => esc_html__( 'Base Line Height', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => 1.43,
		'priority' => 30,
		'choices'  => array(
			'min'  => 0,
			'max'  => 3,
			'step' => 0.01,
		),
		'output'   => array(
			'element'  => 'body',
			'property' => 'line-height',
		),
	);

	$fields[] = array(
		'type'     => 'slider',
		'settings' => 'the_best_blog_font_headers_weight_h1',
		'label'    => esc_html__( 'H1 Font Weight', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => 700,
		'priority' => 35,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
		'output'   => array(
			'element'  => 'h1, h1.post-title, h1.entry-title',
			'property' => 'font-weight',
		),
	);

	$fields[] = array(
		'type'     => 'slider',
		'settings' => 'the_best_blog_font_headers_weight_h2',
		'label'    => esc_html__( 'H2 Font Weight', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => 700,
		'priority' => 40,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
		'output'   => array(
			'element'  => 'h2, h2.post-title, h2.entry-title',
			'property' => 'font-weight',
		),
	);

	$fields[] = array(
		'type'     => 'slider',
		'settings' => 'the_best_blog_font_headers_weight_h3',
		'label'    => esc_html__( 'H2 Font Weight', 'the-best-blog' ),
		'section'  => 'the_best_blog_typography',
		'default'  => 700,
		'priority' => 45,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
		'output'   => array(
			'element'  => 'h3, .widget-title',
			'property' => 'font-weight',
		),
	);

	return $fields;
}

add_filter( 'kirki/fields', 'the_best_blog_typography_customizer_fields' );

function the_best_blog_header_layout_customizer_fields( $fields ) {

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_menu_sticky',
		'label'       => esc_html__( 'Enable sticky menu', 'the-best-blog' ),
		'description' => esc_html__( 'Toggle to enable/disable sticky menu', 'the-best-blog' ),
		'section'     => 'the_best_blog_menu_options',
		'default'     => '0',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'the_best_blog_menu_position',
		'label'       => esc_html__( 'Navigation position', 'the-best-blog' ),
		'description' => esc_html__( 'Choose navigation position on header', 'the-best-blog' ),
		'section'     => 'the_best_blog_menu_options',
		'default'     => 'billboard-top',
		'priority'    => 10,
		'choices'     => array(
			'billboard-top' => array(
				esc_html__( 'Below Billboard', 'the-best-blog' ),
				esc_html__( 'Billboard will be on top and navigation will be below Billboard', 'the-best-blog' ),
			),
			'nav-top'       => array(
				esc_html__( 'Navigation at top', 'the-best-blog' ),
				esc_html__( 'Navigation will be on top and billboard will be at bottom', 'the-best-blog' ),
			),
			'overlay-nav'   => array(
				esc_html__( 'Overlay Navigation', 'the-best-blog' ),
				esc_html__( 'Navigation will be over Billboard Section', 'the-best-blog' ),
			),
		),
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_show_header_billboard',
		'label'       => esc_html__( 'Enable billboard section', 'the-best-blog' ),
		'description' => esc_html__( 'Toggle to enable/disable billboard', 'the-best-blog' ),
		'section'     => 'the_best_blog_header_billboard',
		'default'     => '0',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'     => 'select',
		'settings' => 'the_best_blog_show_list',
		'label'    => esc_html__( 'Show latest posts or selective posts?', 'the-best-blog' ),
		'section'  => 'the_best_blog_header_billboard',
		'default'  => array( 'latest' ),
		'multiple' => 1,
		'choices'  => array(
			'latest'    => esc_html__( 'Latest 5 posts', 'the-best-blog' ),
			'selective' => esc_html__( 'Selective 5 posts or pages', 'the-best-blog' ),
		),
	);

	$fields[] = array(
		'type'            => 'select',
		'settings'        => 'the_best_blog_posts_list',
		'label'           => esc_html__( 'Choose Posts or Page to be featured on billboard', 'the-best-blog' ),
		'description'     => esc_html__( 'Only 5 of either posts or page will be shown.', 'the-best-blog' ),
		'section'         => 'the_best_blog_header_billboard',
		'default'         => array(),
		'multiple'        => 5,
		'choices'         => Kirki_Helper::get_posts( array(
			'posts_per_page' => - 1,
			'post_type'      => array( 'post', 'page' )
		) ),
		'active_callback' => array(
			array(
				'setting'  => 'the_best_blog_show_list',
				'operator' => '==',
				'value'    => 'selective',
			),
		),
	);

	return $fields;
}

add_filter( 'kirki/fields', 'the_best_blog_header_layout_customizer_fields' );

function the_best_blog_layout_customizer_fields( $fields ) {
	$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'the_best_blog_site_layout',
		'label'       => esc_html__( 'Site layout', 'the-best-blog' ),
		'description' => esc_html__( 'Select site layout for website. This layout will be reflected in whole site', 'the-best-blog' ),
		'section'     => 'the_best_blog_layout',
		'default'     => 'full-width',
		'transport'   => 'postMessage',
		'priority'    => 10,
		'choices'     => array(
			'full-width' => esc_html__( 'Full Width', 'the-best-blog' ),
			'boxed'      => esc_html__( 'Boxed', 'the-best-blog' ),
		),

	);

	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'the_best_blog_default_layout',
		'label'       => esc_html__( 'Default layout', 'the-best-blog' ),
		'description' => esc_html__( 'Select default layout for website. This layout will be reflected in archives, attachment, categories, search page, etc.', 'the-best-blog' ),
		'section'     => 'the_best_blog_layout',
		'default'     => 'right-sidebar',
		'transport'   => 'postMessage',
		'priority'    => 20,
		'choices'     => array(
			'left-sidebar'  => trailingslashit( KIRKI_URL ) . 'assets/images/2cl.png',
			'right-sidebar' => trailingslashit( KIRKI_URL ) . 'assets/images/2cr.png',
			'no-sidebar'    => trailingslashit( KIRKI_URL ) . 'assets/images/1c.png',
		),

	);

	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'the_best_blog_post_layout',
		'label'       => esc_html__( 'Single post layout', 'the-best-blog' ),
		'description' => esc_html__( 'Select single post layout for website.', 'the-best-blog' ),
		'section'     => 'the_best_blog_layout',
		'default'     => 'right-sidebar',
		'transport'   => 'postMessage',
		'priority'    => 30,
		'choices'     => array(
			'left-sidebar'  => trailingslashit( KIRKI_URL ) . 'assets/images/2cl.png',
			'right-sidebar' => trailingslashit( KIRKI_URL ) . 'assets/images/2cr.png',
			'no-sidebar'    => trailingslashit( KIRKI_URL ) . 'assets/images/1c.png',
		),

	);

	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'the_best_blog_page_layout',
		'label'       => esc_html__( 'Single page layout', 'the-best-blog' ),
		'description' => esc_html__( 'Select single page layout for website.', 'the-best-blog' ),
		'section'     => 'the_best_blog_layout',
		'default'     => 'right-sidebar',
		'transport'   => 'postMessage',
		'priority'    => 40,
		'choices'     => array(
			'left-sidebar'  => trailingslashit( KIRKI_URL ) . 'assets/images/2cl.png',
			'right-sidebar' => trailingslashit( KIRKI_URL ) . 'assets/images/2cr.png',
			'no-sidebar'    => trailingslashit( KIRKI_URL ) . 'assets/images/1c.png',
		),

	);

	return $fields;
}

add_filter( 'kirki/fields', 'the_best_blog_layout_customizer_fields' );

function the_best_blog_social_customizer_fields( $fields ) {

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_show_social_profile_icon',
		'label'       => esc_html__( 'Show Share Icons', 'the-best-blog' ),
		'description' => esc_html__( 'Toggle to show/hide social profile icons on footer', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '0',
		'priority'    => 10
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'the_best_blog_social_fb_link',
		'label'       => esc_html__( 'Facebook', 'the-best-blog' ),
		'description' => esc_html__( 'Enter your Facebook profile URL', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => esc_url( 'http://facebook.com' ),
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_fb',
		'description' => esc_html__( 'Open Facebook profile link in new window', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '1',
		'priority'    => 15
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_fb_show',
		'description' => esc_html__( 'Toggle to show/hide Facebook profile link', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '0',
		'priority'    => 15
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'the_best_blog_social_tw_link',
		'label'       => esc_html__( 'Twitter', 'the-best-blog' ),
		'description' => esc_html__( 'Enter your Twitter profile URL', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => esc_url( 'http://twitter.com' ),
		'priority'    => 20,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_tw',
		'description' => esc_html__( 'Open Twitter profile link in new window', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '1',
		'priority'    => 25
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_tw_show',
		'description' => esc_html__( 'Toggle to show/hide Twitter profile link', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '0',
		'priority'    => 25
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'the_best_blog_social_gplus_link',
		'label'       => esc_html__( 'Google plus', 'the-best-blog' ),
		'description' => esc_html__( 'Enter your Google plus profile URL', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => esc_url( 'http://plus.google.com' ),
		'priority'    => 30,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_gplus',
		'description' => esc_html__( 'Open Google plus profile link in new window', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '1',
		'priority'    => 35
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_gplus_show',
		'description' => esc_html__( 'Toggle to show/hide Google plus profile link', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '0',
		'priority'    => 35
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'the_best_blog_social_pin_link',
		'label'       => esc_html__( 'Pinterest', 'the-best-blog' ),
		'description' => esc_html__( 'Enter your Pinterest profile URL', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => esc_url( 'http://pinterest.com' ),
		'priority'    => 40,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_pin',
		'description' => esc_html__( 'Open Pinterest profile link in new window', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '1',
		'priority'    => 45
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_pin_show',
		'description' => esc_html__( 'Toggle to show/hide Pinterest profile link', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '0',
		'priority'    => 45
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'the_best_blog_social_in_link',
		'label'       => esc_html__( 'LinkedIn', 'the-best-blog' ),
		'description' => esc_html__( 'Enter your LinkedIn profile URL', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => esc_url( 'http://linkedin.com' ),
		'priority'    => 50
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_in',
		'description' => esc_html__( 'Open LinkedIn profile link in new window', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '1',
		'priority'    => 55
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_in_show',
		'description' => esc_html__( 'Toggle to show/hide LinkedIn profile link', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '0',
		'priority'    => 55
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'the_best_blog_social_insta_link',
		'label'       => esc_html__( 'Instagram', 'the-best-blog' ),
		'description' => esc_html__( 'Enter your Instagram profile URL', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => esc_url( 'http://instagram.com' ),
		'priority'    => 60,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_insta',
		'description' => esc_html__( 'Open Instagram profile link in new window', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '1',
		'priority'    => 65,
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_social_insta_show',
		'description' => esc_html__( 'Toggle to show/hide Instagram profile link', 'the-best-blog' ),
		'section'     => 'the_best_blog_social',
		'default'     => '0',
		'priority'    => 65
	);

	return $fields;
}

add_filter( 'kirki/fields', 'the_best_blog_social_customizer_fields' );

function the_best_blog_additional_customizer_fields( $fields ) {
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_show_related_posts',
		'label'       => esc_html__( 'Show Related Posts', 'the-best-blog' ),
		'description' => esc_html__( 'Toggle to show/hide related posts. Related posts are shown below content of post only', 'the-best-blog' ),
		'section'     => 'the_best_blog_related_posts',
		'default'     => '0',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'the_best_blog_show_related_posts_basis',
		'label'       => esc_html__( 'Show Related Posts Based on', 'the-best-blog' ),
		'description' => esc_html__( 'Select one of the following options. By default related posts are shown based on category.', 'the-best-blog' ),
		'section'     => 'the_best_blog_related_posts',
		'default'     => 'category',
		'priority'    => 20,
		'choices'     => array(
			'category' => esc_html__( 'Category', 'the-best-blog' ),
			'tags'     => esc_html__( 'Tags', 'the-best-blog' ),
		),
		'required'    => array(
			array(
				'setting'  => 'the_best_blog_show_related_posts',
				'operator' => '==',
				'value'    => '1',
			)
		),
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'the_best_blog_show_newsletter',
		'label'       => esc_html__( 'Enable Newsletter Sections', 'the-best-blog' ),
		'description' => sprintf( esc_html__( 'Toggle to show/hide newsletter sections. You need to install "%1$s" for this section to work.', 'the-best-blog' ), '<a href="' . esc_url( 'https://wordpress.org/plugins/mailchimp-for-wp/' ) . '" target="_blank">' . esc_html__( 'MailChimp for WordPress', 'the-best-blog' ) . '</a>' ),
		'section'     => 'the_best_blog_newsletter_sections',
		'default'     => '0',
		'priority'    => 10
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'the_best_blog_newsletter_title',
		'label'       => esc_html__( 'Newsletter Title', 'the-best-blog' ),
		'description' => esc_html__( 'Change default title for Newsletter section', 'the-best-blog' ),
		'section'     => 'the_best_blog_newsletter_sections',
		'default'     => '',
		'priority'    => 20
	);

	return $fields;
}

add_filter( 'kirki/fields', 'the_best_blog_additional_customizer_fields' );

function the_best_blog_support_customizer_fields( $fields ) {
	$pdf_link = esc_url( get_template_directory_uri() . '/assets/docs/The-Best-Blog.pdf' );
	if ( function_exists( 'get_theme_file_uri' ) ) {
		$pdf_link = esc_url( get_theme_file_uri( '/assets/docs/The-Best-Blog.pdf' ) );
	}
	$fields[] = array(
		'type'     => 'custom',
		'settings' => 'the_best_blog_support_links',
		'label'    => esc_html__( 'Support Links', 'the-best-blog' ),
		'section'  => 'the_best_blog_links',
		'default'  => sprintf( '<ul>
<li><a href="' . $pdf_link . '">%1$s</a></li>
<li><a href="' . esc_url( 'http://bestpressthemes.com/products/the-best-blog/' ) . '">%2$s</a></li>
<li><a href="' . esc_url( 'http://bestpressthemes.com/' ) . '">%3$s</a></li>
<li><a href="mailto:' . sanitize_email( 'info@bestpressthemes.com' ) . '">%4$s</a></li>
</ul>', esc_html__( 'Documentation', 'the-best-blog' ), esc_html__( 'Demo', 'the-best-blog' ), esc_html__( 'Official Website', 'the-best-blog' ), esc_html__( 'Support', 'the-best-blog' ) ),
		'priority' => 10,
	);


	return $fields;
}

add_filter( 'kirki/fields', 'the_best_blog_support_customizer_fields' );