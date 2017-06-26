
<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<div class="search-info">
					<h1 class="search-title">Search Results for: "<?php echo $s ?>"</h1>
				</div>
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							$post_format = et_pb_post_format(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
								<?php
									$thumb = '';
									$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );
									$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
									$classtext = 'et_pb_post_main_image';
									$titletext = get_the_title();
									$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
									$thumb = $thumbnail["thumb"];
									et_divi_post_format_content();
									if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) {
										if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) :
											printf(
												'<div class="et_main_video_container">
													%1$s
												</div>',
												$first_video
											);
										elseif ( 'gallery' === $post_format ) :
											et_gallery_images();
									elseif ( 'on' == et_get_option( 'divi_thumbnails_index', 'on' ) && '' !== $thumb  ) : ?>
										<a href="<?php the_permalink(); ?>">
											<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
										</a>
									<?php endif; } ?>
									<?php if ( ! in_array( $post_format, array( 'link', 'audio', 'quote', 'gallery' ) ) ) : ?>
										<?php if ( ! in_array( $post_format, array( 'link', 'audio' ) ) ) : ?>
							   	    <?php if (  get_post_type() == 'machine' ) : ?>
		    								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
													<div class="machine-tool">
														<h2 class="machine-title"><?php the_field('year'); ?>&nbsp; <?php the_field('manufacturer'); ?>&nbsp;<?php the_field('model'); ?> </h2>
													</div> <!--  .machine-tool -->
			                	</a>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
							</article> <!-- .et_pb_post -->
						<?php endwhile;
						if ( function_exists( 'wp_pagenavi' ) )
							wp_pagenavi();
						else
							get_template_part( 'includes/navigation', 'index' );
					else :
						get_template_part( 'includes/no-results', 'index' );
					endif;
				?>
			</div> <!-- #left-area -->
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
