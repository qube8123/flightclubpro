<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

  if( isset($_REQUEST['bookID']) ){  

         global $woocommerce;   //assuming the form method is 'post'
        update_post_meta($_REQUEST['bookID'], 'fees_info',  wc_clean( wp_unslash( $_REQUEST['fees'] ) ) );
           $woocommerce->cart->add_to_cart( $_REQUEST['bookID'] );
         echo $woocommerce->cart->get_cart_url();
         
        exit;
    }

defined( 'ABSPATH' ) || exit;


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */


get_header();

get_header( 'shop' );
do_action( 'woocommerce_before_main_content' );

?>

  <main id="main">
	  	<section class="hero_banner" style="background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2021/03/hero-img.jpg); height: 40vh;">
      
    </section>	
    <section class="section_box  work-event bggray" id="package">        
        <div class="container ">
            <div class="text-center mb-30">
                    <h3 class="section_title ">Room Packages</h3>
                </div>
           <div class="row">
                <div class="col-md-4">
                    <div style="border: 1px solid darkgray;padding: 10px;border-radius: 5px;background: #fff;">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-35.jpg">
                    <div class="events-content">
                        <h4 class="trip_title">Superior Room - River View</h4>
                        <p>Single Occupancy – $2,043/PERSON<br>
                        Double Occupancy – $1,595/PERSON</p>
                        <button data-toggle="modal" data-target="#room1"class="green_btn">Book Now</button>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="border: 1px solid darkgray;padding: 10px;border-radius: 5px;background: #fff;">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-36.jpg">
                    <div class="events-content">
                        <h4 class="trip_title">Deluxe Room - River View</h4>
                        <p>Single Occupancy – $2,412/PERSON<br>Double Occupancy – $1,861/PERSON</p>
                         <button data-toggle="modal" data-target="#room2"class="green_btn">Book Now</button>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="border: 1px solid darkgray;padding: 10px;border-radius: 5px;background: #fff;">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-37.jpg">
                    <div class="events-content">
                        <h4 class="trip_title">Executive Collection Suite - River View</h4>
                        <p>Single Occupancy – $3,372/PERSON<br>Double Occupancy – $2,410/PERSON</p>
                        <button data-toggle="modal" data-target="#room3"class="green_btn">Book Now</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_box ">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-5 mb-30">

				<header class="woocommerce-products-header">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>

					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>
				</header>
<div class="text-center mb-30">
<h3 class="section_title">Merchandise</h3>
</div>
<div class="vip"><?php echo do_shortcode('[products columns="3" orderby="date" category="flight-club-vip"]');?></div>
<hr>
<div class="text-center mb-30 mt-30">
<h3 class="section_title">Shop The Collection</h3>
</div>
  <?php echo do_shortcode('[products columns="4" orderby="date" category="dream-without-limits"]');?>



          </div>
        </div>
      </div>
      </section>

      
  </main><!-- End #main -->

    
<?php
get_footer();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<div class="modal fade rooms" id="room1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>
      <div class="modal-body">
        <div class="text-center">
            <h4  ><b>Superior Room - River View</b></h4>
            <span>250 square feet</span>
            <p class="padd30">The dream-catcher headboard is designed to guarantee sound sleep. Just like the warm colors inspired by the Quebec winter. The midnight blue, the immaculate white and the sunny yellow light up this spacious bedroom with its soothing atmosphere. A convertible fireside chair is suitable as a child's bed and is separated from the rest of the room by a curtain.</p>
        </div>
            <div class="single_event_gallery mt-5">            
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-401.png">
                </div>
              <!--   <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-402.png">
                </div>
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-403.png">
                </div>   -->              
            </div>
            <div class="bg-gold">
                <p class="white-color"><b>Amenities</b></p>
            </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="bg-gray">Equipment</p>
                        <ul>
                            <li>Telephone</li>
                            <li>Internet</li>
                            <li>Television(s)</li>
                            <li>Convertible armchair</li>
                            <li>Mini fridge (non provisioned)</li>
                            <li>Kettle - Coffee/tea making facilities</li>
                            <li>Iron & ironing-board</li>
                            <li>Safe deposit box</li>
                            <li>Socket type A: 100-127 V</li>
                            <li>USB socket</li>
                            <li>Heating</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="bg-gray">Bathroom</p>
                        <ul>
                            <li>Bathtub</li>
                            <li>Twin vanity sinks</li>
                            <li>Separate toilets</li>
                            <li>Hair Dryer</li>
                            <li>Magnifying mirror</li>
                            <li>Amenities (shampoo, shower gel, body lotion)</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="bg-gray">Services</p>
                        <ul>
                            <li>Luggage service</li>
                            <li>Laundry service (extra charge)</li>
                        </ul>
                    </div>

                </div>

            </div>
            <hr>   
             <div class="row">
                <div class="col-md-5"> 
                    <div class="prices" style="border-right: 1px solid #CFD8DC;">
                        <p>Single Occupancy<br> $2,043/PERSON</p>
                        <a name=""  class="green_btn clicker">Book This Event</a>
                        <div class="payment_mode">
                            <h4><span >Full Payment: </span><button name="checkout_now1" class="green_btn" data-id="1851">Book Now</button></h4>
                            <h4><span >Self Service Payment: </span><span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1925" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1925">Book Now</button></h4>
                            <h4><span >AutoPay-in-4:  </span>
                                <span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1925" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1925">Book Now</button></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"> 
                    <div class="prices">
                        <p>Double Occupancy<br>$1,595/PERSON</p>
                        <a name=""  class="green_btn clickernew">Book This Event</a>
                        <div class=" payment_modenew">
                            <h4><span >Full Payment: </span><button name="checkout_now1" class="green_btn" data-id="1885">Book Now</button></h4>
                            <h4><span >Self Service Payment: </span> <span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1926" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1926">Book Now</button></h4>
                            <h4><span >AutoPay-in-4:  </span>
                                <span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1926" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1926">Book Now</button></h4>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                   $('.payment_mode .green_btn').click(function(){
                   		
                   		$(this).prop('disabled',true);
                        var book_id = $(this).data('id');
                        var fees = $('#fees'+book_id).val();
                        if (fees == "NULL" || fees == "") {
                            fees = 199;
                        }
                         $.ajax({
                              type: "POST",
                              url: "",
                              data: {bookID:book_id,fees:fees},
                              dataType: 'text',
                              success:function(data){
                               // Test what is returned from the server
                                
                                      window.location.href = data;
                              }
                            });
                       
                    });
                   $('.payment_modenew .green_btn').click(function(){
                   		
                   		$(this).prop('disabled',true);
                        var book_id = $(this).data('id');
                        var fees = $('#fees'+book_id).val();
                        if (fees == "NULL" || fees == "") {
                            fees = 199;
                        }
                         $.ajax({
                              type: "POST",
                              url: "",
                              data: {bookID:book_id,fees:fees},
                              dataType: 'text',
                              success:function(data){
                               // Test what is returned from the server
                                
                                      window.location.href = data;
                              }
                            });
                       
                    });
                    $(document).ready(function() {
                        $(".clicker").click(function(){
                           $(".payment_mode").toggle( 'slow', function(){
                              //$(".log").text('Toggle Transition Complete');
                           });
                        });
                     });
                    $(document).ready(function() {
                        $(".clickernew").click(function(){
                           $(".payment_modenew").toggle( 'slow', function(){
                              //$(".log").text('Toggle Transition Complete');
                           });
                        });
                     });
                    
            </script>
      </div>

    </div>
  </div>

<div class="modal fade rooms" id="room2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>
      <div class="modal-body">
        <div class="text-center">
            <h4  ><b>Deluxe Room - River View</b></h4>
            <span>409.03 square feet</span>
            <p class="padd30">Facing a picture window overlooking the St Lawrence River, the bed and the living room are ideal for quiet thought. The burgundy colored wooden plinths, the bright colors and the contemporary furniture make up a welcoming space open to the natural landscape beyond.</p>
            <p class="black-color">Key strengths of the room:</p>
            <ul style="  display: inline-block;  width: auto;"><li >Furnished balcony</li></ul><ul style="  display: inline-block;  width: auto;"><li>River View</li></ul><ul style="  display: inline-block;  width: auto;"><li>Lounge area</li></ul>
        </div>
            <div class="single_event_gallery2 mt-5">            
               <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-402.png">
                </div>
                <!--  <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-401.png">
                </div>
                
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-403.png">
                </div>    -->             
            </div>
            <div class="bg-gold">
                <p class="white-color"><b>Amenities</b></p>
            </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="bg-gray">Equipment</p>
                        <ul>
                            <li>Telephone</li>
                            <li>Internet</li>
                            <li>Television(s)</li>
                            <li>Sofa</li>
                            <li>Kettle - Coffee/tea making facilities</li>
                            <li>Iron & ironing-board</li>
                            <li>Safe deposit box</li>
                            <li>Socket type A: 100-127 V</li>
                            <li>USB socket</li>
                            <li>Heating</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="bg-gray">Bathroom</p>
                        <ul>
                            <li>Bathtub</li>
                            <li>Twin vanity sinks</li>
                            <li>Bathrobe</li>
                            <li>Slippers</li>
                            <li>Separate toilets</li>
                            <li>Hair Dryer</li>
                            <li>Magnifying mirror</li>
                            <li>Amenities (shampoo, shower gel, body lotion)</li>
                            <li>Amenities: (shower cap, vanity kit, manicure kit etc.)</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="bg-gray">Services</p>
                        <ul>
                            <li>Luggage service</li>
                            <li>Laundry service (extra charge)</li>
                            <li>Turndown Service </li>
                            <li>Pool towel </li>
                            <li>Amenities: (non-alcoholic drinks) - refilled upon request</li>
                        </ul>
                    </div>

                </div>

            </div>
            <hr>   
             <div class="row">
                <div class="col-md-5"> 
                    <div class="prices" style="border-right: 1px solid #CFD8DC;">
                        <p>Single Occupancy<br> $2,412/PERSON</p>
                        <a name=""  class="green_btn clicker">Book This Event</a>
                        <div class="payment_mode">
                            <h4><span >Full Payment: </span><button name="checkout_now1" class="green_btn" data-id="1886">Book Now</button></h4>
                            <h4><span >Self Service Payment: </span><span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1922" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1922">Book Now</button></h4>
                            <h4><span >AutoPay-in-4: </span>
                                <span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1922" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1922">Book Now</button></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"> 
                    <div class="prices">
                        <p>Double Occupancy<br>$1,861/PERSON</p>
                        <a name=""  class="green_btn clickernew">Book This Event</a>
                        <div class=" payment_modenew">
                            <h4><span >Full Payment: </span><button name="checkout_now1" class="green_btn" data-id="1887">Book Now</button></h4>
                            <h4><span >Self Service Payment: </span><span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1923" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1923">Book Now</button></h4>
                            <h4><span >AutoPay-in-4:  </span>
                                <span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1923" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1923">Book Now</button></h4>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                   $('.payment_mode .green_btn').click(function(){
                   	
                   		$(this).prop('disabled',true);
                        var book_id = $(this).data('id');
                        var fees = $('#fees'+book_id).val();
                        if (fees == "NULL" || fees == "") {
                            fees = 199;
                        }
                         $.ajax({
                              type: "POST",
                              url: "",
                              data: {bookID:book_id,fees:fees},
                              dataType: 'text',
                              success:function(data){
                               // Test what is returned from the server
                                
                                      window.location.href = data;
                              }
                            });
                       
                    });
                    $('.payment_modenew .green_btn').click(function(){
                    	
                   		$(this).prop('disabled',true);
                        var book_id = $(this).data('id');
                        var fees = $('#fees'+book_id).val();
                        if (fees == "NULL" || fees == "") {
                            fees = 199;
                        }
                         $.ajax({
                              type: "POST",
                              url: "",
                              data: {bookID:book_id,fees:fees},
                              dataType: 'text',
                              success:function(data){
                               // Test what is returned from the server
                                
                                      window.location.href = data;
                              }
                            });
                       
                    });
                   
            </script>
      </div>

    </div>
  </div>

<div class="modal fade rooms" id="room3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
      </div>
      <div class="modal-body">
        <div class="text-center">
            <h4  ><b>Executive Collection Suite - River View</b></h4>
            <span>538 square feet</span>
            <p class="padd30">Long live Quebecois culture and its First Nation heritage. The arrow, iconic symbol of First Nation tradition, is revisited and decorates the walls and floors of this vast Suite. Made up of a living room and a bedroom, a wide balcony overlooking the St Lawrence River and a superb bathroom, the Suite is characterized by its elegance and references to the country's heritage.</p>
            <p class="black-color">Key strengths of the room:</p>
            <ul style="  display: inline-block;  width: auto;"><li >Furnished balcony</li></ul><ul style="  display: inline-block;  width: auto;"><li>River View</li></ul><ul style="  display: inline-block;  width: auto;"><li>Lounge area</li></ul>
        </div>
            <div class="single_event_gallery3 mt-5"> 
            <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-403.png">
                </div>             
              <!--   <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-401.png">
                </div>
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-402.png">
                </div> -->
                              
            </div>
            <div class="bg-gold">
                <p class="white-color"><b>Amenities</b></p>
            </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="bg-gray">Equipment</p>
                        <ul>
                            <li>Telephone</li>
                            <li>Internet</li>
                            <li>Television(s)</li>
                            <li>Sofa</li>
                            <li>Mini fridge (non provisioned)</li>
                            <li>Kettle - Coffee/tea making facilities</li>
                            <li>Iron & ironing-board</li>
                            <li>Safe deposit box</li>
                            <li>Socket type A: 100-127 V</li>
                            <li>USB socket</li>
                            <li>Heating</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p class="bg-gray">Bathroom</p>
                        <ul>
                           <li>Bathtub</li>
                            <li>Twin vanity sinks</li>
                            <li>Bathrobe</li>
                            <li>Slippers</li>
                            <li>Shower</li>
                            <li>Hair Dryer</li>
                            <li>Magnifying mirror</li>
                            <li>Amenities: accessories (vanity kit, manicure kit, etc.) </li>
                            <li>Spa brand amenities (shampoo, shower gel, body lotion)</li> 
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <p class="bg-gray">Services</p>
                        <ul>
                           <li>Champagne served by the glass at 6pm in the private lounge</li>
                            <li>Upgrade transfer for G.M® with transfer package</li>
                            <li>Reserved whirlpool bath for G.M® who are in Exclusive Collection space</li>
                            <li>Your luggage delivered to and picked up from your Suite</li>
                            <li>Room Service included for continental breakfast</li>
                            <li>Priority booking at the Club Med Spa</li>
                            <li>Private bar and snacking at the conciergerie</li>
                            <li>Concierge service</li>
                            <li>Premium Wi-Fi</li>
                            <li>Priority Booking at the Gourmet Lounge</li>
                            <li>Minibar (non-alcoholic drinks) - refilled daily</li>
                            <li>Lunch offered if early arrival (prior to 3.00pm)</li>
                            <li>Pool towel</li>
                            <li>Laundry service (extra charge)</li>
                            <li>Cleaning on demand</li>
                        </ul>
                    </div>

                </div>

            </div>
            <hr>   
             <div class="row">
                <div class="col-md-5"> 
                    <div class="prices" style="border-right: 1px solid #CFD8DC;">
                        <p>Single Occupancy<br> $3,372/PERSON</p>
                       <a name=""  class="green_btn clicker">Book This Event</a>
                        <div class="payment_mode">
                            <h4><span >Full Payment: </span><button name="checkout_now1" class="green_btn" data-id="1888">Book Now</button></h4>
                            <h4><span >Self Service Payment: </span><span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1910" style="padding: 6px;"> <button name="checkout_now13" class="green_btn" data-id="1910">Book Now</button></h4>
                            <h4><span >AutoPay-in-4: </span>
                                <span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1910" style="padding: 6px;"> <button name="checkout_now13" class="green_btn" data-id="1910">Book Now</button>
                               </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"> 
                    <div class="prices">
                        <p>Double Occupancy<br>$2,410/PERSON</p>
                        <a name=""  class="green_btn clickernew">Book This Event</a>
                        <div class=" payment_modenew">
                            <h4><span >Full Payment: </span><button name="checkout_now1" class="green_btn" data-id="1889">Book Now</button></h4>
                            <h4><span >Self Service Payment: </span><span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1909" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1909">Book Now</button></h4>
                            <h4><span >AutoPay-in-4:  </span>
                                <span style="font-size: 12px;"> Minimum of $199 will be charged, if you want to pay higher amount then please add.</span> 
                                <input name="fees" id="fees1909" style="padding: 6px;margin-right: 5px;"><button name="checkout_now13" class="green_btn" data-id="1909">Book Now</button>
                               </h4>
                        </div>

                    </div>
                </div>
            </div>
      </div>
      <script>
                   $('.payment_mode .green_btn').click(function(){
                   	 
                   		$(this).prop('disabled',true);
                        var book_id = $(this).data('id');
                        var fees = $('#fees'+book_id).val();
                        if (fees == "NULL" || fees == "") {
                            fees = 199;
                        }
                        console.log(fees);
                         $.ajax({
                              type: "POST",
                              url: "",
                              data: {bookID:book_id,fees:fees},
                              dataType: 'text',
                              success:function(data){
                               // Test what is returned from the server
                                    
                                      window.location.href = data;
                              }
                            });
                       
                    });
                    $('.payment_modenew .green_btn').click(function(){
                    	
                   		$(this).prop('disabled',true);
                        var book_id = $(this).data('id');
                        var fees = $('#fees'+book_id).val();
                        if (fees == "NULL" || fees == "") {
                            fees = 199;
                        }
                         $.ajax({
                              type: "POST",
                              url: "",
                              data: {bookID:book_id,fees:fees},
                              dataType: 'text',
                              success:function(data){
                                      window.location.href = data;
                              }
                            });
                       
                    });
                   
            </script>
    </div>
  </div>