<?php
	get_header();
?>
<div id="main-content">
	<div id="primary" class="custom-container">
    <div class="hp-shop-type">
      <h2 class="hp-shop-type-label">Shop by Machine Type</h2>
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
	        <?php echo"<h3 class='web_desc-title'><a href=" . $thelink . " > " . $web_desc_title[$group_id]->name . "</a></h3>"; ?>
	      	<?php $group_id = $group_id + 1; ?>
	      <?php }; ?>
  		</div><!-- section inner -->
    </div><!-- .hp-shop-type -->
	</div><!-- #primary -->
</div>

<?php get_footer();
