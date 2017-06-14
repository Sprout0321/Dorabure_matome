<?php
/**
 * single.php
 *
 * The template for displaying single posts.
 *
 * @since 1.0.7
 */
?>

<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="main-content" role="main">
        <div class="container <?php echo sanitize_html_class( apply_filters( 'the_best_blog_content_layout', 'right-sidebar' ) ); ?>">
            <main class="site-content" role="main">
				<?php
				get_template_part( 'content', get_post_format() );
				the_best_blog_author_box();
				if ( the_best_blog_show_related_posts() ):
					get_template_part( 'template-parts/parts', 'related-posts' );
				endif;
				comments_template(); ?>
            </main>
			<?php
			if ( apply_filters( 'the_best_blog_content_layout', 'right-sidebar' ) != 'no-sidebar' ):
				get_sidebar();
			endif; ?>
        </div>
    </div><!-- end main-content -->
<?php endwhile; ?>
<?php get_footer(); ?>