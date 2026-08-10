<?php
/*Template Name: IV Therapy*/

get_header();
$benefit = get_field('benefit2');
print_r($benefit);
                      echo $benefit['titles']; 
?>

<div class="mainContainer"> 

<?php $image1= get_field('image1'); //print_r($image1); ?>
    <section class="section_box banner-section" style="background: linear-gradient(rgba(1, 1, 1, 0.8), rgba(25, 34, 38, 0.7)), url(<?php echo $image1['url']; ?>);">        
         <div class="banner_text text-center">
            <h2><?php the_field('title1'); ?></h2>
        </div>            

    </section>
    <?php $image2= get_field('image2'); //print_r($image1); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-50 mt-50">
                    <img src="<?php echo $image2['url']; ?>">
                </div>
                <div class="col-md-6 content-middle">
                    <h2><?php the_field('title2'); ?></h2>
                    <div class="mt-30 mb-30"><?php the_field('description2'); ?></div>
                    <a href="<?php the_field('button_link2'); ?>" class="btn-red ">Book Now  <i class="arrow-right"></i></a>

                </div>
            </div>          
        </div>
    </section>
    <section>
         <div class="container mb-80">
            <div class="row">
                <?php //for ($i=1; $i < 10; $i++) { 
                    for ($i=1; $i < 8; $i++) { 
                   
                   $therapy = get_field('therapy'.$i);
                    if( $therapy ): // $img= ?>
                <div class="col-md-4">
                    <div class="border-box text-center">
                        <img src="<?php echo $therapy['image']['url']; ?>">
                        <h4><?php echo $therapy['title']; ?></h4>
                        <p><?php echo $therapy['description']; ?></p>
                    </div>
                </div>
                 <?php 
                       endif; } ?>
               <!--  <div class="col-md-4 ">
                    <div class="border-box text-center">
                        <img src="">
                        <h4>Glutathione</h4>
                        <p>An antioxidant that is great for liver efficiency, reduces free radicals, and can assist in improving skin health.</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="border-box text-center">
                        <img src="">
                        <h4>Glutathione</h4>
                        <p>An antioxidant that is great for liver efficiency, reduces free radicals, and can assist in improving skin health.</p>
                    </div>
                </div> -->

            </div>
        </div>
    </section>
    <section >
        <div class="container border-top s "> 
            <div class="title text-center">
                <h2 class="  mt-20"><?php the_field('title3'); ?></h2>
                <?php the_field('description3'); ?>
            </div>
            <div class="row mb-50 therapy">
                  <?php 

                     // echo $benefit['titles']; 
                    for ($i=1; $i < 11; $i++) { 
                   
                     $benefittitles = get_field('titles_'.$i);
                      $benefitimages = get_field('images_'.$i);
                      $benefitdescriptions = get_field('descriptions_'.$i);
                   ?>
                       
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="<?php echo $benefitimages['url']; ?>"/>
                    <div class="ab-content ">
                        <p><?php echo $benefittitles; ?></p>
                        <p class="description"><span><?php echo $benefittitles; ?></span><br><?php echo $benefitdescriptions; ?></p>
                    </div>
                </div>
                  <?php 
                 } ?>
               <!--  <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/CombatDehydration.png">
                    <div class="ab-content ">
                        <p>Combat Dehydration</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/boostenergy.png">
                    <div class="ab-content ">
                        <p>Boost energy</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/ReduceHangovers.png">
                    <div class="ab-content ">
                        <p>Reduce Hangovers</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/ReduceBloating.png">
                    <div class="ab-content ">
                        <p>Reduce Bloating</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/Rectangle32.png">
                    <div class="ab-content ">
                        <p>Reduce Electrolyte Imbalance</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>       
                 <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/BeautifyYourSkin.png">
                    <div class="ab-content ">
                        <p>Beautify Your Skin</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>  
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/StrengthenandGrowYourHair.png">
                    <div class="ab-content ">
                        <p>Strengthen and Grow Your Hair</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>  
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/EnhanceTravel.png">
                    <div class="ab-content ">
                        <p>Enhance Travel</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>  
                <div class="col-md-4 bg-treat pos-rel mb-30">
                    <img src="https://dripfxiv.wpengine.com/wp-content/uploads/2021/08/FasterRecoveryAfterSurgery.png">
                    <div class="ab-content ">
                        <p>Faster Recovery After Surgery</p>
                        <p class="description">When you sweat you aren't just losing water. You're also losing nutrients that your body needs to recover. So only drinking water isn't sufficient to what you need. Our IV therapies ensure that your body has everything it needs to thrive.</p>
                    </div>
                </div>   -->        
            </div>
           
            
        </div>
    </section>
    <section class="blue-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                        <p class="font-big mt-50"><?php the_field('title5'); ?></p>
                        <h3 class=" white-color"><?php the_field('sub_title5'); ?></h3>
                        <div class="mb-50 white-color"><?php the_field('description5'); ?></div>
                </div>
                <div class="col-md-5 content-middle">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="white-btn" value="Join Now">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    
</div>
<?php get_footer();?>