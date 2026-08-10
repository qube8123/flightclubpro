<?php
/* 
Template Name: LGBTQIA
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
   <section class="section_box background_image2">   		
        <div class="container ">
        	 <div class="row">
		   		<div class="col-md-6 mb-30">                   	
		            <img src='<?php echo $first_section_image["url"]; ?>' class="max-5">
		        </div>
	            <div class="col-md-6 content-middle"> 
	              <h4 class="trip_title"><?php echo get_field('first_title'); ?></h4>
                <p class="mt-5"><?php echo get_field('first_description'); ?> </p> 
	            </div>
                <div class="col-md-12">
                  <p><?php echo get_field('first_description_2'); ?> </p>
                </div>
		     </div>
        </div>
    </section>
    <?php endif; ?>
           
    <?php
    $destinations = get_field('destinations');
    if( $destinations ):
        ?>  
    <section class="section_box bggray" style="background: url(<?php echo home_url(); ?>/wp-content/themes/flightclub/img/pattern-of-travelitinery3.png) no-repeat left/contain, #f4f7fa;">  
        <div class="container">
            <div class="text-center mb-50">
                 <h4 class="trip_title"><?php echo get_field('destinations_title'); ?></h4>
            </div>
            <div class="row "> 
                 <?php for ($i=1; $i < 5; $i++) { 
             $title = 'title_'.$i;
             $image = 'image_'.$i;
             $description = 'description_'.$i;
            
            if( $destinations[$title] ){ ?>
                <?php if($i == 1 || $i == 3 ){ // echo $title;?>
                <div class="col-md-6">                      
                    <img src="<?php echo $destinations[$image]['url']; ?>">
                    <h4 class="mt-5 mb-10"><strong><?php echo $destinations[$title]; ?></strong></h4>
                    <div class="mb-50 pad-right"><?php echo $destinations[$description]; ?></div>
                </div>  
                <?php }else{ ?>   
                    <div class="col-md-6">                      
                     <img src="<?php echo $destinations[$image]['url']; ?>">
                    <h4 class="mt-5 mb-10"><strong><?php echo $destinations[$title]; ?></strong></h4>
                    <div class="mb-50 pad-right"><?php echo $destinations[$description]; ?></div>
                </div>  
            <?php } } 
        }?>
            </div>
       
        </div>
    </section>
     <?php endif; ?>

</div>

<?php
get_footer();?>