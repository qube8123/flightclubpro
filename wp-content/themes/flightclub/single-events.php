 <?php 
 /* The loop */ 


  if( isset($_REQUEST['bookID']) ){  

         global $woocommerce;   //assuming the form method is 'post'
        update_post_meta($_REQUEST['bookID'], 'fees_info',  wc_clean( wp_unslash( $_REQUEST['fees'] ) ) );
           $woocommerce->cart->add_to_cart( $_REQUEST['bookID'] );
         echo $woocommerce->cart->get_cart_url();
         
        exit;
    }
    get_header();
?>

<!-- Main Container Starts -->
<div class="mainContainer">
    <!-- Start Here -->
        <?php
/*$banner_section = get_field('banner');
if( $banner_section ): */?>
    <section class="hero_banner" style="background-image: linear-gradient(to right, rgb(16 129 147 / 55%), rgb(23 132 124 / 55%), rgb(66 132 95 / 55%), rgb(103 128 68 / 76%), rgb(138 120 54 / 55%)), url(<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-291-1.png);">
        <div class="banner_text text-center">
            <h2><?php the_title();
            //echo $banner_section['banner_title']; ?></h2>
            <p>Quebec, Canada | December 7-11, 2023</p>
              
             <a href="#package" class="yellow_btn">Book This Event</a>
        </div>
    </section>
    <?php// endif; ?>   
      
  
      
     <section class="section_box background_image5 ">        
        <div class="container ">
             <div class="row">
                 
                 <div class="col-md-5 mt-5">                      
                        <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/03/Updated_portrait.jpg">
                    </div>
                <div class="col-md-7 content-middle"> 
                  <h4 class="trip_title mt-20">About The Event </h4>
                    <p class="mt-5">Hit the slopes with Flight Club VIP for an all inclusive 5 day experience as we Escape to a Winter Wonderland in Quebec, Canada where sea and mountains meet steep cliffs, exceptional parks, and charming villages covered in snow.  Whether you’re a novice or experienced winter sport enthusiast or even just a travel lover looking to experience something different, this trip will surely provide the perfect mix for all travelers.
</p><p class="mt-5">
le Massif de Charlevoix offers the most spectacular skiing East of the Rockies which will impress even the most experienced skiers. With a large choice of 53 runs for all levels along with the most extensive off-piste skiing (98 acres), and the greatest vertical drop East of the Rockies (2,525 ft) we are sure there’s enough fun for everyone to enjoy the slopes during the fun field Black Powder Xchange.</p> 
                   <a href="#package" class="yellow_btn mt-20">Book Now</a>
                </div>                  
               
                  
             </div>

        </div>
    </section>
    <section class="section_box bggray ">        
        <div class="container ">
            <div class="text-center">
            <h3 class="section_title ">Your Flight Club VIP Package Includes</h3>
        </div>
              <div class="check-list-box list-box">
               <ul>
                    <li>Complete Travel Management</li>
                    <li>4 Nights Accommodations</li>
                    <li>Open Bar</li>
                    <li>RT Airport Transfers</li>
                    <li>All- Inclusive Gourmet Dining</li>
                    <li>VIP Welcome Gifts </li>
                    <li>Welcome Kickoff</li>
                    <li>Group Dinner</li>
                    <li>Lift Tickets </li>
                    <li>Resort Tips and Taxes Included </li>
                    <li>Ski/Snowboard Lessons</li>
                    <li>Group Excursions </li>
                    <li>Pool Kickback </li>
                    <li>Farewell Mixer</li>
                    <li>Daytime Activities and Nightly Entertainment</li>
                </ul>
            </div>  
                    
        </div>
    </section>
    <section class="section_box ">        
        <div class="container ">
            <div class="text-center">
                <h3 class="section_title ">Photo Gallery</h3>
                <p>Discover Club Med, the new all-inclusive resort in Quebec Charlevoix, a beautiful vacation spot for winter sports travelers. Experience the best of ski, sports, and Quebec culture, with a twist of Club Med spirit.</p>
            </div> 
            <div class="event_gallery mt-5">            
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-8.jpg">
                </div>
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-334.jpg">
                </div>
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-300.jpg">
                </div>
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-8.jpg">
                </div>
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-334.jpg">
                </div>
                <div class="t_slide">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-300.jpg">
                </div>
            </div>
        </div>
    </section>

     <section class="section_box  work-event">        
        <div class="container ">
            <div class="col-md-12"> 
            <div class="image-left">                        
               <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-297.jpg">
                <div class="contents ">
                  <h4 class="trip_title">Property Description </h4>
                     <p class="mt-5">Club Med's first North American Mountain Resort, where sea and mountains meet, is located in the Charlevoix Region in Québec. The resort offers a ski experience that will impress even the most experienced skiers. Architecturally designed with a contemporary and traditional Canadian style, our Resort is perched in the heart of the region, immersed in the unspoiled natural landscape with amazing views of the St. Lawrence River. A wide array of activities are offered year-round to experience the region's ever-changing landscape, with each season with trails for skiing in the winter and hiking in the summer. </p>                             
                </div>
            </div>
        </div>
    </div>
    </section>
     <section class="section_box  work-event">        
        <div class="container ">
            <div class="col-md-12"> 
                <div class="image-right">                        
                   <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/clubmed16-1.png" style="max-height: 220px;margin-bottom: 5px;min-height: 200px;">
                   <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-338.png" style="max-height: 220px;margin-bottom: 5px;min-height: 200px;">
                   <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-339.png" style="max-height: 220px;margin-bottom: 5px;min-height: 200px;">
                    <div class="contents ">
                      <h4 class="trip_title">Club Med Charlevoix</h4>
                        <div class="check-list-box list-box">
                           <ul style="column-count: 1;  max-height: unset;">
                                <li>Themed Ski Workshops designed to be fun, engaging and interactive!</li>
                                <li>Spectacular views: Large windows glasses to enjoy the natural sunlight as much as possible</li>
                                <li>Ski in, ski out, so you can get on your skis right to the slopes from the resort</li>
                                <li>One-of-a-kind vantage point at the heart of the Charlevoix region: built between the river and the mountains.</li>
                                <li>Go on a gourmet gastronomic journey with three signature dining concepts inspired by classic Canadian and French cuisines</li>
                                <li>Outdoor whirlpool bath, outdoor terrace and sauna overlooking the St Lawrence River and the surrounding natural environment. </li>
                                <li>A paradise for skiers and non-skiers alike with options such as trapeze & circus, ice skating yoga, and so much more to enjoy</li>
                                <li>Complimentary In-Resort Medical Emergency Assistance</li>
                            </ul>
                        </div>                           
                    </div>
                </div>
            </div>
        </div>
    </section>
     
    <section class="section_box ">        
        <div class="container ">
            <div class="row">
                <!-- <div class="col-md-6">
                    <div class="gold-event">
                        <div class="event-img">
                            <img src="<?php echo home_url(); ?>/wp-content/uploads/2021/06/Frame-1.png">
                        </div>
                        <div class="event-con">
                            <h4 class="white-color">Book $250 non-refundable deposit</h4>
                            <p class="white-color">($100 early bird special currently)</p>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="green-event">
                           <img src="<?php echo home_url(); ?>/wp-content/uploads/2021/06/Frame-1.png" style="max-width: 60px;display: inline-block;">
                            <a href="#package"><h4 class="white-color" >BOOK NOW - $250 DEPOSIT</h4></a>
                             <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Group-3855.png" style="max-width: 100px;display: inline-block;float: right;margin-top: -25px;">
                            <!-- <p class="white-color">(final payment is due by april 3rd)</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="section_box  work-event">        
            <div class="container ">                
                <div class="col-md-12"> 
                <div class="image-right">                        
                   <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Rectangle-307.jpg">
                    <div class="contents ">
                      <h4 class="trip_title">All Rooms offer<br>the following amenities </h4>
                        <div class="check-list-box list-box" >
                           <ul style="column-count: 1;  max-height: unset;">
                                <li>Telephone</li>
                                <li>WiFi</li>
                                <li>Television(s)</li>
                                <li>Convertible Armchair</li>
                                <li>Mini Fridge</li>
                                <li>Kettle - Coffee/Tea maker</li>
                                <li>Iron & Ironing-board</li>
                                <li>Safe Deposit Box</li>
                                <li>USB socket</li>
                                <li>Separate Toilet Area</li>
                                <li>Hair Dryer</li>
                                <li>Magnifying Mirror</li>
                                <li>Amenities (shampoo, shower gel, body lotion)  </li>
                            </ul>                        
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="section_box  work-event">        
        <div class="container ">
            <div class="text-center mb-30">
                    <h3 class="section_title ">Travel Insurance</h3>
                </div>
            <div class="col-md-12"> 
                                    
                <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/03/HYGP1r_A.jpeg" class="mb-20">
               
                <h4 class="trip_title mt-5">Protect Your Travel </h4>
                <p class="mt-5">A vacation is an investment of your valuable time and your hard-earned money. Help protect that investment from the unexpected with a travel protection plan. You’ll receive travel protection, which covers lost luggage and reimburses you for covered losses due to bad weather, delays and medical expenses. Also included is a pre-departure cancellation & change waiver, which are non-insurance features we provide, that allows you to cancel or reschedule for any reason without consequence, whether it’s a family emergency, delayed flight or an important work meeting you can’t miss.</p>
                <p class="mt-5">Select the "Travel Quote" button below for general coverages. Contact us at travelplanning@fligthclubvip.com for Cancel For Any Reason coverage.
                </p>
                <p class="black-color mt-5">Note: All-In-One Travel Policy may only be added within 7 days of your initial deposit, provided you have not yet made final payment. <br>Prices subject to change until purchased.</p>
                  <a href="https://www.agentmaxonline.com/agentmaxweb/storefront/index.html#/quotemax?widgetid=759113&accam=F211362&code=ABIYU4TLWGBGTNHC6ZWLRSKAR65GB6C5JLBJOIXR7QY3M6I5HDDNWS7OAMGLAQYNU2G6JNJMDCJWIAIP4RJTO6T6PPQMTCYZIYRQPBZUSDUWCKVTMB7FB2LJBUUYWSIZ"  target="_balnk" class="yellow_btn mt-5">Travel Protection Quote</a>
               
        </div>
        </div>
    </section>

     <section class="section_box  work-event" id="package">        
        <div class="container ">
            <div class="text-center mb-20">
                    <h3 class="section_title ">Room Packages</h3>
                </div>
           <div class="row">
                <div class="col-md-4">
                    <div style="border: 1px solid darkgray;  margin-top: 15px; padding: 10px;border-radius: 5px;">
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
                    <div style="border: 1px solid darkgray; margin-top: 15px; padding: 10px;border-radius: 5px;">
                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/image-36.jpg">
                    <div class="events-content">
                        <h4 class="trip_title">Deluxe Room - River View</h4>
                        <p>Single Occupancy – $2,412/PERSON<br>Double Occupancy – $1,861/PERSON</p>
                         <button data-toggle="modal" data-target="#room2"class="green_btn">Book Now</button>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="border: 1px solid darkgray; margin-top: 15px; padding: 10px;border-radius: 5px;">
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

    <section class="section_box  work-event">        
        <div class="container ">
            <div class="col-md-12"> 
                <div class="image-right">                        
                   <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Club_Med_Quebec_Charlevoix-1.png" style="  height: 800px;">
                    <div class="contents ">
                      <h4 class="trip_title">Exclusive Collection Suites</h4>
                         <p class="mt-5">Nestled at the top of the resort, the Exclusive Collection Space “Le Saint-Laurent” offers incredible views, exclusive amenities and premium services.</p>
                         <p>All Exclusive Collection Suites offer additional the following additional amenities and services:</p>
                         <div class="check-list-box list-box" >
                           <ul style="column-count: 1;  max-height: unset;">
                                <li>Onsite Concierge
                                <li>Premium WI-Fi
                                <li>Welcome Lounge with a cozy atmosphere and a fireplace
                                <li>Bar Service With Champagne From 6pm</li>
                                <li>Suite with boasting wonderful views of the St Lawrence River</li>
                                <li>A terrace with a whirlpool and a breathtaking view</li>
                                <li>In-Room Mini Bar (non-alcoholic drinks daily refill)</li>
                                <li>Room Service (continental breakfast)</li>
                                <li>Dedicated Ski Room</li>
                                <li>High-End Toiletries</li>
                                <li>Priority Restaurant and Spa Bookings</li>
                                <li>Luggage Delivery</li>
                                <li>And much more</li>
                            </ul>
                        </div>
                        
                          <a  data-toggle="modal" data-target="#room3" class="yellow_btn mt-5">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <section class="section_box  work-event">        
        <div class="container ">
            <div class="col-md-12"> 
                   <div class="text-center">
                <h3 class="section_title">Frequently Asked Questions</h3>
            </div>
     <div class="accordion" id="faq">
                    <div class="card">
                        <div class="card-header" id="faqhead1">
                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                            aria-expanded="true" aria-controls="faq1">01. Are passports required? </a>
                        </div>

                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                            <div class="card-body">
                                Yes, valid passports are required. If you do not have a passport, please fill out an online application and follow the posted directions. <a href="https://travel.state.gov/content/travel.html" target="_blank">https://travel.state.gov/content/travel.html</a>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                            aria-expanded="true" aria-controls="faq2">02. What airport do I fly into?  </a>
                        </div>

                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                            <div class="card-body">
                               Quebec City, Canada (Airport code YQB) is the recommended airport and the one that we will have transportation scheduled for. Montreal, Canada (Airport Code YUL) is an estimated 3 hours and 48 minutes away. This will require the traveler to pay for their own transportation to the resort. We are happy to provide recommendations if you choose YUL. 
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                            aria-expanded="true" aria-controls="faq3">03. Is a negative Covid-19 test required? </a>
                        </div>

                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                            <div class="card-body">
                              At the time of this announcement, the United States is not requiring all travelers entering the US to have a negative Covid-19 test. If you are traveling to/from other countries, please check with your country’s embassy for information.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead4">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
                            aria-expanded="true" aria-controls="faq4">04. Is there a payment plan available? </a>
                        </div>

                        <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                            <div class="card-body">
                              Yes, there is a payment plan in place with four scheduled [payment dates for 25% of the package cost to be paid by May 1st, July 1st, September 1st, and October 23rd (45 days before travel).
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead5">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5"
                            aria-expanded="true" aria-controls="faq5">05. Am I able to arrive and/or depart prior and/or after the event dates?</a>
                        </div>

                        <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                            <div class="card-body">
                              Yes, you will have the ability to book your room up to 3 days prior and 3 days after for a discounted price. We are also able to remove a night from the cost of a package if the registrants need to depart a day early. 
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead6">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq6"
                            aria-expanded="true" aria-controls="faq6">06. Are flights included in the package price?</a>
                        </div>

                        <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
                            <div class="card-body">
                              No, package prices are for the all-inclusive resort, airport transfers, and event experiences only. Each traveler is responsible for booking flights individually.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead7">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq7"
                            aria-expanded="true" aria-controls="faq7">07. When should I arrive and depart?</a>
                        </div>

                        <div id="faq7" class="collapse" aria-labelledby="faqhead7" data-parent="#faq">
                            <div class="card-body">
                             We recommend that you catch a flight that arrives by 4pm in order to catch the welcome cocktail hour. No worries if you miss this event, there will be lots more to do when you arrive at the resort! You may depart anytime on December 11th.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead8">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq8"
                            aria-expanded="true" aria-controls="faq8">08. Does the package include airport transportation?</a>
                        </div>

                        <div id="faq8" class="collapse" aria-labelledby="faqhead8" data-parent="#faq">
                            <div class="card-body">
                             Yes, airport transportation is included if you fly into Quebec City, Canada (Airport Code YQB). Please send your flight itinerary to travelplanning@flightclubvip.com for this to be scheduled.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead9">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq9"
                            aria-expanded="true" aria-controls="faq9">09. Can I pay off my trip in full at any time?</a>
                        </div>

                        <div id="faq9" class="collapse" aria-labelledby="faqhead9" data-parent="#faq">
                            <div class="card-body">
                              Yes, you may make additional payments through your account at any time including paying in full, with consideration of scheduled payment dates remaining in place until the full payment is received.
                            </div>
                        </div>
                    </div>
                     <div class="card">
                        <div class="card-header" id="faqhead10">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq10"
                            aria-expanded="true" aria-controls="faq10">10. Can I bring children on this trip?</a>
                        </div>

                        <div id="faq10" class="collapse" aria-labelledby="faqhead10" data-parent="#faq">
                            <div class="card-body">
                             Yes. Although kids are unable to attend any of the Flight Club VIP organized events, there are activities onsite and a daycare for kids. We can offer additional room type options in this scenario.
                            </div>
                        </div>
                    </div>
                     <div class="card">
                        <div class="card-header" id="faqhead11">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq11"
                            aria-expanded="true" aria-controls="faq11">11. Are there any off-site activities available?</a>
                        </div>

                        <div id="faq11" class="collapse" aria-labelledby="faqhead11" data-parent="#faq">
                            <div class="card-body">
                           Yes. We will have some included with your package and other tours and excursions that will be available, at your own expense. These will be shared closer to your arrival.
                            </div>
                        </div>
                    </div>
                     <div class="card">
                        <div class="card-header" id="faqhead12">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq12"
                            aria-expanded="true" aria-controls="faq12">12. Are my payments refundable?</a>
                        </div>

                        <div id="faq12" class="collapse" aria-labelledby="faqhead12" data-parent="#faq">
                            <div class="card-body">
                         No, any payments made are non-refundable. We recommend purchasing travel protection for a nominal fee in the event you’re unable to travel.
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </section>
   
</div>

<?php
get_footer();?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- 
<script>

 
     jQuery('.single_event_gallery').slick({
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
    jQuery('.single_event_gallery2').slick({
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
    jQuery('.single_event_gallery3').slick({
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
      
    </script> -->

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