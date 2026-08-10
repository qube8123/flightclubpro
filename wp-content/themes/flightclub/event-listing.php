<?php
/*Template Name: Event Listing*/
get_header();
?>
<div class="mainContainer">
    <!-- Start Here -->
    
  <section class="hero_banner" style="background-image:  linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-29.png);">
        <div class="banner_text text-center">
            <h2>Events Listings<?php// echo $banner_section['banner_title']; ?></h2>
            <p><?php echo $banner_section['short_description']; ?></p>
        </div>
    </section>
    
   <section class="section_box gray-bg">   		
        <div class="container ">
        	<div class="row">
        		<div class="col-md-4">
        			<div style="border: 1px solid darkgray;padding: 10px;border-radius: 5px;">
        			<img src="<?php echo home_url(); ?>/wp-content/uploads/2021/03/Mask-Group-94.jpg">
        			<div class="events-content">
        			<div class="row">
        				<div class="col-md-9">
        					<h4 class="trip_title" style="min-height: unset;">Urban Camp Weekend</h4>
        					<p>Canyon Lake, Texas 7813</p>
        				</div>
        				<div class="col-md-3  content-middle">
        					<p>3 Days</p>
        				</div>
        			</div>
        			</div>
        		</div>
        		</div>
        		<div class="col-md-4">
        			<div style="border: 1px solid darkgray;padding: 10px;border-radius: 5px;">
        			<img src="<?php echo home_url(); ?>/wp-content/uploads/2021/03/Mask-Group-94.jpg">
        			<div class="events-content">
        			<div class="row">
        				<div class="col-md-9">
        					<h4 class="trip_title" style="min-height: unset;">Urban Camp Weekend</h4>
        					<p>Canyon Lake, Texas 7813</p>
        				</div>
        				<div class="col-md-3  content-middle">
        					<p>3 Days</p>
        				</div>
        			</div>
        			</div>
        			</div>
        		</div>
        		<div class="col-md-4">
        			<div style="border: 1px solid darkgray;padding: 10px;border-radius: 5px;">
	        			<img src="<?php echo home_url(); ?>/wp-content/uploads/2021/03/Mask-Group-94.jpg">
	        			<div class="events-content">
		        			<div class="row">
		        				<div class="col-md-9">
		        					<h4 class="trip_title" style="min-height: unset;">Urban Camp Weekend</h4>
		        					<p>Canyon Lake, Texas 7813</p>
		        				</div>
		        				<div class="col-md-3  content-middle">
		        					<p>3 Days</p>
		        				</div>
		        			</div>
	        			</div>
	        		</div>
        		</div>
        	</div>
        </div>
    </section>

<?php
get_footer();?>