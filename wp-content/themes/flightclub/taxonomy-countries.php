<?php
/**
 * Create an unordered list of links to active location archives
 */
$uri = $_SERVER['REQUEST_URI'];
$country= str_replace('/', ' ', str_replace('-', ' ', str_replace('/countries/', ' ', $uri))); // Outputs: URI

get_header();
?>
	<section class="hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo home_url(); ?>/wp-content/uploads/2021/03/Group-3941.jpg);">
        <div class="banner_text text-center">
            <h2><?php echo $country; ?></h2>
            <p></p>
        </div>	
    </section>
      <section class="trip_section section_box background_image">
       
        <div class="container">
             <div class="text-center">
                <h3 class="section_title">Inspiring Luxury Trip Ideas</h3>
            </div>
            <div class="row">
                <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  
                 $args = array(  
        'post_type' => 'packages',
        'post_status' => 'publish',
        'posts_per_page' => 6, 
        'orderby' => 'title', 
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'countries', // Here I have set dummy taxonomy name like "taxonomy_cat" but you must be set current taxonomy name of annoucements post type. 
                'field' => 'name',
                'terms' => $term->name
            )
        ) 
    );

    $loop = new WP_Query( $args ); 
        if ( $loop->have_posts() ) {
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
    }else{
        echo '<div class="col-md-12 text-center"><h3>No record found</h3></div>';
    }
    wp_reset_postdata(); 

    ?>  
                
            </div>
        </div>
    </section>
	
<?php
get_footer();?>