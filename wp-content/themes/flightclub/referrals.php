<?php
/* 
Template Name: Referrals
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
            <?php $img1= get_field('first_section_image');?>
   <section class="section_box background_image5 group-travels">   		
        <div class="container ">
        	   <div class="row">
                <div class="col-md-6 mb-30">                    
                     <img src='<?php echo $img1["url"]; ?>'>
                </div>
                <div class="col-md-6 content-middle"> 
                  <h4 class="trip_title"><?php echo get_field('first_title'); ?></h4>
                    <p> <?php echo get_field('first_description'); ?></p> 
                </div>
           
             </div>            

        </div>
    </section>
   
</div>

<?php
get_footer();?>