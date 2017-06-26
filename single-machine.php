<?php
	get_header();
	$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );
	$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
?>

<div id="main-content">
	<div id="primary"  class="machine-container">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
				<h1 class="entry-title"><?php the_title(); ?></h1>
  			<div class="entry-content">
	      	<div class="extra-thumbs">
            <?php echo do_shortcode("[gallery link='file' size='thumbnail']"); ?>
          </div>
          <h1 class="machine-title"><?php the_title(); ?></h1>
        	<?php $mach_id = get_field('invid'); ?>
        	<?php
      			$specifications = new WP_Query( array(
    					'post_type'	    	=> 'specification',
    					'posts_per_page' 	=> -1,
    					'tag'	        	=> $mach_id,
  				    'meta_key'          => 'id',
              'order_by'          => 'meta_value',
              'order'             => 'ASC',
      				)); ?>
            <div class="specs-list-single">
              <h3 class="specs-title">Specifications</h3>
  						<table>
    						<colgroup>
    						    <col>
    						    <col>
    						    <col>
    						 </colgroup>
    						<?php while ($specifications ->have_posts()) : $specifications ->the_post(); ?>
    							<?php if ( get_post_meta( $post->ID, 'description', true ) ) : ?>
										<tr>
          					  <td width="80">
												<?php echo the_field('groupnames')?>
								      </td>
											<td width="250">
												<?php echo the_field('description')?>
											</td>
											<td width="120">
												<?php echo the_field('specvalues')?>
											</td>
										</tr>
									<?php endif; ?>
									<?php if ( get_post_meta( $post->ID, 'equippedwith', true ) ) : ?>
										<tr>
											<td>
												<?php echo the_field('groupnameew')?>
											</td>
										   <td>
												<?php echo the_field('equippedwith')?>
											</td>
											<td></td>
         						</tr>
									<?php endif; ?>
    						<?php endwhile; ?>
              	<?php wp_reset_postdata(); ?>
    					</table>
           	</div> <!--  .specs-list -->
           	<div class="contact-form-area">
							<h2 class="form-title">Request for Proposal</h2>
              <?php echo do_shortcode('[contact-form-7 id="7045" title="Contact form 1"]'); ?>
          	</div>
        	</div> <!-- .entry-content -->
		    </article> <!-- .et_pb_post -->
	    <?php endwhile; ?>
		</div> <!-- .container -->
	</div>

<?php get_footer(); ?>
