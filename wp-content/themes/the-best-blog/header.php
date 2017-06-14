<?php
/**
 * header.php
 *
 * The header for the theme.
 *
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Header Section -->
<div id="header-section"
     class="<?php echo esc_attr( apply_filters( 'the_best_blog_alter_menu_position', 'billboard-top' ) ); ?>">
    <!-- Billboard Section -->
	<?php
	if ( is_home() && is_front_page() ):
		do_action( 'the_best_blog_billboard' );
	endif; ?>
    <!-- End Billboard Section -->
    <!-- Site Header -->
    <div id="site-header">
        <div class="container">
            <!-- Either Logo or Text. Use logo if image is provided else use the one with <h1>. -->
			<?php if ( has_custom_logo() ): ?>
				<?php the_custom_logo(); ?>
			<?php else: ?>
                <h1>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>
                </h1>
			<?php endif; ?>
            <nav id="main-navigation" class="top-bar" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'main-menu',
					'menu_class'      => 'menu',
					'container_class' => 'primary-menu'
				) ); ?>
                <div class="site-search">
                    <div class="icon-search"><?php esc_html_e( 'Search', 'the-best-blog' ); ?></div>
					<?php get_search_form(); ?>
                </div>
            </nav>
        </div>
    </div>
    <!-- End Site Header -->
</div>
<!-- End Header Section -->
