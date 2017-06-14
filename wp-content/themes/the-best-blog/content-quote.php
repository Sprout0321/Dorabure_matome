<?php
/**
 * content-quote.php
 *
 * The default template for displaying posts with the Quote post format.
 *
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Article content -->
    <div class="entry-content" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>)">
        <blockquote>
			<?php
			if ( '' !== get_the_post_thumbnail() && is_single() ) : ?>
                <a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'medium' ); ?>
                </a>
			<?php endif;
			the_content( esc_html__( 'Continue reading &rarr;', 'the-best-blog' ) );
			wp_link_pages(); ?>
        </blockquote>
    </div> <!-- end entry-content -->
    <div class="post-content">
        <!-- Article footer -->
        <footer class="entry-footer">
            <p class="entry-meta">
				<?php
				// Display the meta information
				the_best_blog_post_meta();
				?>
            </p>
        </footer> <!-- end entry-footer -->
		<?php do_action( 'the_best_blog_before_content_end' ); ?>
    </div>
</article>