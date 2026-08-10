<?php
/* 
Template Name: Membership
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
       
 
             <div class="row mt-5">              
                <div class="col-md-6 content-middle "> 
                  <h4 class="trip_title"><?php echo get_field('first_title'); ?></h4>
                    <div class="mt-5"><?php echo get_field('first_description'); ?> </div> 
                </div>
                  <div class="col-md-6 paddingright">                      
                    <div class="program_list">
                      <div class="title uppercase"><?php echo get_field('program_title'); ?> <div class="price"><?php echo get_field('price'); ?> <span> / Year</span></div></div>
                      <div class="list">
                        <?php echo get_field('program_list'); ?>
                         </div>
                        <a href="<?php echo get_field('button_link'); ?>" class="yellow_btn"><?php echo get_field('button_text_1'); ?></a>
                     
                    </div>
                </div>
             </div>
           </div>
         </section>
         <section class="travel_section padd50"> 
          <div class="container ">
<?php
    $second_section_image = get_field('second_section_image');
    if( $second_section_image ):
        ?>  
   
            <div class="row">
               <div class="col-md-6 ">
                    <img src="<?php echo $second_section_image["url"]; ?>" > 
                </div>
                <div class="col-md-6 content-middle ">                       
                  <h4 class="trip_title"><?php echo get_field('second_title'); ?></h4>
                    <p class="mt-5"><?php echo get_field('second_description'); ?> </p> 
                    <a href="<?php echo get_field('button_link_2'); ?>" class="yellow_btn"><?php echo get_field('button_text_2'); ?></a>
                </div> 
               
            </div>
        
     <?php endif; 
       
    ?> 
  </div>
    </section>
<section class="section_box"> 
          <div class="container ">
             <div class="row ">
              <div class="col-md-12 "> 
               <div class="text-center">
                  <h3 class="section_title text-center"><?php if( get_field('third_title')): echo get_field('third_title'); endif; ?></h3>
              </div>
                <div class="program_list allist mt-5">
                                     
                    <?php if( get_field('third_description')): echo get_field('third_description'); endif; ?>
                  </div>
                </div>
                
             </div>
        
    <?php ?>
    </div>
    </section>
</div>

<?php
get_footer();?>