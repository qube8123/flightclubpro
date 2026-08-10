<?php
/* 
Template Name: Meetings & Incentives
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
   <section class="section_box background_image2 ">   		
        <div class="container ">
        	 <div class="row">
		   		<div class="col-md-6">                   	
		            <img src='<?php echo $first_section_image["url"]; ?>'>
		        </div>
	            <div class="col-md-6 content-middle"> 
	              <h4 class="trip_title"><?php echo get_field('first_title'); ?></h4>
                  <p class="mt-5"><?php echo get_field('first_description'); ?> </p>
	            </div>                
		     </div>
        </div>
    </section>
    <?php endif;     
	 ?>
    <section class="section_box bgtil" >  
        <div class="container">
            <div class="row "> 
                <div class="col-md-12 content-middle">                       
                  <h4 class="trip_title mt-5"><?php echo get_field('second_title'); ?></h4>
                  <div class="services mt-5" >
                    <?php for ($i=1; $i<9; $i++) {  $service = "service_".$i; ?>
                        <div class="service-list"><!-- <div class="index">0<?php echo $i; ?></div> --><p><?php echo get_field($service); ?></p></div>
                    <?php } ?>
                  </div>
                   
                </div> 
            </div>
        </div>
    </section>
    <section class="section_box white-background" >  
     <div class="container">
         <p class=" border-till"><?php echo get_field('second_description'); ?></p> 
            <div class="row "> 
                <div class="col-md-3"></div>
                <div class="col-md-6 content-middle"> 

                  <h4 class="trip_title text-center mt-5"><?php echo get_field('third_title'); ?></h4>
                  <p class="mt-5 text-center"><?php echo get_field('third_description'); ?></p> 
                </div> 
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();?>