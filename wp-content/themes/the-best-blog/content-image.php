<?php
/**
 * content-image.php
 *
 * The default template for displaying content of image post format
 *
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Article header -->
    <div class="post-media">
		<?php if ( '' !== get_the_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium' ); ?>
            </a>
		<?php endif; ?>

		<?php if ( is_single() || '' === get_the_post_thumbnail() ) :
			the_content( esc_html__( 'Continue reading &rarr;', 'the-best-blog' ) );
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
    </div>
</article>