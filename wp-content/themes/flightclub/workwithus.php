<?php
/* 
Template Name: Work with us
*/
get_header();

?>
<!-- Main Container Starts -->
<div class="mainContainer">
    <!-- Start Here -->
          <?php
$banner_section = get_field('banner');
if( $banner_section ): ?>
    <section class="hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo esc_url( $banner_section['banner_image']['url'] ); ?>);">
        <div class="banner_text text-center">
            <h2><?php echo $banner_section['banner_title']; ?></h2>
            <p><?php echo $banner_section['short_description']; ?></p>
        </div>
    </section>
    <?php endif; 
    $all_section = get_field('all_section');
		if( $all_section ): ?>
     <section class="section_box background_image3 work">	
        <div class="container ">    	 
        	<div class="row">
	            <div class="col-md-12 work_block "> 
	                <div class="image-left">                    	
	                    <img src="<?php echo $all_section['first_section_image']['url']; ?>">
	                    <div class="contents ">
	                      <h4 class="trip_title"><?php echo $all_section["first_section_title"]; ?></h4>
	                		 <p class="mt-5"><?php echo $all_section["first_section_description"]; ?></p> 
	                		 <a href="<?php  echo $all_section['first_section_link'];  ?>"  class="yellow_btn mt-5 mb-30">Read More</a>
	                    </div>
	                </div>
	            </div>
        	</div>
            <div class="row">
           		<div class="col-md-4">                       
                  <h4 class="trip_title"><?php echo $all_section["second_section_title"]; ?></h4>
            		 <p class="mt-5"><?php echo $all_section["second_section_description"]; ?></p>                       
                    <a href="#" data-toggle="modal" data-target="#workwithus" class="yellow_btn mt-5 mb-30">Fill the Form</a>
                </div> 
                <div class="col-md-8">                                     	
                    <img src="<?php echo $all_section['second_section_image']['url']; ?>">                   
                </div>
            </div>
         </div>
       
    </section>
     <section class=" background_image4 work">	
        <div class="container ">    
        <div class="row mb-80">	 
            <div class="col-md-12"> 
                <div class="image-mid">                    	
                    <img src="<?php echo $all_section['third_section_image']['url']; ?>">
                    <div class="contents ">
                      <h4 class="trip_title"><?php echo $all_section["third_section_title"]; ?></h4>
                		 <p class="mt-5"><?php echo $all_section["third_section_description"]; ?></p> 
                		 <a href="#"  class="yellow_btn mt-5 mb-30">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
           		<div class="col-md-8 mt-5 mb-80">                   	
                    <img src="<?php echo $all_section['fourth_section_image']['url']; ?>">
                </div>
                    <div class="col-md-4"> 
                      <h4 class="trip_title"><?php echo $all_section["fourth_section_title"]; ?></h4>
                		 <p class="mt-5"><?php echo $all_section["fourth_section_description"]; ?></p>
                        <a href="<?php  echo $all_section['fourth_section_link'];  ?>"  class="yellow_btn mt-5 mb-30">Read More</a>
                    </div>
                </div>
            </div>
    </section>
	<?php endif; ?>
    <section class="comapny_section section_box background_image">
    
    <div class="container">
        <div class="text-center">
            <h3 class="section_title"><?php if( get_field('partners_title')): echo get_field('partners_title'); endif; ?></h3>
        </div>
        <ul class="companies_block">
            <?php  $args = array(  
                'post_type' => 'client',
                'post_status' => 'publish',
                'posts_per_page' => -1, 
                'orderby' => 'title', 
                'order' => 'ASC',
            );

            $loop = new WP_Query( $args ); 
                
            while ( $loop->have_posts() ) : $loop->the_post(); 
                $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');                 
                ?>
                <li>
                    <a href="<?php  if( get_field('link')): echo get_field('link'); endif;  ?>" ><img src="<?php echo $featured_img; ?>" alt=""></a>
                </li>
            <?php             
            endwhile;
            wp_reset_postdata(); 
            ?>
           
        </ul>
    </div>
   </section>

<!-- Modal -->
<div class="modal fade" id="workwithus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content">     
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?php echo get_template_directory_uri(); ?>/img/close.png">
        </button>
        <div class="row">
        	<div class="col-md-6">
        		<h2>Complete this form to work with us</h2>
        		<div class="kartra_optin_container45c48cce2e2d7fbdea1afc51c7c6ad26"></div><script src="https://app.kartra.com/optin/gaQGKnTekIa4"></script>
        	</div>
        	<!-- <div class="col-md-6">
        		<img src="<?php //echo get_template_directory_uri(); ?>/img/post-img.png">
        	</div> -->
        </div>
       
      </div>
     
    </div>
  </div>
</div>

</div>
<?php
get_footer();?>