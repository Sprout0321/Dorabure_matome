<?php
/**
 * footer.php
 *
 * The template for displaying the footer.
 *
 * @since 1.0.0
 */
?>

<!-- FOOTER -->
<div id="footer-section">
	<?php do_action( 'the_best_blog_newsletter' ); ?>
    <div class="footer-navigation" role="contentinfo">
        <div class="container">
            <div class="footer-menu alignleft">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu',
					'menu_class'     => 'menu',
					'depth'          => 1
				) ); ?>
            </div>
			<?php if ( apply_filters( 'the_best_blog_show_social_profile_icon', 0 ) ): ?>
                <div class="social-media alignright">
                    <h4><?php esc_html_e( 'Follow us on', 'the-best-blog' ) ?></h4>
					<?php do_action( 'the_best_blog_social_media_links' ); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
    <div class="copyright-info">
        <div class="container">
            <div class="copyright alignleft"><?php printf( esc_html__( 'Copyright &copy; %1$s', 'the-best-blog' ), esc_html( date( 'Y' ) ) ); ?>
                <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> <?php esc_html_e( 'All Right Reserved.', 'the-best-blog' ); ?>
            </div>
            <div class="author-info alignright"><?php echo apply_filters( 'the_best_blog_brand_link', '' ); ?></div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>