<?php
/* 
Template Name: FAQ
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
    <?php endif;  ?>  
        
   <section class="section_box background_image5 group-travels">      
        <div class="container ">
             
        <div class=" mb-50 faqbox">  
            <h3>Services</h3>

        <!--Accordion wrapper-->
        <div class="accordion" id="faq">
                    <div class="card">
                        <div class="card-header" id="faqhead1">
                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                            aria-expanded="true" aria-controls="faq1">01. How do I sign up for a Flight Club VIP Trip? </a>
                        </div>

                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                            <div class="card-body">
                                Getting started with Flight Club VIP is easy! 
<ul><li>Click the “Start My Journey” Button to schedule a call with our team. </li>
<li>Your personal travel concierge will reach out to discuss your upcoming trip and to see how we can assist with your travel plans.</li></ul>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                            aria-expanded="true" aria-controls="faq2">02. Why take a Flight Club VIP Trip over an independent trip? </a>
                        </div>

                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                            <div class="card-body">
                                Planning your own trip, whether solo or group, takes considerable effort and time to have great execution. While it is absolutely possible to do independently, it would take considerably more time, require large lump sum total payments and can often be more expensive than what the value of our packages and services will provide.
Flight Club VIP handles all of your travel needs, allowing you to focus more on the excitement leading up to the trip. Whether you are traveling on a FCV custom trip or going on an exciting adventure with one of our affiliate partners, you will have an elite and VIP experience every time. Regardless of the style of your trip, event planning, payment direct to vendors, and any other specialty needs will be handled. All you have to do is show up! 

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                            aria-expanded="true" aria-controls="faq3">03. What are all of the services offered by FCV? </a>
                        </div>

                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                            <div class="card-body">
                              Flight Club VIP excels at curating top quality luxury vacation experiences, destination weddings, retreats, birthday celebrations, conferences and major international events for its clients and members.  Whether you are traveling with a group or planning a business event, we will take care of all your travel needs. Some services include (but are not limited to) trip coordination, excursion planning, payment plan management, themed events, meal arrangements, airfare and lodging arrangement, event management, photography and videography services, and more. 

                            </div>
                        </div>
                    </div>

                     <div class="card">
                        <div class="card-header" id="faqhead4">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
                            aria-expanded="true" aria-controls="faq4">04. Does Flight Club VIP plan for groups?  </a>
                        </div>

                        <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                            <div class="card-body">
                              Absolutely! Flight Club VIP loves to plan for all types of groups traveling for all types of reasons. We plan for birthdays, friend’s weekends, bachelor/bachelorette parties, and more! We can transform any special occasion into the perfect experience for your group. 


                            </div>
                        </div>
                    </div>

                     <div class="card">
                        <div class="card-header" id="faqhead5">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5"
                            aria-expanded="true" aria-controls="faq5">05. I want to take a trip soon but haven't ironed down where or what to do - just want it to be awesome! Can you help? </a>
                        </div>

                        <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                            <div class="card-body">
                             Yes! We’d be happy to consult on the ideal destination and style for your trip. Click the “Start My Journey” button to schedule a 15- minute consultation call with one of our travel experts. 

                            </div>
                        </div>
                    </div>

                     <div class="card">
                        <div class="card-header" id="faqhead6">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq6"
                            aria-expanded="true" aria-controls="faq6">06. What does it mean to have Flight Club VIP Membership? How do I join? How do I earn and redeem, Flight Club VIP Points? </a>
                        </div>

                        <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
                            <div class="card-body">
                             The moment you take your first trip with Flight Club VIP, you become a member! Because you are important to us, we want to make sure you receive some acknowledgement for being a part of the FCV Family. As an added value, for every trip you take with FCV, you earn flight club VIP perk points. You can use the points you accumulate for discounts and Flight Club VIP merchandise. 

                            </div>
                        </div>
                    </div>
                </div>
         <h3>Payments</h3>
     
        <!--Accordion wrapper-->
        <div class="accordion" id="faqs">
                    <div class="card">
                        <div class="card-header" id="faqshead1">
                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faqs1"
                            aria-expanded="true" aria-controls="faqs1">07. How much will it cost me to use Flight Club VIP services?</a>
                        </div>

                        <div id="faqs1" class="collapse show" aria-labelledby="faqshead1" data-parent="#faqs">
                            <div class="card-body">
                               Flight Club VIP offers various packages for our clients. Click the “Start My Journey” button and let us find the services to best fit your travel needs. 

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqshead2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqs2"
                            aria-expanded="true" aria-controls="faqs2">08. Are there payment plans available? </a>
                        </div>

                        <div id="faqs2" class="collapse" aria-labelledby="faqshead2" data-parent="#faqs">
                            <div class="card-body">
                               Yes! Flight Club VIP will provide customized plans for you to make your payments with ease. 

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqshead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqs3"
                            aria-expanded="true" aria-controls="faqs3">09. Plans change! Are refunds issued?
</a>
                        </div>

                        <div id="faqs3" class="collapse" aria-labelledby="faqshead3" data-parent="#faqs">
                            <div class="card-body">
                                We cannot guarantee a refund or travel credit for all portions of your trip, since policies will vary based on many factors and time frames. For this reason, we encourage travelers to purchase trip insurance for any unexpected things that come up or require you to suddenly change your plans. We will do our best to accommodate any changes you may need and apply travel credits and refunds where applicable.

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqshead4">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqs4"
                            aria-expanded="true" aria-controls="faqs4">10. What are the available payment methods? </a>
                        </div>

                        <div id="faqs4" class="collapse" aria-labelledby="faqshead4" data-parent="#faqs">
                            <div class="card-body">
                              We accept Credit/Debit cards PayPal payments. ACH and Wire Transfers are available for large events. 

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqshead5">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqs5"
                            aria-expanded="true" aria-controls="faqs5">11. Can I use PayPal without a PayPal account?</a>
                        </div>

                        <div id="faqs5" class="collapse" aria-labelledby="faqshead5" data-parent="#faqs">
                            <div class="card-body">
                               Yes! It is commonly misunderstood that a Paypal account is needed in order to make payments through Paypal. The truth is you DO NOT need one, although we strongly recommend you sign up to enjoy the added ease of use. 
Without a Paypal account, all you need is any Debit/Credit card that is supported by Paypal. By using Paypal, we can process & deliver your orders to you in a shorter time. Paypal is the easiest & most secure way to make payment online. No account needed.


                            </div>
                        </div>
                    </div>

                </div>
                  <h3>Merchandise</h3>
     
        <!--Accordion wrapper-->
        <div class="accordion" id="faqsa">
                    <div class="card">
                        <div class="card-header" id="faqsahead1">
                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faqsa1"
                            aria-expanded="true" aria-controls="faqsa1">12. What is a Pre-Order? </a>
                        </div>

                        <div id="faqsa1" class="collapse show" aria-labelledby="faqsahead1" data-parent="#faqsa">
                            <div class="card-body">
                              A Pre-Order means the merchandise is coming soon and may be reserved before it is available for shipment (Must paid in full). 
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqsahead2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqsa2"
                            aria-expanded="true" aria-controls="faqsa2">13. When will my order ship? </a>
                        </div>

                        <div id="faqsa2" class="collapse" aria-labelledby="faqsahead2" data-parent="#faqsa">
                            <div class="card-body">
                              Orders with Ground Shipping will be processed and shipped in up to 2 business days. All expedited orders placed before 3:00 p.m. CST will be shipped the same day.

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqsahead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqsa3"
                            aria-expanded="true" aria-controls="faqsa3">14. Which carrier do you use?</a>
                        </div>

                        <div id="faqsa3" class="collapse" aria-labelledby="faqsahead3" data-parent="#faqsa">
                            <div class="card-body">
                               We use USPS 

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqsahead4">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqsa4"
                            aria-expanded="true" aria-controls="faqsa4">15. What is your return policy?</a>
                        </div>

                        <div id="faqsa4" class="collapse" aria-labelledby="faqsahead4" data-parent="#faqsa">
                            <div class="card-body">
                             You can return items that are in its original condition (unwashed and unworn) with tags in tack unless it is a sale items which in that case is deemed non- returnable. We do not pay for shipping on returns unless it is a damaged item. Non-clothing items such as jewelry, handbags and scarves are non-returnable. All return/damages request must be made within 3 days upon delivery of merchandise.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqsahead5">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faqsa5"
                            aria-expanded="true" aria-controls="faqsa5">16. Is it secure to enter my credit card information on your site?</a>
                        </div>

                        <div id="faqsa5" class="collapse" aria-labelledby="faqsahead5" data-parent="#faqsa">
                            <div class="card-body">
                             Yes, it is! Orders that are placed on our site are all encrypted using SSL technology to ensure that your transactions are protected.
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