<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">

<div id="primary" class="hp-container">
    <!-- this div loads an instance of wordpress plugin wd_slider -->
    <div class="hp-slider"><?php wd_slider(1); ?></div><!-- .hp-slider -->

    <!-- here is the row for mailing list signup and social media links -->
    <div class="social-row">
        <div class="social-inner">
            <!-- sign up link points to about page which contains the contact form -->
            <div class="email-notice"><h3><a href="/about">Sign Up For Our Mailing List!</a></h3></div>
            <div class="social-links">
                <ul class="et-social-icons">
                    <li class="social-icon-li">
		                <a href="https://www.facebook.com/utimachinery/" class="icon">
			                <span><img src="http://www.utimachinery.com/wp-content/uploads/2017/06/facebook-30-e1497978181714.png" alt="fb link icon" height="30"></span>
		                </a>
	                </li>
                	<li class="social-icon-li">
                		<a href="http://plus.google.com/u/0/104290493933496791141?prsrc=3" class="icon">
                			<span><img src="http://www.utimachinery.com/wp-content/uploads/2017/06/google-plus-30.png" alt="g+ link icon" height="30"></span>
                		</a>
                	</li>
					<li class="social-icon-li">
                		<a href="https://www.youtube.com/user/UTImachinery" class="icon">
                			<span><img src="http://www.utimachinery.com/wp-content/uploads/2017/06/YouTube-30.png" alt="youtube link icon" height="30"></span>
                		</a>
                	</li>
					<li class="social-icon-li">
                		<a href="https://twitter.com/@utimachinery" class="icon">
                			<span><img src="http://www.utimachinery.com/wp-content/uploads/2017/06/twitter-30a.png" alt="twitter link icon
 img" height="30"></span>
                		</a>
                	</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- this div uses owl-carousel to put posts with category_name = featured into a slider -->
    <div class="hp-featured-machines-section">
        <h2 class="hp-featured-machines-label">Featured Machines</h2>
        <div class="section-inner">
             <?php
        	           $args = array (
        	                'post_type'		=> 'machine',
        	                'category_name' => 'featured',
        	                'posts_per_page' => -1
                        );
            		?>
    				<?php $featured = new WP_Query( $args ); ?>
                <div class="owl-carousel owl-theme">
    				<?php if ( $featured->have_posts() ) {
    				    while ($featured->have_posts()) { $featured->the_post(); ?>
    			          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <div class="item hp-machine-tool">
		                        <h3 class="machine-title"><?php the_field('year'); ?>&nbsp;
					                  <?php the_field('manufacturer'); ?>&nbsp;<?php the_field('model'); ?> </h3>
						                <img class="machine-list-img" src="<?php the_post_thumbnail(); ?>" >
								            <p class="machine-data"><?php the_field('adv_spec'); ?> - ID=<?php the_field('invid'); ?></p>
						            </div> <!--  .machine-tool -->
			              </a>
		             <?php } } ?>
  			        </div> <!--  .owl-carousel -->
                <?php wp_reset_postdata();  ?>
        </div>  <!--  .section-inner -->
    </div><!-- .hp-featured-machines-section -->

    <!-- this div loads the list of machine_types -->
    <div class="hp-shop-type">
        <h2 class="hp-shop-type-label">Search by Machine Type</h2>
        <div class="section-inner">

            <?php $web_desc_list = get_terms( array(
                'taxonomy'  =>  'machine_type',
                'field'     =>  'slug',
               'hide_empty' => true

            )  );  ?>

            <?php $web_desc_title = get_terms( array(
                'taxonomy'  =>  'machine_type',
                'field'     =>  'name',
               'hide_empty' => true

            )  ); ?>

            <?php $group_id = 0; ?>
                <?php foreach ($web_desc_list as $web_desc_item){ ?>
                    <?php $thelink = "/machine_type/" . $web_desc_title[$group_id]->slug ; ?>
                    <?php echo"<h3 class='web_desc-title'><a href=" . $thelink . " > " . $web_desc_title[$group_id]->name . "" . "</a></h3>"; ?>
                	<?php $group_id = $group_id + 1; ?>
                <?php }; ?>
        </div><!-- section inner -->
    </div><!-- .hp-shop-type -->

    <!-- this div loads the list of brands -->
    <div class="hp-shop-manufacturer">
        <h2 class="hp-shop-manufacturer-label">Search by Manufacturer</h2>
        <div class="section-inner">
            <?php $web_desc_list = get_terms( array(
                'taxonomy'  =>  'brand',
                'field'     =>  'slug',
               'hide_empty' => true

            )  );  ?>

            <?php $web_desc_title = get_terms( array(
                'taxonomy'  =>  'brand',
                'field'     =>  'name',
               'hide_empty' => true

            )  ); ?>

            <?php $group_id = 0; ?>
                <?php foreach ($web_desc_list as $web_desc_item){ ?>
                    <?php $thelink = "/brand/" . $web_desc_title[$group_id]->slug ; ?>
                    <?php echo"<h3 class='web_desc-title'><a href=" . $thelink . " > " . $web_desc_title[$group_id]->name . "" . "</a></h3>"; ?>
                	<?php $group_id = $group_id + 1; ?>
                <?php }; ?>
        </div><!-- section inner -->
    </div><!-- .hp-shop-manufacturer -->

	</div><!-- #primary -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
