<?php

/**
 * Returns boolean based on customizer selection whether to show related posts or not
 *
 * @return bool
 *
 * @since 1.0.0
 */
function the_best_blog_show_related_posts() {
	return (bool) get_theme_mod( 'the_best_blog_show_related_posts', 0 );
}

/**
 * Returns query arguments for related posts
 *
 * @return array
 *
 * @since 1.0.0
 */
function the_best_blog_related_post_args() {
	global $post;
	$post_id  = $post->ID;
	$based_on = esc_html( get_theme_mod( 'the_best_blog_show_related_posts_basis', 'category' ) );
	if ( $based_on == 'category' ):
		$categories   = get_the_category( $post->ID );
		$category_ids = array();
		foreach ( $categories as $individual_category ) {
			$category_ids[] = $individual_category->term_id;
		}

		$args = array(
			'category__in'        => $category_ids,
			'post__not_in'        => array( $post->ID ),
			'posts_per_page'      => 2,
			'ignore_sticky_posts' => true
		);

	else:
		$tags    = wp_get_post_tags( $post_id );
		$tag_ids = array();
		foreach ( $tags as $individual_tag ) {
			$tag_ids[] = $individual_tag->term_id;
		}

		$args = array(
			'tag__in'             => $tag_ids,
			'post__not_in'        => array( $post_id ),
			'posts_per_page'      => 2,
			'ignore_sticky_posts' => true
		);
	endif;

	return $args;
}

/**
 * Returns boolean based on customizer selection whether to show billboard or not
 *
 * @return bool
 *
 * @since 1.0.0
 */
function the_best_blog_is_billboard_enable() {
	return (bool) get_theme_mod( 'the_best_blog_show_header_billboard', 0 );
}

/**
 * Returns query arguments for billboard
 *
 * @return array
 *
 * @since 1.0.6
 */
function the_best_blog_billboard_args() {
	$args     = array(
		'posts_per_page'      => 5,
		'ignore_sticky_posts' => true
	);
	$based_on = esc_html( get_theme_mod( 'the_best_blog_show_list', 'latest' ) );
	if ( $based_on != 'latest' ):
		$args = array(
			'post_type'           => array( 'post', 'page' ),
			'post__in'            => get_theme_mod( 'the_best_blog_posts_list', array() ),
			'posts_per_page'      => 5,
			'ignore_sticky_posts' => true,
			'orderby'             => 'post__in'
		);
	endif;

	return $args;
}

/**
 * Displays billboard
 *
 * @since 1.0.0
 */
function the_best_blog_billboard() {
	$sliders = new WP_Query( the_best_blog_billboard_args() );
	if ( $sliders->have_posts() && the_best_blog_is_billboard_enable() ): ?>
        <div id="billboard" class="post-featured-slider" role="banner">
            <div class="slider-container">
				<?php while ( $sliders->have_posts() ): $sliders->the_post(); ?>
                    <div class="slide">
						<?php if ( has_post_thumbnail() ): ?>
                            <div class="img-holder"
                                 style="background-image:url('<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) ); ?>');"></div>
						<?php endif; ?>
                        <div class="billboard-text">
                            <h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="link">
								<?php esc_html_e( 'Read More', 'the-best-blog' ); ?>
                            </a>
                        </div>
                    </div>
				<?php endwhile;
				wp_reset_postdata(); ?>
            </div>
        </div>
		<?php
	endif;
}

add_action( 'the_best_blog_billboard', 'the_best_blog_billboard' );

/**
 * Change menu position based on selection
 *
 * @since 1.0.0
 */
function the_best_blog_alter_menu_position() {
	$classes = array();
	if ( ! the_best_blog_is_billboard_enable() ):
		$classes[] = 'no-billboard';
		remove_action( 'the_best_blog_billboard', 'the_best_blog_billboard' );
	endif;
	if ( get_theme_mod( 'the_best_blog_menu_sticky', 0 ) ):
		$classes[] = 'sticky-bar';
	endif;
	$classes[] = sanitize_html_class( get_theme_mod( 'the_best_blog_menu_position', 'billboard-top' ) );

	return implode( ' ', $classes );
}

add_filter( 'the_best_blog_alter_menu_position', 'the_best_blog_alter_menu_position' );

/**
 * Change newsletter section title
 *
 * @return string
 *
 * @since 1.0.0
 */
function the_best_blog_newsletter_title() {
	return esc_html( get_theme_mod( 'the_best_blog_newsletter_title', esc_html__( 'Stay updated on latest blog post', 'the-best-blog' ) ) );
}

add_filter( 'the_best_blog_newsletter_title', 'the_best_blog_newsletter_title' );

/**
 * HTML structure for newsletter section
 *
 * @since 1.0.0
 */
function the_best_blog_newsletter() {
	if ( (bool) get_theme_mod( 'the_best_blog_show_newsletter', 0 ) ):
		?>
        <div class="newsletter-subscription">
            <div class="container">
                <h4><?php echo esc_html( apply_filters( 'the_best_blog_newsletter_title', esc_html__( 'Stay updated on latest blog post', 'the-best-blog' ) ) ) ?></h4>
				<?php echo do_shortcode( '[mc4wp_form]' ); ?>
            </div>
        </div>
		<?php
	endif;
}

add_action( 'the_best_blog_newsletter', 'the_best_blog_newsletter' );

/**
 * Displays social media link on footer
 *
 * @since 1.0.0
 */
function the_best_blog_social_media_links() {
	$social = array( 'fb', 'tw', 'gplus', 'pin', 'in', 'insta' ); ?>
    <ul>
		<?php
		foreach ( $social as $s ):
			if ( (bool) get_theme_mod( 'the_best_blog_social_' . esc_attr( $s ) . '_show', 0 ) ): ?>
                <li class="icon-<?php echo esc_attr( $s ); ?>">
                    <a href="<?php echo esc_url( get_theme_mod( 'the_best_blog_social_' . esc_attr( $s ) . '_link' ) ); ?>" <?php echo (bool) get_theme_mod( 'the_best_blog_social_' . esc_attr( $s ), 1 ) ? 'target="_blank"' : ''; ?>><?php echo esc_attr( $s ); ?></a>
                </li>
			<?php endif;
		endforeach; ?>
    </ul>
	<?php
}

add_action( 'the_best_blog_social_media_links', 'the_best_blog_social_media_links' );

/**
 * Displays sidebar based on selection
 *
 * @since 1.0.0
 */
function the_best_blog_content_layout() {
	if ( is_single() ):
		return sanitize_html_class( get_theme_mod( 'the_best_blog_post_layout', 'right-sidebar' ) );
	endif;
	if ( is_page() ):
		return sanitize_html_class( get_theme_mod( 'the_best_blog_page_layout', 'right-sidebar' ) );
	endif;

	return sanitize_html_class( get_theme_mod( 'the_best_blog_default_layout', 'right-sidebar' ) );
}

add_filter( 'the_best_blog_content_layout', 'the_best_blog_content_layout' );

/**
 * Displays full width or boxed layout based on selection
 *
 * @since 1.0.0
 */
function the_best_blog_website_layout( $classes, $class ) {

	$classes[] = sanitize_html_class( get_theme_mod( 'the_best_blog_site_layout', 'full-width' ) );

	return $classes;
}

add_filter( 'body_class', 'the_best_blog_website_layout', 10, 2 );

/**
 * Displays social profile icon on footer
 *
 * @return bool
 *
 * @since 1.0.0
 */
function the_best_blog_show_social_profile_icon() {
	return (bool) get_theme_mod( 'the_best_blog_show_social_profile_icon', 0 );
}

add_filter( 'the_best_blog_show_social_profile_icon', 'the_best_blog_show_social_profile_icon' );