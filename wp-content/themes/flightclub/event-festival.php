<?php
/* 
Template Name: Event and Festivals
*/
get_header();

?>
<!-- Main Container Starts -->
<div class="mainContainer events">
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
    <?php endif; 
    $first_section_image = get_field('first_section_image');
	if( $first_section_image ):
		?>  
   <section class="section_box background_image">   		
        <div class="container ">
        	 <div class="row ">
		   		     <div class="col-md-6 mb-30">                   	
		            <img src='<?php echo $first_section_image["url"]; ?>' class="max-5">
		          </div>
	            <div class="col-md-6 content-middle"> 
	              <h4 class="trip_title"><?php echo get_field('first_title'); ?></h4>
                <p class=""><?php echo get_field('first_description'); ?> </p> 
               
	            </div>
              <div class="col-md-12">
               <p  ><?php echo get_field('first_description_2'); ?> </p> 
             </div>
		     </div>
  </div>
</section>
       <?php endif; ?>
        
<section class="footer-section" style="background: url(<?php echo home_url(); ?>/wp-content/uploads/2021/04/Group-4001.jpg);">       
        <div class="container">
          <div class="row ">
            <div class="col-md-7 mt-5 mb-80">
              <h4>Need Assistance Planning your next Destination Event?
Contact Flight Club VIP to Schedule a Free Consultation.
</h4>
            </div>
            <div class="col-md-2 ">
            </div>
            <div class="col-md-3 mt-5 text-right">
              <a class="yellow_btn white-bg" href="<?php echo home_url(); ?>/discovery-form/">Start your journey</a>
            </div>
          </div> 
        </div>
    </section>
    <?php
    $second_section_image = get_field('second_section_image');
	if( $second_section_image ):
		?>  
    <section class="section_box background_image">  
     <div class="container ">
	        <div class="row mt-5"> 
           		<div class="col-md-6 content-middle">                       
                  <h4 class="trip_title"><?php echo get_field('second_title'); ?></h4>
	                <p class=""><?php echo get_field('second_description'); ?> </p> 
                </div> 
                <div class="col-md-6 mb-30">
               	 	<img src="<?php echo $second_section_image["url"]; ?>"  class="max-5"> 
                </div>
                <div class="col-md-12">
                  <p><?php echo get_field('second_description_2'); ?> </p>
                </div>
            </div>
        </div>
    </section>
     <?php endif; ?>
</div>

<?php
get_footer();?>