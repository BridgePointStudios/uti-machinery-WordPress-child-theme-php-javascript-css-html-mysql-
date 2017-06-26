<?php
	get_header();
?>
<div id="main-content">
	<div id="primary" class="taxonomy-container">
		<?php if ( have_posts() ) : ?>
			<div class="page-header">
				?php
					echo '<h1 class="page-title">' . single_cat_title( '', false ) . '</h1>';
				?>
			</div><!-- .page-header -->
		<?php endif; ?>
		<?php
		if ( have_posts() ): query_posts($query_string.'&posts_per_page=-1'.'&meta_key=manufacturer&orderby=meta_value&order=ASC');
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', get_post_format() ); ?>

				<div class="machine-tool">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<h3 class="machine-title"><?php the_field('year'); ?>&nbsp;
						<?php the_field('manufacturer'); ?>&nbsp;<?php the_field('model'); ?> </h3>
						<img class="machine-list-img" src="<?php the_post_thumbnail(); ?>" >
						<p class="machine-data"><?php the_field('adv_spec'); ?> -ID=<?php the_field('invid'); ?></p>
					</a>
				</div> <!--  .machine-tool -->
			<?php	endwhile;
		endif; wp_reset_query();?>
	</div><!-- #primary -->
</div>

<?php get_footer();
