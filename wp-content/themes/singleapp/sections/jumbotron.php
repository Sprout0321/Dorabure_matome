<?php
/**
 *
 * @package ThemeGrill
 * @subpackage SingleApp
 * @since SingleApp 1.0
 */
?>
<?php
$menu_id = 'home';
if ( singleapp_theme_style() == 'fullpage' ) { 
	$menu_id = '';
}?>

<div id="<?php echo esc_attr( $menu_id ); ?>" class="home-slider tg-fullpage-section">


	<div id="topimage">
		 <?php if ( singleapp_theme_style() == 'onepage' ) : ?>
		 <?php singleapp_admin_header_image(); ?>
		 <div class="overlay"></div>
		 <?php endif; ?>
	</div>

	<!-- <video id="myvideo" poster="http://192.168.1.13:8080/wordpress/wp-content/uploads/2017/06/Snip20170627_26.png" autoplay muted>
		<source src="http://192.168.1.13:8080/wordpress/wp-content/uploads/2017/06/dragon_blade_1920_1080_low.mp4" type="video/mp4">
		<source src="http://192.168.1.13:8080/wordpress/wp-content/uploads/2017/06/dragon_blade_1920_1080_low.ogv" type="video/ogg">
		<source src="http://192.168.1.13:8080/wordpress/wp-content/uploads/2017/06/dragon_blade_1920_1080.webm" type="video/webm">
		Your browser doesn't support HTML5 video tag.
		<div class="overlay"></div>
    </video> -->

	<script>
		// document.getElementById("myvideo").onended = function() {myFunction()};
		// function myFunction() {
		// 	document.getElementById("myvideo").style.display = "none";
		//     document.getElementById("banner-id").style.display = "block";
		//     document.getElementById("topimage").style.display = "block";
		// }
		// console.log("test log");
	</script>

	<script >
		jQuery(function() {
			jQuery(window).scroll(function() {
				console.log(jQuery(this).scrollTop());
			    if(jQuery(this).scrollTop() > 570) {
					jQuery( ".logoimageclass" ).removeClass("fixed-pos");
					jQuery( ".logoimageclass" ).addClass("unfixed-pos");
			    } else {
					jQuery( ".logoimageclass" ).removeClass("unfixed-pos");
					jQuery( ".logoimageclass" ).addClass("fixed-pos");
			    }
			});
		});

		function removevideo() {
			console.log("Click2");
			jQuery("#myvideo").hide();
		    jQuery("#banner-id").css("display", "block");
		    jQuery("#topimage").css("display", "block");
		}

	</script>

	<div class="banner-wrapper" id="banner-id">
		<div class="banner-container">
			<?php if ( get_theme_mod( 'singleapp_jumbotron_thumb' ) != '' ) : ?>
				<div class="iphone-screen tg-screenshot">
                    <!-- <img src="<?php echo esc_url( get_theme_mod( 'singleapp_jumbotron_thumb','#' ) );?>"> -->
                    <img id="iphone-screen-img" src="http://192.168.1.13:8080/wordpress/wp-content/uploads/2017/05/img_MV01.png">
				</div><!-- .iphone-screen end -->
			<?php endif; ?>

			<div class="banner-inner-content fullpage-content">
				<?php if ( get_theme_mod( 'singleapp_jumbotron_title' ) != '' ) : ?>
					<h3 class="banner-title"><?php echo wp_kses( get_theme_mod( 'singleapp_jumbotron_title'), array('span' => array('class' => array() ) ) ) ;?></h3>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'singleapp_jumbotron_desc' ) != '' ) : ?>
					<div class="banner-content">
						<?php echo esc_textarea( get_theme_mod( 'singleapp_jumbotron_desc') ) ;?>
					</div><!-- .banner-content end -->
				<?php endif; ?>
				<div class="banner-btn-wrapper">
					<?php if ( get_theme_mod( 'singleapp_jumbotron_btn_text1' ) != '' ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'singleapp_button_url1','#' ) ); ?>">
							<?php if( get_theme_mod( 'singleapp_button_icon1' ) && singleapp_theme_style() == 'onepage' ) : ?>
                           		<i class="fa <?php echo esc_attr( get_theme_mod( 'singleapp_button_icon1' ) );?>"></i>
                        	<?php endif; ?>
							<div class="btn-text">
								<h4><?php echo wp_kses( get_theme_mod( 'singleapp_jumbotron_btn_text1'), array('span' => array('class' => array() ) ) ) ; ?></h4>
							</div><!-- .btn-text end -->
							<?php if( get_theme_mod( 'singleapp_button_icon1' ) && singleapp_theme_style() == 'fullpage' ) : ?>
                           		<i class="fa <?php echo esc_attr( get_theme_mod( 'singleapp_button_icon1' ) );?>"></i>
                        	<?php endif; ?>
						</a>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'singleapp_jumbotron_btn_text2' ) != '' ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'singleapp_button_url2','#' ) ); ?>">
							<?php if( get_theme_mod( 'singleapp_button_icon2' ) && singleapp_theme_style() == 'onepage' ) : ?>
                           		<i class="fa <?php echo esc_attr( get_theme_mod( 'singleapp_button_icon2' ) );?>"></i>
                        	<?php endif; ?>
							<div class="btn-text">
								<h4><?php echo wp_kses( get_theme_mod( 'singleapp_jumbotron_btn_text2'), array('span' => array('class' => array() ) ) ) ; ?></h4>
							</div><!-- .btn-text end -->
							<?php if( get_theme_mod( 'singleapp_button_icon2' ) && singleapp_theme_style() == 'fullpage' ) : ?>
                           		<i class="fa <?php echo esc_attr( get_theme_mod( 'singleapp_button_icon2' ) );?>"></i>
                        	<?php endif; ?>
						</a>
					<?php endif; ?>
					
				</div><!-- .banner-btn-wrapper end -->
			</div><!-- .banner-inner-content end -->
		</div><!-- .banner-container -->
	</div><!-- .banner-wrapper end -->

</div><!-- .home-slider end -->

