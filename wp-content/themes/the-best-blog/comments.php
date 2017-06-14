<?php
/**
 * comments.php
 *
 * The template for displaying comments.
 *
 * @since 1.0.0
 */
?>

<?php
// If the post is password protected, display info text and return.
if ( post_password_required() ) : ?>
    <p>
		<?php
		esc_html_e( 'This post is password protected. Enter the password to view the comments.', 'the-best-blog' );

		return;
		?>
    </p>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
    <!-- Comments Area -->
    <div class="comments-area" id="comments">
        <h3 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ):
				/* translators: %s: post title */
				printf( _x( 'One comment to &ldquo;%s&rdquo;', 'comments title', 'the-best-blog' ), get_the_title() );
			else:
				printf(
				/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Comment to &ldquo;%2$s&rdquo;',
						'%1$s Comments to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'the-best-blog'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			endif; ?>
        </h3>

        <ol class="comments">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 80,
			) ); ?>
        </ol>

		<?php
		// If the comments are paginated, display the controls.
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="comment-nav" role="navigation">
                <p class="comment-nav-prev">
					<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'the-best-blog' ) ); ?>
                </p>

                <p class="comment-nav-next">
					<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'the-best-blog' ) ); ?>
                </p>
            </nav> <!-- end comment-nav -->
		<?php endif; ?>

    </div> <!-- end comments-area -->
<?php endif; ?>
<div class="comment-form-container">
	<?php if ( ! comments_open() ) : ?>
        <p class="no-comments">
			<?php esc_html_e( 'Comments are closed.', 'the-best-blog' ); ?>
        </p>
	<?php else: ?>
		<?php comment_form( 'label_submit=submit comment' ); ?>
	<?php endif; ?>
</div> <!-- end comments-area -->