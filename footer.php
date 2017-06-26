<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix"><span style="float:left; color: white;"><?php echo wpb_copyright(); ?>&nbsp;</span>
						<?php
							if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
								get_template_part( 'includes/social_icons', 'footer' );
							}
							echo et_get_footer_credits();
						?>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->
<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>
<?php wp_footer(); ?>
	<script type="text/javascript" src="/wp-content/themes/divi-master/owlcarousel/dist/owl.carousel.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
		jQuery(".owl-carousel").owlCarousel(
	  {   loop:true,
	      dotsEach:true,
	      items:2,
	      margin:10,
	      nav:true,
	 			responsive:{
	        0:{
	            items:1
	        },
	        800:{
	            items:2
	        }
	    	}});
			});
	</script>
</body>
</html>
