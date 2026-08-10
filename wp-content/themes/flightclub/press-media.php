<?php
/* 
Template Name: Press Media
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
        
   <section class="section_box background_image group_section press-section">   		
        <div class="container ">
        	 <div class="row">
                <div class="col-md-2 "></div>
                <div class="col-md-8 text-center">
                    <b><?php the_content(); ?></b>
                </div>
                <div class="col-md-2 "></div>
            </div>

            <div class="row">  
                <div class="col-md-12 mt-5 ">
                 <div class="text-center">
                    <h3 class="section_title"><?php if( get_field('title')): echo get_field('title'); endif; ?></h3>
                    <p><?php if( get_field('subtitle')): echo get_field('subtitle'); endif; ?></p>
                </div>
                </div>
            </div>
            <div class="row mb-50">
            <?php  
                $args = array(  
                    'post_type' => 'pressmedia',
                    'post_status' => 'publish',
                    'posts_per_page' => 8, 
                    'orderby' => 'date', 
                    'order' => 'DESC'
                );

                $loop = new WP_Query( $args );                     
                while ( $loop->have_posts() ) : $loop->the_post(); 
                $featured_img = get_the_post_thumbnail_url( get_the_ID(), 'full');  ?>
		   		<div class="col-md-6 mt-5"> 
                    <div class="press-media"> 
                        <div class="press-img">
                            <img src='<?php echo $featured_img; ?>'> 
                            <?php if( get_field('type') == 'youtube'): ?>
                            <img src='<?php echo home_url(); ?>/wp-content/uploads/2021/04/Group-3964.png' class="youtubimg"> 
                            <?php endif; ?> 
                         
                        </div>
                        <div class="trip_title text-left">      
                            <h5><?php the_excerpt(); ?></h5>                  
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo substr(get_the_content(), 0, 180);  ?></p>
                           <?php if( get_field('type') == 'youtube'){?> 
                            <a href="<?php  echo get_field('link');?>" class="yellow_btn glightbox btn-watch-video" >Watch Video</a> 
                            <?php }else{ ?>
                             <a href="<?php  echo get_field('link');?>" class="yellow_btn" >Read Article</a> 
                         <?php }?>

                        </div>              
    		        </div>
                </div>
	               <?php     
                    endwhile;
                    wp_reset_postdata(); 
                    ?>
		     </div>
             <div class="row">
                <div class="col-md-12 ">
                    <?php if( get_field('content')): echo get_field('content'); endif; ?>
                </div>
            </div>
        </div>
    </section>
   
</div>

<?php
get_footer();

?>
