    <?php
/*Template Name: Home*/
get_header();
?>

<!-- Main Container Starts -->
<div class="mainContainer">
    <!-- Start Here -->
    <?php
$banner_section = get_field('banner_section');
if( $banner_section ): ?>
    <section class="  " >
     <!--    <div class="banner_text text-center">
            <h2><?php //echo $banner_section['banner_title']; ?></h2>
            <p><?php //echo $banner_section['banner_sub_title']; ?></p>
        </div> -->
    <div class="home_slider">
    <div class="t_slide hero_banner" style="background-image: url(<?php echo esc_url( $banner_section['banner_image']['url'] ); ?>);">
            <div class="banner_text text-center">
            <h2><?php echo $banner_section['banner_title']; ?></h2>
            <p><?php echo $banner_section['banner_sub_title']; ?></p>
            </div>
    </div>
    <div class="t_slide hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-291-1.png);">
            <div class="banner_text text-center">
             <h2>The Black Powder Xchange<?php             //echo $banner_section['banner_title']; ?></h2>
            <p>Quebec, Canada | December 7-11, 2023</p>
              
             <a href="https://www.flightclubvip.com/events/the-black-powder-xchange#package" class="yellow_btn">Book This Event</a>
            </div>
    </div>

</div>
    </section>
    <?php endif; 
$why_flight_club = get_field('why_flight_club');
if( $why_flight_club ): ?>
    <section class="why_us_section section_box background_image">
        
        <div class="container">
            <div class="text-center">
                <h3 class="section_title"><?php echo $why_flight_club['title']; ?></h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="about_card">
                        <!-- <div class="ic-consultants ab_icon"></div> -->
                         <img src="<?php echo $why_flight_club['first_icon']['url']; ?>"  alt="" class="image">
                          <div class="overlay">
                            <img src="<?php echo $why_flight_club['first_icon_hover']['url']; ?>"  alt="" class="image">
                          </div>
                        <h3 class="ab_title"><?php echo $why_flight_club['first_title']; ?></h3>
                        <p><?php echo $why_flight_club['first_description']; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about_card">
                        <!-- <div class="ic-dollar-bag ab_icon"></div> -->
                        <img src="<?php echo $why_flight_club['second_icon']['url']; ?>"  alt="" class="image">
                          <div class="overlay">
                            <img src="<?php echo $why_flight_club['second_icon_hover']['url']; ?>"  alt="" class="image">
                          </div>
                        <h3 class="ab_title"><?php echo $why_flight_club['second_title']; ?></h3>
                        <p><?php echo $why_flight_club['second_description']; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about_card">
                        <!-- <div class="ic-bulb ab_icon"></div> -->
                        <img src="<?php echo $why_flight_club['third_icon']['url']; ?>"  alt="" class="image">
                          <div class="overlay">
                            <img src="<?php echo $why_flight_club['third_icon_hover']['url']; ?>"  alt="" class="image">
                          </div>
                       <h3 class="ab_title"><?php echo $why_flight_club['third_title']; ?></h3>
                        <p><?php echo $why_flight_club['third_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php endif; ?>
    <section class="travel_section section_box">
       
        <div class="container">
             <div class="text-center">
                <h3 class="section_title"><?php if( get_field('destination_title')): echo get_field('destination_title'); endif; ?></h3>
            </div>
            <div class="row">
                <?php $locations = get_terms(array('taxonomy' => 'countries','hide_empty' => false));// array( 'hide_empty' => false,)
                 $count = count($locations);

                foreach($locations as $location) {
                    $term_link = get_term_link( $location );
    
                        // If there was an error, continue to the next term.
                        if ( is_wp_error( $term_link ) ) {
                            continue;
                        }
                        if($count < 7){
                          $col = 'col-md-4';
                        }else{
                          $col = 'col-md-3';
                        }
                   
  
                 $thumbnail = get_field('image', $location->taxonomy . '_' . $location->term_id);?>
                 
                  <div class="<?php echo $col;?>">                   
                        <div class="main_box" style="background-image: url(<?php echo $thumbnail['url']; ?>);">
                             <a href="<?php echo esc_url( $term_link ); ?>">
                            <div class="travel_destination_img">
                                <h4 class="destination_title"><?php echo $location->name; ?></h4>
                            </div>
                            </a>
                        </div>                    
                    </div>
                
                  <?php  } 
                    ?>
             
            </div>
        </div>
    </section>

    <section class="trip_section section_box background_image">
       
        <div class="container">
             <div class="text-center">
                <h3 class="section_title"><?php if( get_field('trip_title')): echo get_field('trip_title'); endif; ?></h3>
            </div>
            <div class="row">
                <?php  $args = array(  
        'post_type' => 'packages',
        'post_status' => 'publish',
        'posts_per_page' => 6, 
        'orderby' => 'title', 
        'order' => 'ASC',
        'meta_key' => 'meta-checkbox',
        'meta_value' => 'yes'
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');  ?>
          <div class="col-md-6 trip_block">
                    <div class="trip_box" style="background-image: url(<?php echo $featured_img; ?>);"> </div>
                    <div class="trip_information_block">
                        <h4 class="trip_title"><?php the_title(); ?></h4>
                        <span class="price_label">Prices Start from</span>
                        <div class="price_box">
                            <?php if( get_field('price')){ echo get_field('price'); }else{ echo "Price On Call"; } ?> 
                        </div>
                        <p class="trip_para"> <?php  echo substr(get_the_content(), 0, 100);  if(strlen(get_the_content()) > 100){ echo '...';} ?> </p>
                        <a href="<?php echo get_the_permalink(); ?>" class="trip_btn yellow_btn">Explore this trip</a>
                    </div>
                </div>
                <?php
     
    endwhile;

    wp_reset_postdata(); 
    ?>
              
                
            </div>
        </div>
    </section>

    <section class="contact_section section_box" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/contact-img.jpg);">
        <div class="container">
            <div class="custom_wrap">
                <div class="contact_title text-center">
                    <h2><?php if( get_field('vanture_title')): echo get_field('vanture_title'); endif; ?></h2>
                    <p><?php if( get_field('vanture_sub_title')): echo get_field('vanture_sub_title'); endif; ?></p>
                </div>
                <?php //echo do_shortcode('[contact-form-7 id="51" title="venture form"]');?>
            
<?php echo do_shortcode('[hubspot type=form portal=20675686 id=10da1918-1b12-46e5-b586-a00a3afd49e2]'); ?>
            </div>
        </div>
    </section>

    <section class="testimonial_section section_box">
       
          <div class="container">
             <div class="text-center">
                <h3 class="section_title"><?php if( get_field('testimonial_title')): echo get_field('testimonial_title'); endif; ?></h3>
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
                   <!-- <div class="refrence_profile--img">
                        <img src="<?php //echo $featured_img; ?>" alt="">
                    </div>-->
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

   <section class="comapny_section section_box background_image">
    
    <div class="container">
        <div class="text-center">
            <h3 class="section_title"><?php if( get_field('partner_title')): echo get_field('partner_title'); endif; ?></h3>
        </div>
        <ul class="companies_block">
            <?php  $args = array(  
                'post_type' => 'client',
                'post_status' => 'publish',
                'posts_per_page' => -1, 
                'orderby' => 'title', 
                'order' => 'ASC',
            );

            $loop = new WP_Query( $args ); 
                
            while ( $loop->have_posts() ) : $loop->the_post(); 
                $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');  ?>
                    <li>
                        <a href="<?php if( get_field('link')): echo get_field('link'); endif; ?>"><img src="<?php echo $featured_img; ?>" alt=""></a>
                    </li>
                       <?php             
            endwhile;
            wp_reset_postdata(); 
            ?>
           
        </ul>
    </div>
   </section>

      

</div>
<!-- Main Container Ends -->

<!-- Footer Starts --> 

<?php
get_footer();?>