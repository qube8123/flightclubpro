<?php
/* 
Template Name: Our Story
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
    <?php endif; 	?>  
        
   <section class="section_box background_image5 ">   		
        <div class="container ">
        
            <div class="row">  
            <?php    
                     $image = get_field('image_1');
                       ?> 
                 <div class="col-md-4 ">                      
                    <img src='<?php echo $image["url"]; ?>'>
                 </div>
                <div class="col-md-8 mt-5 content-middle"> 
                    <h4 class="trip_title"><?php echo get_field('title_1'); ?></h4>
                    <p><?php echo get_field('description_1'); ?></p> 
                  <!--   <a href="#" class="yellow_btn">Know More</a> -->
                </div>
		     </div>
        </div>
    </section>

   <section class="section_box gray-bg">         
        <div class="container ">
        
            <div class="row">  
            <?php    
                     $image1 = get_field('image_2');
                     $image2 = get_field('image_3');
                       ?> 
                 <div class="col-md-7">
                 <div class="ceo_div">
                    <img src='<?php echo $image2["url"]; ?>' >
                    <div class="cont">
                        <p><?php echo get_field('ceo_name'); ?></p>
                        <span><?php echo get_field('ceo_designation'); ?></span>
                    </div>
                </div> 
                 <div class="coo_div">
                    <img src='<?php echo $image1["url"]; ?>' >
                    <div class="cont">
                        <p><?php echo get_field('coo_name'); ?></p>
                        <span><?php echo get_field('coo_designation'); ?></span>
                    </div>
                 </div>
                 
                 </div>
                <div class="col-md-5 mt-5 content-middle"> 
                    <h4 class="trip_title"><?php echo get_field('title_2'); ?></h4>
                    <p><?php echo get_field('description_2'); ?></p> 
                  <!--   <a href="#" class="yellow_btn">Know More</a> -->
                </div>
             </div>
        </div>
    </section>
   
</div>

<?php
get_footer();?>