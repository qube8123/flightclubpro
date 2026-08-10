<?php
/* 
Template Name: What We Do
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
        
   <section class="section_box ">   		
        <div class="container ">
        	   
            <div class="row mb-80">  
            <?php $img1= get_field('first_section_image');?>
                    <div class="col-md-6">                    	
	                    <img src='<?php echo $img1["url"]; ?>'>
                    </div>
                    <div class="col-md-6 content-middle">   
                      <div> <?php echo get_field('first_description'); ?></div> 
                   
                </div>
		     </div>

        </div>
    </section>
    <section class="bglightgray padd80">
        <div class="container">
             <div class="text-center">
                <h3 class="section_title ">How Our Services Work</h3>
            </div>
            <ul id="timeline" class="timeline mt-5">

                <li class=" timeline-inverted">
                  <div class="timeline-badge">1 </div>
                  <div class="timeline-panel">  
                
                    
                    <div class="timeline-body">
                         <p><?php echo get_field('service_1'); ?></p>
                    </div>
                        
                  </div>
                </li>
                <div style="clear: both"></div>
                <li class=" ">
                  <div class="timeline-badge">2 </div>
                  <div class="timeline-panel">  
                
            
                    <div class="timeline-body">
                        <p><?php echo get_field('service_2'); ?></p>
                    </div>
                        
                  </div>
                </li>
               <div style="clear: both"></div>  
                <li class="timeline-inverted ">
                  <div class="timeline-badge">3 </div>
                  <div class="timeline-panel">  
                
            
                    <div class="timeline-body">
                        <p><?php echo get_field('service_3'); ?></p>
                    </div>
                        
                  </div>
                </li>
               <div style="clear: both"></div>  
                <li class="">
                  <div class="timeline-badge">4 </div>
                  <div class="timeline-panel">  
                
            
                    <div class="timeline-body">
                        <p><?php echo get_field('service_4'); ?></p>
                    </div>
                        
                  </div>
                </li>
               <div style="clear: both"></div>  
                <li class="timeline-inverted ">
                  <div class="timeline-badge">5 </div>
                  <div class="timeline-panel">  
                
            
                    <div class="timeline-body">
                        <p><?php echo get_field('service_5'); ?></p>
                    </div>
                        
                  </div>
                </li>
               
               <div style="clear: both"></div>  
               
        </ul>
        </div>
    </section>
    <section class="padd80">
        <div class="container ">
             <div class="text-center">
                <h3 class="section_title ">Why Choose Flight Club VIP</h3>
                <p><?php echo get_field('description_of_us'); ?>
</p>
            </div>
            <div class="row mt-5 ">
                <?php $icon_1 = get_field('icon_1');  ?>
                <div class="col-md-4">
                    <div class="iconbox">
                        <img src="<?php echo $icon_1['url']; ?>" >
                        <h4><?php echo get_field('title_1'); ?></h4>
                        <p><?php echo get_field('description_1'); ?></p>
                    </div>
                </div>
                <?php $icon_2 = get_field('icon_2');  ?>
                <div class="col-md-4">
                    <div class="iconbox">
                        <img src="<?php echo $icon_2['url']; ?>">
                        <h4><?php echo get_field('title_2'); ?></h4>
                        <p><?php echo get_field('description_2'); ?></p>
                    </div>
                </div>
                <?php $icon_3 = get_field('icon_3');  ?>
                <div class="col-md-4">
                    <div class="iconbox">
                    <img src="<?php echo $icon_3['url']; ?>">
                    <h4><?php echo get_field('title_3'); ?></h4>
                    <p><?php echo get_field('description_3'); ?></p>
                    </div>
                </div>
                 <?php $icon_4 = get_field('icon_4');  ?>
                <div class="col-md-4">
                    <div class="iconbox">
                        <img src="<?php echo $icon_4['url']; ?>" >
                        <h4><?php echo get_field('title_4'); ?></h4>
                        <p><?php echo get_field('description_4'); ?></p>
                    </div>
                </div>
                <?php $icon_5 = get_field('icon_5');  ?>
                <div class="col-md-4">
                    <div class="iconbox">
                        <img src="<?php echo $icon_5['url']; ?>">
                        <h4><?php echo get_field('title_5'); ?></h4>
                        <p><?php echo get_field('description_5'); ?></p>
                    </div>
                </div>
                <?php $icon_6 = get_field('icon_6');  ?>
                <div class="col-md-4">
                    <div class="iconbox">
                    <img src="<?php echo $icon_6['url']; ?>">
                    <h4><?php echo get_field('title_6'); ?></h4>
                    <p><?php echo get_field('description_6'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
</div>

<?php
get_footer();?>