<?php
/**
 * Template contains structure for related post
 *
 * @since 1.0.0
 */
?>
<div class="related-articles">
	<h3><?php esc_html_e( 'Related Article', 'the-best-blog' ); ?></h3>

	<div class="article-list">
		<?php
		$related = new WP_Query( the_best_blog_related_post_args() );
		if ( $related->have_posts() ):
			while ( $related->have_posts() ): $related->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="article">
					<?php the_title( '<h4>', '</h4>' ); ?>
					<div class="date"><?php echo get_the_date(); ?></div>
				</a>
			<?php endwhile;
			wp_reset_postdata(); ?>
		<?php else: ?>
			<p><?php esc_html_e( 'No related articles were found.', 'the-best-blog' ); ?></p>
		<?php endif; ?>
	</div>
</div>