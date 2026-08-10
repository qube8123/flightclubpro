<?php
/* 
Template Name: Covid
*/
get_header();

?>
<!-- Main Container Starts -->
<div class="mainContainer"> 
    <!-- Start Here -->
          <?php
$banner_section = get_field('banner');
if( $banner_section ): ?>
    <section class="hero_banner" style="background-image:  linear-gradient(to right, rgb(16 129 147 / 75%), rgb(23 132 124 / 75%), rgb(66 132 95 / 75%), rgb(103 128 68 / 76%), rgb(138 120 54 / 75%)), url(<?php echo esc_url( $banner_section['banner_image']['url'] ); ?>);">
        <div class="banner_text text-center">
            <h2><?php echo $banner_section['banner_title']; ?></h2>
            <p><?php echo $banner_section['short_description']; ?></p>
        </div>
    </section>
    <?php endif; ?>
   
   <section class="section_box  ">          
        <div class="container ">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10"><?php the_content();?></div>
            <div class="col-md-1"></div>
          </div>
  <?php    $first_section_image = get_field('first_section_image');
      if( $first_section_image ):
    ?>  
             <div class="row mt-5">
                <div class="col-md-6 paddingright">                      
                    <img src='<?php echo $first_section_image["url"]; ?>'>
                </div>
                <div class="col-md-6 content-middle paddingleft30"> 
                  <h4 class="trip_title"><?php echo get_field('first_title'); ?></h4>
                    <p class="mt-5"><?php echo get_field('first_description'); ?> </p> 
                </div>
             </div>
        
    <?php endif; 
    $second_section_image = get_field('second_section_image');
    if( $second_section_image ):
        ?>  
   
            <div class="row">
                <div class="col-md-6 content-middle paddingright30">                       
                  <h4 class="trip_title"><?php echo get_field('second_title'); ?></h4>
                    <p class="mt-5"><?php echo get_field('second_description'); ?> </p> 
                             
                </div> 
                <div class="col-md-6 paddingleft">
                    <img src="<?php echo $second_section_image["url"]; ?>"> 
                </div>
            </div>
        
     <?php endif; 
         $third_section_image = get_field('third_section_image');
      if( $third_section_image ):
    ?>  
             <div class="row">
                <div class="col-md-6 paddingright">                      
                    <img src='<?php echo $third_section_image["url"]; ?>'>
                </div>
                <div class="col-md-6 content-middle paddingleft30"> 
                  <h4 class="trip_title"><?php echo get_field('third_title'); ?></h4>
                    <p class="mt-5"><?php echo get_field('third_description'); ?> </p> 
                </div>
             </div>
        
    <?php endif; ?>
    </div>
    </section>
</div>

<?php
get_footer();?>