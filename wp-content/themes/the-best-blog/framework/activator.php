<?php

require_once get_template_directory() . '/framework/activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'the_best_blog_register_required_plugins' );
function the_best_blog_register_required_plugins() {
	$plugins = array(
		array(
			'name' => 'MailChimp for WordPress',
			'slug' => 'mailchimp-for-wp',
		),
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
	);

	$config = array(
		'id'           => 'the-best-blog-plugins',
		'default_path' => '',
		'menu'         => 'the-best-blog-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'the-best-blog' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'the-best-blog' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'the-best-blog' ),
			// %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'the-best-blog' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'the-best-blog'
			),
			// %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'the-best-blog'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'the-best-blog'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'the-best-blog'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'the-best-blog' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'the-best-blog' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'the-best-blog' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'the-best-blog' ),
			// %1$s = plugin name(s).
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'the-best-blog' ),
			// %1$s = plugin name(s).
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'the-best-blog' ),
			// %s = dashboard link.
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'the-best-blog' ),

			'nag_type' => 'updated',
			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
	);

	tgmpa( $plugins, $config );
}
