<?php
/**
 * category.php
 *
 * The template for displaying category pages.
 *
 * @since 1.0.7
 */
?>
<?php get_header(); ?>
    <div class="main-content" role="main">
        <div class="container <?php echo sanitize_html_class( apply_filters( 'the_best_blog_content_layout', 'right-sidebar' ) ); ?>">
            <main class="site-content" role="main">
				<?php if ( have_posts() ) : ?>
                    <header class="page-header">
						<?php the_archive_title( '<h1>', '</h1>' ); ?>
						<?php the_archive_description( '<p>', '</p>' ); ?>
                    </header>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php get_template_part( 'template-parts/parts', 'paging' ); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
            </main>
			<?php
			if ( apply_filters( 'the_best_blog_content_layout', 'right-sidebar' ) != 'no-sidebar' ):
				get_sidebar();
			endif; ?>
        </div>
    </div><!-- end main-content -->

<?php get_footer(); ?>