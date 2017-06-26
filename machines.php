<?php
/*
Template Name: Machines
*/
get_header(); ?>

<div id="main-content">
  <div id="primary" class="machines-container">
    <?php $web_desc_list = get_terms( array(
      'taxonomy'  =>  'machine_type',
      'field'     =>  'slug',
      'hide_empty' => true
      ) );
    ?>
    <?php $web_desc_title = get_terms( array(
      'taxonomy'  =>  'machine_type',
      'field'     =>  'name',
      'hide_empty' => true
      ) );
    ?>
    <?php $group_id = 0; ?>
    <?php foreach ($web_desc_list as $web_desc_item){ ?>
      <?php echo"<h2 class='group-title'>" . $web_desc_title[$group_id]->name . "</h2>"; ?>
	    <?php $group_id = $group_id + 1; ?>
	    <?php if ( have_posts() ) : ?>
			  <?php	$args = array(
          'post_type'		      => 'machine',
          'posts_per_page'   	=> -1,
          'meta_key'          => 'manufacturer',
          'order_by'          => 'meta_value',
          'order'             => 'ASC',
          'tax_query'		      => array(
            array(
              'taxonomy'	=> 'machine_type',
              'field'		=> 'slug',
              'terms'		=> $web_desc_item
					    )
            )
	        );
          $machines = new WP_Query( $args ); ?>
	        <?php while ($machines->have_posts()) : $machines->the_post(); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  						<div class="machine-tool">
  							<h2 class="machine-title"><?php the_field('year'); ?>&nbsp; <?php the_field('manufacturer'); ?>&nbsp;<?php the_field('model'); ?> </h2>
  							<img class="machine-list-img" src="<?php the_post_thumbnail(); ?>" >
								<p class="machine-data"><?php the_field('adv_spec'); ?> - ID=<?php the_field('invid'); ?></p>
			        </div> <!--  .machine-tool -->
            </a>
	        <?php endwhile; ?>
        <?php endif; wp_reset_query(); ?>
      <?php };  ?>
		<?php //get_sidebar(); ?>
  </div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
