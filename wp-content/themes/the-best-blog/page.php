<?php
/**
 * page.php
 *
 * The template for displaying all pages.
 *
 * @since 1.0.7
 */
?>

<?php get_header(); ?>
    <div class="main-content" role="main">
        <div class="container <?php echo sanitize_html_class( apply_filters( 'the_best_blog_content_layout', 'right-sidebar' ) ); ?>">
            <main class="site-content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <!-- Article header -->
                        <header class="entry-header"> <?php
							// If the post has a thumbnail and it's not password protected
							// then display the thumbnail
							if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                                <figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>

                            <h1><?php the_title(); ?></h1>
                        </header>
                        <!-- end entry-header -->

                        <!-- Article content -->
                        <div class="entry-content">
							<?php the_content(); ?>

							<?php wp_link_pages(); ?>
                        </div>
                        <!-- end entry-content -->

                        <!-- Article footer -->
                        <footer class="entry-footer">
							<?php
							if ( is_user_logged_in() && current_user_can( 'edit_post', get_the_ID() ) ):
								echo '<p>';
								edit_post_link( esc_html__( 'Edit', 'the-best-blog' ), '<span class="meta-edit">', '</span>' );
								echo '</p>';
							endif; ?>
                        </footer>
                        <!-- end entry-footer -->
                    </article>

					<?php comments_template(); ?>
				<?php endwhile; ?>
            </main>
			<?php
			if ( apply_filters( 'the_best_blog_content_layout', 'right-sidebar' ) != 'no-sidebar' ):
				get_sidebar();
			endif; ?>
        </div>
    </div><!-- end main-content -->

<?php get_footer(); ?>