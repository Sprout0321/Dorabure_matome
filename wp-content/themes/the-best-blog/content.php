<?php
/**
 * content.php
 *
 * The default template for displaying content.
 *
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Article header -->
	<?php
	// If the post has a thumbnail and it's not password protected
	// then display the thumbnail
	if ( has_post_thumbnail() && ! post_password_required() ) : ?>
        <figure class="post-media"><?php the_post_thumbnail(); ?></figure>
	<?php endif; ?>
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

        <!-- Article content -->
        <div class="entry-content">
			<?php
			if ( is_search() ):
				the_excerpt();
			else:
				the_content( esc_html__( 'Read more', 'the-best-blog' ) );

				wp_link_pages();
			endif; ?>
        </div>
        <!-- end entry-content -->
		<?php do_action( 'the_best_blog_before_content_end' ); ?>
    </div>
</article>