<?php
/**
 * functions.php
 *
 * The functions that requires for theme functionality.
 *
 * @since 1.0.7
 */


/**
 * Load the framework
 *
 * @since 1.0.0
 */
require get_template_directory() . '/framework/index.php';

/**
 * Set up the content width value based on the theme's design
 *
 * @since 1.0.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

/**
 * Set up theme default and register various supported features
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'the_best_blog_setup' ) ) {
	function the_best_blog_setup() {

		add_theme_support( 'post-formats', array(
			'gallery',
			'image',
			'quote',
			'video',
			'audio'
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
		register_nav_menus( array(
			'main-menu'   => esc_html__( 'Main Menu', 'the-best-blog' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'the-best-blog' ),
			'quick-links' => esc_html__( 'Quick Links', 'the-best-blog' )
		) );

		/**
		 * Register the widget areas
		 */
		if ( ! function_exists( 'the_best_blog_widget_init' ) ) {
			function the_best_blog_widget_init() {
				if ( function_exists( 'register_sidebar' ) ) {
					register_sidebar( array(
						'name'          => esc_html__( 'Main Widget Area', 'the-best-blog' ),
						'id'            => 'sidebar-main',
						'description'   => esc_html__( 'Appears on posts and pages.', 'the-best-blog' ),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside><!-- end widget -->',
						'before_title'  => '<h5 class="widget-title">',
						'after_title'   => '</h5>',
					) );
				}
			}

			add_action( 'widgets_init', 'the_best_blog_widget_init' );
		}
	}
}
add_action( 'after_setup_theme', 'the_best_blog_setup' );

/**
 * Display meta information for a specific post
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'the_best_blog_post_meta' ) ) {
	function the_best_blog_post_meta() {
		echo '<ul class="entry-meta">';
		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post">' . esc_html__( 'Sticky', 'the-best-blog' ) . ' </li>';
			}

			// Get the post author.
			printf(
				'<li class="meta-author"><span class="meta-title">' . esc_html__( 'By', 'the-best-blog' ) . '</span><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

			// Get the date.
			echo '<li class="meta-date"><span class="meta-title">' . esc_html__( 'Posted On', 'the-best-blog' ) . '</span> ' . get_the_date() . ' </li>';

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"><span class="meta-title">' . esc_html__( 'Category', 'the-best-blog' ) . '</span> ' . $category_list . ' </li>';
			}

			// The tags.
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"> ' . $tag_list . ' </li>';
			}

			// Comments link.
			if ( comments_open() ) :
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( esc_html__( 'Leave a comment', 'the-best-blog' ), esc_html__( 'One comment so far', 'the-best-blog' ), esc_html__( 'View all % comments', 'the-best-blog' ) );
				echo '</span>';
				echo '</li>';
			endif;

			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( esc_html__( 'Edit', 'the-best-blog' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
		echo '</ul>';
	}
}

/**
 * Register custom fonts.
 *
 * @since 1.0.0
 */
function the_best_blog_custom_fonts_url() {
	$font_families = array( 'Ubuntu:400,500,700', 'Lato:400,700,900' );
	$query_args    = array(
		'family' => urlencode( implode( '|', $font_families ) ),
	);
	$fonts_url     = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for, e.g. 'preconnect' or 'prerender'.
 *
 * @return array
 * @since 1.0.0
 */
function the_best_blog_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'the-best-blog-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}

add_filter( 'wp_resource_hints', 'the_best_blog_resource_hints', 10, 2 );

/**
 * Load the custom scripts for the theme
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'the_best_blog_scripts' ) ) {
	function the_best_blog_scripts() {
		// Adds support for pages with threaded comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if ( function_exists( 'get_theme_file_uri' ) ) {
			wp_register_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), false, true );
			wp_register_script( 'slimmenu', get_theme_file_uri( '/assets/js/jquery.slimmenu.js' ), array( 'jquery' ), false, true );
			wp_enqueue_script( 'the-best-blog-custom-scripts', get_theme_file_uri( '/assets/js/scripts.js' ), array(
				'jquery',
				'owl-carousel',
				'slimmenu'
			), false, true );
			wp_enqueue_style( 'the-best-blog-main', get_theme_file_uri( '/assets/css/main.css' ) );
		} else {
			wp_register_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), false, true );
			wp_register_script( 'slimmenu', get_template_directory_uri() . '/assets/js/jquery.slimmenu.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'the-best-blog-custom-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(
				'jquery',
				'owl-carousel',
				'slimmenu'
			), false, true );
			wp_enqueue_style( 'the-best-blog-main', get_template_directory_uri() . '/assets/css/main.css' );
		}
		wp_enqueue_style( 'the-best-blog-fonts', the_best_blog_custom_fonts_url(), [], null );
		wp_enqueue_style( 'the-best-blog-style', get_stylesheet_uri() );
	}
}
add_action( 'wp_enqueue_scripts', 'the_best_blog_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * @since 1.0.0
 */
function the_best_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'wp_head', 'the_best_blog_pingback_header' );

function the_best_blog_author_box() { ?>
    <div class="author-bio">
        <h3><?php esc_html_e( 'About the Author', 'the-best-blog' ); ?></h3>

        <div class="avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), '80' ); ?>
        </div>
        <div class="bio-detail">
            <h4><?php the_author_posts_link(); ?></h4>

            <p><?php the_author_meta( 'description' ); ?></p>
        </div>
    </div>

	<?php
}

/**
 * Load brand link
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'the_best_blog_brand_link' ) ) {
	function the_best_blog_brand_link() {
		return esc_html__( 'designed by', 'the-best-blog' ) . '<a href="' . esc_url( 'http://bestpressthemes.com/' ) . '" target="_blank">Best Press Theme</a>';
	}
}
add_filter( 'the_best_blog_brand_link', 'the_best_blog_brand_link' );