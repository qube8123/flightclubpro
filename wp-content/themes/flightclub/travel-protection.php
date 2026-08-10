<?php
/* 
Template Name: Travel Protection
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
        
   <section class="section_box background_image5 group-travels">   		
        <div class="container ">
        	   
            <div class="row">  
            <?php $img1= get_field('first_section_image');?>
            <?php $img2= get_field('second_section_image');?>
                <div class="col-md-6 mt-5">                      
                        <img src='<?php echo $img1["url"]; ?>'>
                </div>
                <div class="col-md-6 content-middle"> 
                  <h4 class="trip_title"><?php echo get_field('first_title'); ?></h4>
                    <p> <?php echo get_field('first_description'); ?></p> 
                    
                </div>
                 
                <div class="col-md-6 content-middle "> 
                  <h4 class="trip_title "><?php echo get_field('second_title'); ?></h4>
                    <p><?php echo get_field('second_description'); ?></p> 
                    
                </div>
                <div class="col-md-6 mt-5">                      
                        <img src='<?php echo $img2["url"]; ?>'>
                </div>
                   
              
	          
		     </div>

            

        </div>
    </section>
	 <section class="section_box background_image5 group-travels">   		
        <div class="container ">
        	   
            <div class="row">  
				<div class="col-md-12 text-center">   
				 <h4 class="trip_title mb-10">Travel Protection Policy Estimate</h4>
				
				<p class="mb-30">Fill out the form below to calculate the total cost of your travel protection policy.</p>
			
<iframe frameborder='0' width='100%' height='450' src='https://www.agentmaxonline.com/agentmaxweb/storefront/index.html#/quotemax?widgetid=759113&accam=F211362&code=ABIYU4TLWGBGTNHC6ZWLRSKAR65GB6C5JLBJOIXR7QY3M6I5HDDNWS7OAMGLAQYNU2G6JNJMDCJWIAIP4RJTO6T6PPQMTCYZIYRQPBZUSDUWCKVTMB7FB2LJBUUYWSIZ'></iframe>
				</div>
			</div>
		 </div>
	</section>
	
</div>

<?php
get_footer();?>