<?php
/* 
Template Name: Discovery Form
*/
get_header();

?>
<!-- Main Container Starts -->
<div class="mainContainer">
    <!-- Start Here -->
          <?php
/*$banner_section = get_field('banner');
if( $banner_section ):*/ ?>
    <section class="hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo home_url(); ?>/wp-content/uploads/2021/11/image-30.png);">
        <div class="banner_text text-center">
            <h2>Travel information</h2>
            <!-- <p><?php //echo $banner_section['short_description']; ?></p> -->
        </div>
    </section>
    <?php //endif; 	?>  
        
   <section class="section_box ">   		
        <div class="container ">
        	   
            <div class="text-center">
                <h3 class="section_title">Travel information</h3>
            </div>

            <div style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 128 147 / 55%), rgb(16 128 147 / 76%), rgb(16 120 147 / 55%)), url(<?php echo home_url(); ?>/wp-content/themes/flightclub/img/contact-img.jpg); padding: 60px;background-size: cover;">
                <?php the_content(); ?>
            </div>

        </div>
    </section>

   
</div>

<?php
get_footer();?>