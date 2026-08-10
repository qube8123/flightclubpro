<?php
/*Template Name: Travel Planner*/
get_header();
?>

<!-- Main Container Starts -->
<div class="mainContainer">
    <!-- Start Here -->
    <?php
$banner_section = get_field('banner_section');
if( $banner_section ): ?>
    <section class="hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo esc_url( $banner_section['banner_image']['url'] ); ?>);">
        <div class="banner_text text-center">
            <h2><?php echo $banner_section['banner_title']; ?></h2>
            <p><?php echo $banner_section['banner_sub_title']; ?></p>
        </div>
    </section>
    <?php endif; 
$shop_our_bundle = get_field('shop_our_bundle');

if( $shop_our_bundle ): ?>
    <section class="why_us_section section_box background_image">
        
        <div class="container">
             <div class="row">
            <div class="col-md-6 content-middle"> 
              <h4 class="trip_title"><?php echo $shop_our_bundle['title']; ?></h4>
                <p><?php echo $shop_our_bundle['description']; ?></p> 
                <a href="#" class="yellow_btn">Shop Now</a>
            </div>
            <div class="col-md-6 ">                      
                <img src='<?php echo $shop_our_bundle["image"]["url"]; ?>'>
             </div>
         </div>
        </div>
    </section>
  <?php endif; ?>
  <?php 
$image_gallery = get_field('image_gallery');
if( $image_gallery ): ?>
   <section id="shop" class=" section_box bggray">
             <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="text-center mb-30" >
                            <?php if( get_field('accessories_title')): ?> <h3 class="section_title"><?php echo get_field('accessories_title');?></h3><?php  endif; ?>
                            <p><?php if( get_field('accessories_description')): echo get_field('accessories_description'); endif; ?> </p>
                            </div>
                        </div>
                    <div class="col-md-2"></div>
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="img-half">
                            <img src="<?php echo $image_gallery["image_1"]["url"]; ?>" >                   
                         </div>
                         <div class="img-half2">
                            <img src="<?php echo $image_gallery["image_2"]["url"]; ?>" class="image_2">
                            <img src="<?php echo $image_gallery["image_3"]["url"]; ?>" class="image_2">
                            <img src="<?php echo $image_gallery["image_4"]["url"]; ?>" class="image_3">
                        </div>
                    </div>
                </div>
             </div>
    </section>
      <?php endif; ?>
   <?php 
$whats_inside = get_field('whats_inside');
if( $whats_inside ): ?>
    <section class="why_us_section section_box background_image">
        
        <div class="container">
             <div class="row">
             <div class="col-md-6 ">                      
                <img src='<?php echo $whats_inside["image"]["url"]; ?>'>
             </div>
            <div class="col-md-6 content-middle"> 
              <h4 class="trip_title"><?php echo $whats_inside['title']; ?></h4>
                <p><?php echo $whats_inside['description']; ?></p> 
                <a href="#" class="yellow_btn">Shop Now</a>
            </div>
            
         </div>
        </div>
    </section>
  <?php endif; ?>
   
    
     <section id="shop" class=" section_box bggray">
             <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="text-center mb-30" >
                            <?php if( get_field('shop_title')): ?> <h3 class="section_title"><?php echo get_field('shop_title');?></h3><?php  endif; ?>
                            <p><?php if( get_field('shop_description')): echo get_field('shop_description'); endif; ?> </p>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div> 
                        <?php echo do_shortcode('[products columns="4" orderby="date" category="dream-without-limits"]');?>
             </div>
    </section>
<?php 
    $video_section = get_field('video_section');
    if( $video_section ): ?>
        <section class="video_section section_box "  style="background-image: url(<?php echo esc_url( $video_section['background_image']['url'] ); ?>);">
            <div class="container">
              <div class="row">
                
                <div class="col-md-6 content-middle"> 
                  <h4 class="trip_title"><?php echo $video_section['title']; ?></h4>
                    <p><?php echo $video_section['description']; ?></p> 
                    <a href="<?php echo $video_section['link']; ?>" class="yellow_btn">Watch Video</a>
                </div>
                <div class="col-md-6 ">                      
                    <img src='<?php echo $video_section["image"]["url"]; ?>'>
                </div>                
             </div>
            </div>
        </section>
      <?php endif; ?>
    <section class="testimonial_section section_box">
       
          <div class="container">
             <div class="text-center">
                <h3 class="section_title"><?php if( get_field('testimonial_title')): echo get_field('testimonial_title'); endif; ?>                    
                </h3>
            </div>
            
        <div class="testimonial_slider">
             <?php  $args = array(  
                    'post_type' => 'testimonials',
                    'post_status' => 'publish',
                    'posts_per_page' => -1, 
                    'orderby' => 'title'    , 
                    'order' => 'ASC',
                );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');  ?>
            <div class="t_slide">
                <p><?php echo get_the_content(); ?></p>
                <div class="refrence_profile">
                    <div class="refrence_profile--img">
                        <img src="<?php echo $featured_img; ?>" alt="">
                    </div>
                    <div class="refrence_profile--name">
                        <span class="first_name"><?php the_title(); ?></span>
                        <span class="designation"><?php if( get_field('designation')): echo get_field('designation'); endif; ?></span>
                    </div>
                </div>
            </div>
            <?php     
            endwhile;
            wp_reset_postdata(); 
            ?>

        </div>
    </div>
    </section>
    <section class="comapny_section bg-green section_box">
        <div class="container">
            <div class="text-center ">
                <h3 class="section_title mt-5">Follow us @DreamWithoutLimitsPlanner</h3>
            </div>
            <?php echo do_shortcode('[fts_instagram instagram_id=17841410068674021 access_token=IGQVJVWW9tVWpwazF5RnpudzhlUm1fMDN5QXIwWGpWSGVoNV91dS1nZAllqbEZA3anVDdVNTM241MzAwcHA2ZADZAac1l5ZA29TTU1tWlQySUlsZAF9qNmNyeGdEYTdxek1CcmZAsTGVRQThB pics_count=5 type=basic super_gallery=yes columns=5 force_columns=no space_between_photos=15px icon_size=250px hide_date_likes_comments=no]');?>
        </div>
    </section>
     

</div>
<!-- Main Container Ends -->

<!-- Footer Starts --> 

<?php
get_footer();?>