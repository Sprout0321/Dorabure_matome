<?php
/**
 * content-audio.php
 *
 * The default template for displaying content of audio post format
 *
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Article header -->
    <div class="post-media">
		<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$audio   = false;
		if ( false === strpos( $content, 'wp-playlist-script' ) ):
			$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
		endif;
		if ( ! is_single() ) :
			if ( ! empty( $audio ) ) :
				foreach ( $audio as $audio_html ):
					echo $audio_html;
				endforeach;
			endif;
		endif;
		if ( '' !== get_the_post_thumbnail() && is_single() ) : ?>
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium' ); ?>
            </a>
		<?php endif;
		if ( is_single() || empty( $audio ) ) :
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