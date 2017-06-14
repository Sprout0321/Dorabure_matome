<?php
/**
 * sidebar.php
 *
 * The main sidebar.
 *
 * @since 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
    <div class="sidebar" role="complementary">
		<?php dynamic_sidebar( 'sidebar-main' ); ?>
    </div> <!-- end sidebar -->
<?php endif; ?>