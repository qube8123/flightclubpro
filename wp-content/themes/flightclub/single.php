<?php 
 /* The loop */ 

get_header();
?>
<?php //while ( have_posts() ) : the_post(); ?>
<div class="mainContainer ">
	 <?php
	  
	 $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');	?>

    <section class="hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo $featured_img; ?>);">  

    	<div class="container">
	        <div class="banner_text text-center">
	            <h2><?php the_title();?></h2>
	            <!-- <p>Where is the Best Place to swim </p> -->
	        </div>
      </div>
    </section>
    <section class="section_box">  

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="author_block"><?php echo get_field('author_detail'); ?></div>
                    <hr>
                    <?php the_content();?>
                </div>
            </div>
      </div>
    </section>

        <?php 
       
        $sections=get_field('sections');
        for ($i=1; $i <= $sections; $i++) {     
            $section = get_field('section_'.$i);
            $image = 'image'.$i;
          if ( $i == 1 || $i == 4 || $i == 7 || $i == 10) {  
           if ( $i == 1 || $i == 7) {
                $class="image-left";
           }else{
                $class="image-right";
           }                     
            ?> 
    <section class="section_box background_image2 work">	
        <div class="container ">   
        	<div class="row">
            <div class="col-md-12"> 
                    <div class="<?php echo $class; ?>">                        
                       <img src="<?php echo $section[$image]['url']; ?>">
                        <div class="contents ">
                          <h4 class="trip_title"><?php echo $section['title']; ?></h4>
                             <p ><?php echo $section['description']; ?> </p>                             
                        </div>
                    </div>
                </div>
	        </div>   
	    </div>
	</section>
	<?php }elseif( $i == 2 || $i == 5 || $i == 8) {                   ?>
	 <section class="section_box background_image1 work">	
        <div class="container ">   
	        <div class="row">
           		<div class="col-md-6 content-middle">                       
                  <h4 class="trip_title"><?php echo $section['title']; ?></h4>
	                <p><?php echo $section['description']; ?> </p> 	                		 
	                		 
                </div> 
                <div class="col-md-6 ">
                <img src="<?php echo $section[$image]["url"]; ?>">                                    	
                                       
                </div>
            </div>
        </div>
    </section>
    <?php } else{ ?>
    <section class="section_box background_image2 work">	
        <div class="container ">    
	        <div class="row">
		   		<div class="col-md-6">                   	
		            <img src='<?php echo $section[$image]["url"]; ?>'>
		        </div>
		            <div class="col-md-6 content-middle"> 
		              <h4 class="trip_title"><?php echo $section['title']; ?></h4>
	                <p ><?php echo $section['description']; ?> </p> 
		            </div>
		       </div>
	  	  </div>
	</section>
	<?php } 
		}?>
 <!--    <section class="section_box ">    
        <div class="container ">    
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 author_block">    
                    <h4 class="trip_title">Author</h4>               
                    <p><?php //echo get_field('author_detail'); ?></p>
                </div>   
                <div class="col-md-3"></div>                
            </div>
          </div>
    </section> -->

    <section class="section_box background_image mt-5">
       
       <div class="container">
        <div class="related_post">
           <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					    $args = array(
					  'order' => 'ASC',
					  'orderby' => 'ID',
					  'post_type' => 'post',
					  'post_status' => 'publish',
					  'posts_per_page' => 6,
					  'ignore_sticky_posts' => 1
					);

					$query = new WP_Query($args);

					while ( $query->have_posts() ) : $query->the_post();
					  $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');
					
					 ?>
            	<div class="t_slide">
                <div class=" trip_block blog_block "> 
                    <div class="image-mid">
                    	
                        <img src="<?php echo $featured_img; ?>">
                        <div class="contents text-center">
                           <div class="blog_date"><img src="<?php echo get_template_directory_uri(); ?>/img/Group_3870.png" > <?php echo get_the_date(); ?></div>
                            <h4 class="trip_title "><?php echo get_the_title();?></h4>                             
                            <a href="<?php echo get_the_permalink();?>" class="yellow_btn mt-5">Read More</a>

                        </div>
                    </div>
                </div>
            	</div>
                <?php endwhile;

 /*   $loop = new WP_Query( $args ); 
        
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
            endwhile;*/
            wp_reset_postdata(); 
            ?>

        </div>
    </div>
    </section>
	
</div>
<?php //endwhile; ?>
<?php
get_footer();?>