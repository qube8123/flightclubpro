<?php
/*Default Template*/
get_header();
?>
<section class="hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 75%), rgb(23 132 124 / 75%), rgb(66 132 95 / 75%), rgb(103 128 68 / 76%), rgb(138 120 54 / 75%)), url(<?php echo home_url(); ?>/wp-content/uploads/2021/03/hero-img.jpg); height: 30vh;">
      
    </section>
<div class="mainContainer">
	<section class="section_box ">   		
        <div class="container ">
        	<div class="row mb-80">
        		<div class="col-md-12 mt-50">
        			<?php the_content(); ?>	
        		</div>
        	</div>        	
        </div>
    </section>
</div>
<?php
get_footer();?>