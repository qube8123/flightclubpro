<?php
/*Default Template*/
get_header();
?>

  <main id="main">
	  	<section class="hero_banner" style="background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2021/03/hero-img.jpg); height: 40vh;">
      
    </section>	
    <section class=" mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-5 mb-30">
   

    <?php while ( have_posts() ) : ?>
      <?php the_post(); ?>

      <?php wc_get_template_part( 'content', 'single-product' ); ?>

    <?php endwhile; // end of the loop. ?>

          </div>
        </div>
      </div>
      </section>
  </main><!-- End #main -->

    
<?php
get_footer();?>