<?php
/* 
Template Name: Archives
*/
get_header();

?>
<!-- Main Container Starts -->
<div class="mainContainer">
    <!-- Start Here -->
          <?php
$banner_section = get_field('banner');
if( $banner_section ): ?>
    <section class="hero_banner" style="background-image:  linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo esc_url( $banner_section['banner_image']['url'] ); ?>);">
        <div class="banner_text text-center">
            <h2><?php echo $banner_section['banner_title']; ?></h2>
            <p><?php echo $banner_section['short_description']; ?></p>
        </div>
    </section>
    <?php endif; ?>  
   <section class="section_box background_image2">
   		
        <div class="container ">
        	<div class="text-center">
           		 <h3 class="section_title"><?php if(get_field('featured_title')): echo get_field('featured_title'); endif; ?></h3>
        	</div>

        	<div class="carousel" data-timer="none">
				<div class="carousel-deck">
					<?php  $args = array(
					        'posts_per_page' => 5,
					        'order' => 'DESC',
					        'meta_key' => 'meta-checkbox',
					        'meta_value' => 'yes'
					    );
					    $featured = new WP_Query($args);if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); 
						$featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');					?>

					<div class="carousel-slide">    
						<div class="col-md-12 ">
	                        <div class="image-left">
	                            <img src="<?php echo $featured_img; ?>">
	                            <div class="contents">
	                                 <div class="blog_date"><img src="<?php echo get_template_directory_uri(); ?>/img/Group_3870.png" > <?php echo get_the_date(); ?></div>
	                                <h4 class="trip_title"><?php echo get_the_title();?></h4>
	                                  <p class="trip_para">  <?php  echo substr(get_the_content(), 0, 100); ?> </p>
	                                  <a href="<?php echo get_the_permalink();?>" class="yellow_btn ">Read More</a>	                              
	                            </div>
	                        </div>
	                    </div>
                	</div>

	                	<?php
							endwhile; 
							endif; 

							wp_reset_postdata();?>

		      
				</div>
			</div>
        </div>
    </section>
      <section class="section_box travel_section">
      	
        <div class="container ">
        	<div class="text-center">
           		 <h3 class="section_title"><?php if(get_field('blog_title')): echo get_field('blog_title'); endif; ?></h3>
        	</div>
        	<div class="row"> 
           <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					    $args = array(
					  'order' => 'DESC',
					  'paged' => $paged,
					  'orderby' => 'ID',
					  'post_type' => 'post',
					  'post_status' => 'publish',
					  'posts_per_page' => 4,
					  'ignore_sticky_posts' => 1
					);

					$query = new WP_Query($args);

					while ( $query->have_posts() ) : $query->the_post();
					  $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');
					
					 ?>
            
                <div class="col-md-6 trip_block blog_block"> 
                    <div class="image-mid">
                    	
                        <img src="<?php echo $featured_img; ?>">
                        <div class="contents text-center">
                           <div class="blog_date"><img src="<?php echo get_template_directory_uri(); ?>/img/Group_3870.png" > <?php echo get_the_date(); ?></div>
                            <h4 class="trip_title "><?php echo get_the_title();?></h4>                             
                            <a href="<?php echo get_the_permalink();?>" class="yellow_btn mt-5">Read More</a>

                        </div>
                    </div>
                </div>
                <?php endwhile;

					 echo pagination($query->max_num_pages);
					?>
                
            </div>

        </div>
    </section>


</div>

<?php
get_footer();?>