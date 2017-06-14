<?php
/**
 * 404.php
 *
 * The template for displaying 404 pages.
 *
 * @since 1.0.0
 */
?>

<?php get_header(); ?>
    <div class="main-content" role="main">
        <div class="container">
            <main class="no-page" role="main">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1><?php esc_html_e( 'Error 404 - Nothing Found', 'the-best-blog' ); ?></h1>

                    <p><?php esc_html_e( 'It looks like nothing was found here. Maybe try a search?', 'the-best-blog' ); ?></p>
					<?php get_search_form(); ?>
                </article>
            </main>
        </div>
    </div>
<?php get_footer(); ?>