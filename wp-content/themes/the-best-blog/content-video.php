<?php
/**
 * content-video.php
 *
 * The default template for displaying content of video post format
 *
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Article header -->
    <div class="post-media">
		<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$video   = false;

		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		}

		if ( ! is_single() ) :
			if ( ! empty( $video ) ) :
				foreach ( $video as $video_html ):
					echo $video_html;
				endforeach;
			endif;
		endif;
		if ( '' !== get_the_post_thumbnail() && is_single() ) : ?>
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium' ); ?>
            </a>
		<?php endif;
		if ( is_single() || empty( $video ) ) :
			the_content( esc_html__( 'Read more', 'the-best-blog' ) );
			wp_link_pages();
		endif; ?>
    </div>
    <div class="post-content">
        <header class="entry-header">
			<?php
			// If single page, display the title
			// Else, we display the title in a link
			if ( is_single() ) : ?>
                <h1 class="post-title entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
                <h2 class="post-title entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
			<?php endif; ?>

            <div class="entry-meta">
				<?php
				// Display the meta information
				the_best_blog_post_meta();
				?>
            </div>
        </header>
        <!-- end entry-header -->
		<?php do_action( 'the_best_blog_before_content_end' ); ?>
    </div>
</article>