 <?php 
 /* The loop */ 

get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
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
    <?php endif; ?>   
      
    <section class="  price_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3 text-center "> 
                    <h4>Duration</h4>
                    <span> <?php if( get_field('total_days')): echo get_field('total_days'); endif; ?> Days</span>
                </div>
                <div class="col-md-3 text-center "> 
                    <h4>Starting Price</h4>
                    <span> <?php if( get_field('price')){ echo get_field('price'); }else{ echo "Price On Call"; } ?> </span>
                </div>
                <div class="col-md-3 text-center ">
                    <a href="#booking_form"  class="yellow_btn">Book Now</a>
                </div>

            </div>
        </div>
    </section>
    <?php $days=get_field('days');?>
      <section class="section_box background_image2">
        <div class="container ">
            <div class="location_list text-center">
                <?php 
                echo get_field('places');?>
                
           
            <div class="row justify-content-center">
                <div class="col-md-12 text-center "> 
                    <?php the_content();?>
                </div>
            </div>
            </div>
            <div class="row"> 
                <div class="col-md-6"> 
                    <div class="check-list-box">
                        <h3 class="text-center">Itinerary highlights</h3>
                       <?php if( get_field('itinerary_highlights')): echo get_field('itinerary_highlights'); endif; ?>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="check-list-box">
                        <h3 class="text-center">What's included </h3>
                         <?php if( get_field('whats_included')): echo get_field('whats_included'); endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </section>

        <?php
/*$journey_1 = get_field('journey_1-2_details');
$journey_2 = get_field('journey_2-3_details');
$journey_3 = get_field('journey_3-4_details');
$journey_4 = get_field('journey_4-5_details');
$journey_5 = get_field('journey_5-6_details');
$journey_6 = get_field('journey_6-7_details');
$journey_7 = get_field('journey_7-8_details');
$journey_8 = get_field('journey_8-9_details');
$journey_9 = get_field('journey_9-10_details');
*/

?>

    <section class="section_box trip_inner_section">
        <div class="text-center">
            <h3 class="section_title"><?php if( get_field('trip_detail_title')): echo get_field('trip_detail_title'); endif; ?></h3>
        </div>
        <div class="container">
            <div class="row mt-5 wrappers">
                <div class="sidebar">
                    <div class="vertical_line">               
                        <div class="vertical_tab">
                            <?php for ($i=1; $i < $days; $i++) { 
                                 $active = "";
                                    if ($i == 1) {
                                        $active='active';
                                    }
                                    //$j=$i+1;
                                        $journey_day = get_field('journey_'.$i.'_details');
                                    echo '<a class="tablinks '.$active.'" href="#'.$i.'" id="defaultOpen">'.$journey_day["day_detail"].'</a><span>'.$journey_day["place"].'</span>';
                                 } ?>
                        <!--   <a class="tablinks" href="#2">Days 2-3</a> <span>Jumeirah</span>
                          <a class="tablinks" href="#3">Days 3-4</a><span> Khor</span>
                          <a class="tablinks" href="#4">Days 4-5</a><span> Khor</span> -->
                        </div>
                    </div>
                </div>
                <div class="main">

                      <?php for ($i=1; $i < $days; $i++) { 
                                 $active = "";
                            if ($i == 1) {
                                $active='active';
                            }
                            if ($i % 2 == 0) {
                                $class='right';
                            }else{
                                $class='left';
                            }
                           // $j=$i+1;
                            $journey_day = get_field('journey_'.$i.'_details');
                       
                            ?>
                                  

                      <div class="col-md-12 trip_block" id="<?php echo $i; ?>">
                        <div class="image-<?php echo $class;?>">
                            <img src="<?php if (is_array($journey_day["image"])) {
                                   echo $journey_day["image"]["url"]; 
                            }else{
                                echo wp_get_attachment_url ($journey_day["image"]);
                            } ?>">
                            <div class="contents">
                                <div class="days_place"><button class="green_btn"><?php echo $journey_day["day_detail"]; ?></button> <span ><?php echo $journey_day["place"]; ?></span></div>
                                <h4 class="trip_title"><?php echo $journey_day["title"]; ?></h4>
                                  <p class="trip_para"> <?php echo $journey_day["description"]; ?></p>
                                <div class="row">
                                    <?php if($journey_day["tranfar_detail"]){?>
                                    <div class="col-md-6">
                                        <span >Transfer</span>
                                        <p><?php echo $journey_day["tranfar_detail"]; ?></p>
                                    </div>
                                    <?php }?>
                                    <?php if($journey_day["accomodation"] != 0){?>
                                    <div class="col-md-6">
                                        <span >Accommodation in <?php echo $journey_day["place"]; ?></span>
                                        <div  class="star">
                                             <?php for ($k=0; $k < $journey_day["accomodation"]; $k++) { echo '<img src="'.get_template_directory_uri().'/img/star.png">'; } ?>
                                        </div>
                                    </div>   
                                <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>                    

                </div>
            </div>
        </div>

    </section>
     
  <section style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 128 147 / 55%), rgb(16 128 147 / 76%), rgb(16 120 147 / 55%)), url(<?php echo home_url(); ?>/wp-content/themes/flightclub/img/contact-img.jpg); padding: 60px;background-size: cover;">
    <div class="container">
        <?php echo do_shortcode('[hubspot type=form portal=20675686 id=836eb023-fed5-4a55-9865-ff3cba1b7873]');?>
    </div>

 </section>
 <section class="icon_section section_box ">
    <div class="container">
        <div class="text-center">
            <h3 class="section_title">How Our Travel Concierge Service Works</h3>
        </div>
       
    <div class="border-dash"></div>
        <div class="row">
          <?php $services = get_terms(array('taxonomy' => 'services'));// array( 'hide_empty' => false,)
               
                foreach($services as $service) {
                   // $term_link = get_term_link( $location );
    
                 $thumbnail = get_field('image', $service->taxonomy . '_' . $service->term_id);?>
                <div class="icon-col">
                      <h4><?php echo $service->name; ?></h4>
                    <img src="<?php echo $thumbnail['url']; ?>">
                    <p><?php echo $service->description; ?></p>
                </div>
            <?php } ?>
          
        </div>
    </div>
 </section>

</div>
<?php endwhile; ?>
<?php
get_footer();?>