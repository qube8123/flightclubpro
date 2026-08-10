<div id="footer">
	<section class="footer-section" style="background: url(<?php echo home_url(); ?>/wp-content/uploads/2021/04/Group-4000.jpg);">       
        <div class="container">
        	<div class="row mt-5">
        		<div class="col-md-8 mb-80">
        			
    			<?php  $pageid = get_the_ID();
               //$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
					  //if( !isset( $post_id ) ) return;

					//  echo $template_file = get_post_meta($post_id, '_wp_page_template', true);

					  if($pageid == 744){  
						 ?>
        			<h4>Contact one of our experts today to start designing your dream destination wedding.</h4>
        		<?php }
        		elseif ($pageid == 1346) {?>
                  <h4>  Protection for You During Life's Unexpected Emergencies.<br> Contact us today for a Free Travel Insurance Quote.</h4>
             <?php   }else{
                     ?>
						<h4>Contact one of our experts today to start designing your dream vacation</h4>
        		<?php } ?>
        		</div>
        		<div class="col-md-1 ">
        		</div>
        		<div class="col-md-3 text-right">
        			<a class="yellow_btn white-bg" href="<?php echo home_url(); ?>/discovery-form/">Start your journey</a>
        		</div>
        	</div>
        </div>
    </section>

<footer style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/footer_bg.jpg);">
	<div class="wrap">
		<div class="row">
			<div class="col-md-5">
				<h4 class="footer_item_title">SIGN UP FOR OUR NEWSLETTER</h4>
				<!-- <form action="">
					<div class="form_group">
						<input type="text" placeholder="Full Name*">
					</div>	
					<div class="form_group">
						<input type="number" placeholder="Phone number*">
					</div>	
					<div class="form_group">
						<input type="email" placeholder="Email Address*">
				div>
					<div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck3">
                        <label class="form-check-label" for="exampleCheck3">I am happy to receive emails from Flight Club VIP Travel including the latest travel guides, tips and information.</label>
                    </div>
					<button type="submit" class="yellow_btn">Start my journey</button>
				</form> -->
				<?php dynamic_sidebar('sidebar-2'); ?>
			</div>
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-4">
						<?php dynamic_sidebar('sidebar-3'); ?>
						<!-- <h4 class="footer_item_title">DESTINATIONS</h4> -->
						
					</div>
					<div class="col-md-4">
						<?php dynamic_sidebar('sidebar-4'); ?>
						
					</div>
					<div class="col-md-4">
						<?php dynamic_sidebar('sidebar-5'); ?>
						
					</div>
				</div>
			</div>
		</div>
		<div class="social_media_block">
			<div class="copywrite">
				<?php dynamic_sidebar('sidebar-6'); ?>
			</div>
			<?php dynamic_sidebar('sidebar-7'); ?>
		</div>
	</div>
</footer>
 
</div>
<!-- Footer Ends --> 
<style>
	.blockUI.blockOverlay, .blockUI.blockMsg.blockElement {
    display: none;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/glightbox/js/glightbox.min.js"></script>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script> <!-- main -->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>

 $(document).ajaxComplete(function() {
  /* 	$(".recurring-total td").text(function(index, text) { 
	    return text.replace(' / renewal', ""); 
	});    */
	var search = "renewal";
var replacement = "Payment installment";

document.body.innerHTML = document.body.innerHTML.split(search).join(replacement);
	 $(".blockUI.blockOverlay").css("display", "none");
	  $(".blockUI.blockMsg.blockElement").css("display", "none");
});
 

    $('.testimonial_slider').slick({
        infinite: true,
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 1,
        variableWidth: true,
        arrows : false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
    });
    $('.home_slider').slick({
        infinite: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows : false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 3000,
    });
    $('.related_post').slick({
        infinite: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows : true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 3000,
    });
    $('.event_gallery').slick({
        infinite: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows : false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
    });
   
    // $('#gallery-slider').slick({
    //     centerMode: true,
    //     centerPadding: '0px',
    //     slidesToShow: 2,
    //     variableWidth: true
    // });
	/*var prevstr = $('.slick-prev').text();
	$('.slick-prev').text(prevstr.replace('Previous',''));*/

function myFunction() {
  var x = document.getElementById("topnav");
  if (x.className === "nav_items--menu") {
    x.className += " responsive";
  } else {
    x.className = "nav_items--menu";
  }
}


		$(document).ready(function() {
			

		$('.tablinks').bind('click', function(e) {
				$('.tablinks').removeClass( "active" );
				e.preventDefault(); // prevent hard jump, the default behavior

				var target = $(this).attr("href"); // Set the target as variable
				
				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: $(target).offset().top-150
				}, 600);

				$(this).addClass( "active" );

				return false;
		});
});
		setTimeout(function() { 
			var prevstr = $('.slick-prev').text();
  			$('.slick-prev').text(prevstr.replace('Previous','')); 
  			var nextstr = $('.slick-next').text();
  			$('.slick-next').text(nextstr.replace('Next','')); 
  		}, 2000);
$( document ).ajaxComplete(function() {

  $( ".form_eccbc87e4b5ce2fe28308fd9f2a7baf3_error_border" ).css('border', "1px solid #F00!important");
  $("iframe span").css("color", "white");
});


var iframe = document.getElementById('hs-form-iframe-1');
iframe.addEventListener("load", ev => {
    const new_style_element = document.createElement("style");
    new_style_element.textContent = "iframe span { display: none; }"
    ev.target.contentDocument.head.appendChild(new_style_element);
});


</script>

</body>
</html>


	