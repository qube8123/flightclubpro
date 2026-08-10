<?php
/*Template Name: Franchise*/

get_header();
?>

<div class="mainContainer"> 

<?php $image1= get_field('image1'); //print_r($image1); ?>
    <section class="section_box slider-section">        
        <div class="slider stick-dots">
            <div class="slide">
              <div class="slide__img">
                <img src="<?php echo $image1['url']; ?>" alt="" data-lazy="" class="full-image animated" data-animation-in="zoomInImage"/>
                 <div class="overlay"></div>
              </div>
              <div class="slide__content ">
                <div class="text-center">   
                    <h1 class="animated mb-20 white-color" data-animation-in="fadeInUp"><?php the_field('title1'); ?></h1>
                    <div class="animated mb-30 white-color" data-animation-in="fadeInUp" data-delay-in="0.3"><?php the_field('description1'); ?></div>
                    <a href="<?php the_field('button_link1'); ?>" class="btn-light btn button-custom animated" data-animation-in="fadeInUp"><?php the_field('button_text1'); ?> <i class="arrow-right"></i></a>
                </div>
              </div>
            </div>
            <!-- <div class="slide">
              <div class="slide__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/banner2.png" data-lazy="" class="full-image animated" data-animation-in="zoomOutImage"/>
              </div>
              <div class="slide__content">
                <div class="text-center">   
                    <h1 class="animated mb-20 white-color" data-animation-in="fadeInUp">The Alternative Concept In IV Vitamin Hydration</h1>
                    <p class="animated mb-30 white-color" data-animation-in="fadeInUp" data-delay-in="0.3">Provides IV therapy infusion and vitamin drip spa services. Conveniently located near the Vintage in Northwest Houston, TX, supporting the areas of Tomball, Cypress, and Spring.</p>
                    <a class="btn-light btn button-custom animated" data-animation-in="fadeInUp">SCHEDULE AN APPOINTMENT <i class="arrow-right"></i></a>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="slide__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/banner3.png" alt="" data-lazy="" class="full-image animated" data-animation-in="zoomInImage"/>
              </div>
              <div class="slide__content">
                <div class="text-center">   
                    <h1 class="animated mb-20 white-color" data-animation-in="fadeInUp">The Alternative Concept In IV Vitamin Hydration</h1>
                    <p class="animated mb-30 white-color" data-animation-in="fadeInUp" data-delay-in="0.3">Provides IV therapy infusion and vitamin drip spa services. Conveniently located near the Vintage in Northwest Houston, TX, supporting the areas of Tomball, Cypress, and Spring.</p>
                    <a class="btn-light btn button-custom animated" data-animation-in="fadeInUp">SCHEDULE AN APPOINTMENT <i class="arrow-right"></i></a>
                </div>
              </div>
            </div> -->
          </div>
            
    </section>
    <?php $image2= get_field('image2'); //print_r($image1); ?>
    <section class="boder-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-50 mt-50">
                    <img src="<?php echo $image2['url']; ?>">
                </div>
                <div class="col-md-6 content-middle">
                    <h2><?php the_field('title2'); ?></h2>
                    <div class="mt-30 mb-30"><?php the_field('description2'); ?></div>
                    <!-- <a href="<?php the_field('button_link2'); ?>" class="btn-red ">Book Now  <i class="arrow-right"></i></a> -->

                </div>
            </div>          
        </div>
    </section>
    <section>
        <div class="container">
            <div class="title text-center">
                <h2><?php the_field('title3'); ?></h2>
                <div class="mb-30"><?php the_field('description3'); ?></div>
            </div>
            <div class="row bgdark">
                <div class="col-md-4 ">                    
                    <h4 class="white-color"><?php the_field('franchise_title_1'); ?></h4>
                    <p class="white-color"><?php the_field('franchise_description_1'); ?></p>
                </div>
                <div class="col-md-4">
                    <h4 class="white-color"><?php the_field('franchise_title_2'); ?></h4>
                    <p class="white-color"><?php the_field('franchise_description_2'); ?></p>
                </div>
                <div class="col-md-4">
                    <h4 class="white-color"><?php the_field('franchise_title_3'); ?></h4>
                    <p class="white-color"><?php the_field('franchise_description_3'); ?></p>
                </div>
            </div>
        </div>  
    </section>
    
    <?php $image1= get_field('support_image_1'); //print_r($image1); ?>
    <?php $image2= get_field('support_image_2'); //print_r($image1); ?>
    <?php $image3= get_field('support_image_3'); //print_r($image1); ?>
    <section class="bg-light-gray">
        <div class="container">
            <div class="title text-center">
                    <h2><?php the_field('title4'); ?></h2>
            </div>   
            <div class="row bottom-box">
                <div class="col-md-4 ">  
                <div>    
                    <img src="<?php echo $image1['url'];?>">              
                    <h4 ><?php the_field('support_title_1'); ?></h4>
                    <p ><?php the_field('support_description_1'); ?></p>
                </div>
                </div>
                <div class="col-md-4">
                    <div>
                    <img src="<?php echo $image2['url'];?>">              
                    <h4 ><?php the_field('support_title_1'); ?></h4>
                    <p ><?php the_field('support_description_1'); ?></p>
                </div>
                </div>
                <div class="col-md-4">
                    <div>
                    <img src="<?php echo $image3['url'];?>">              
                    <h4 ><?php the_field('support_title_1'); ?></h4>
                    <p ><?php the_field('support_description_1'); ?></p>
                </div>
                </div>
            </div>       
        </div>
    </section>
     <section>
        <div class="container">
                <div class="title text-center">
                    <h2><?php the_field('title6'); ?></h2>
                    <div class="mb-30"><?php the_field('description6'); ?></div>
                </div>
                <div class="row">
                    
                </div>
            </div>  
    </section>
    <section class="blue-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                        
                        <h3 class=" white-color"><?php the_field('title5'); ?></h3>
                </div>
                <div class="col-md-5 content-middle">
                      <a href="<?php the_field('button_link5'); ?>" class="btn-light btn button-custom animated" data-animation-in="fadeInUp"><?php the_field('button_text5'); ?> <i class="arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
   



    
</div>
<?php get_footer();?>