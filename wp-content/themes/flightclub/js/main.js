$(document).ready(function() {   
 
/*$('#header').load('header.html');
$('#footer').load('footer.html');
*/


  const glightbox = GLightbox({
    selector: '.glightbox'
  });


// Sticky Header 
$(window).scroll(function(){
  var sticky = $('header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixHeader');
  else sticky.removeClass('fixHeader');
});
 
 
/*Scrol to top*/
$('.scrollTop').on('click',function(){
   $('html, body').animate({scrollTop : 0},800); 
}); 

 



});



// Animation Starts
function onScrollInit( items, trigger ) {
  items.each( function() {
    var osElement = $(this),
        osAnimationClass = osElement.attr('data-os-animation'),
        osAnimationDelay = osElement.attr('data-os-animation-delay');
        osElement.css({
          '-webkit-animation-delay':  osAnimationDelay,
          '-moz-animation-delay':     osAnimationDelay,
          'animation-delay':          osAnimationDelay
        });

        var osTrigger = ( trigger ) ? trigger : osElement;
        osTrigger.waypoint(function() {
          osElement.addClass('animated').addClass(osAnimationClass);
          },{
              triggerOnce: true,
              offset: '99%'
        });
  });
}
onScrollInit( $('.os-animation') ); 
// Animation Ends

 


function Carousel(car){
  // this will be our Carousel object, which will be referred to as carousel
  var carousel = this;

  // PROPERTIES

  // carousel.element is a jquery object of the car element passed into the Carousel constructor
  carousel.element = $(car);
  carousel.currentSlide = 0;
  carousel.previousSlide = 0;
  carousel.numberOfSlides = 0;
  // timer will be the timer object
  carousel.timer = false;
  // timerLength is the time between slideshow switches
  carousel.timerLength = 5000;
  // timerPause is the time between clicking a button and the slideshow starting again
  carousel.timerPause = 10000;
  // timing will stop button clicks if it is true
  carousel.timing = false;



  // METHODS

  // .changePosition() is a method for altering the carousel's data
  // It gets passed true, false, or a number
  // It makes sure that the slides always stay within available parameters
  // It calls the .showPosition() method at the end
  carousel.changePosition = function(direction){
    // Don't do anything if you're already moving
    if(carousel.timing) return;

    carousel.previousSlide = carousel.currentSlide;
    // If moving to the left, decrement currentSlide
    if(direction === false) {
      carousel.currentSlide--;
    } else 
    // If moving to the right, increment currentSlide
    if(direction === true) {
      carousel.currentSlide++;
    } else 
    // If direction is a number
    {
      if(carousel.currentSlide<direction) {
        carousel.currentSlide = direction;
        // return will stop the current function from doing anything else, and switch straight to .showPosition()
        return carousel.showPosition(true,true);
      } else if (carousel.currentSlide>direction) {
        carousel.currentSlide = direction;
        return carousel.showPosition(false,true);
      }
    }

    if(carousel.currentSlide == carousel.previousSlide) return;

    if(carousel.currentSlide < 0){
      carousel.currentSlide = carousel.numberOfSlides-1;
    } else if(carousel.currentSlide >= carousel.numberOfSlides){
      carousel.currentSlide = 0;
    }

    carousel.showPosition(direction,false);
  };

  // .showPosition() will 
  carousel.showPosition = function(direction,placed){
    // Clear the changeTimer if it's currently running
    clearTimeout(carousel.changeTimer);
    carousel.changeTimer = false;

    var leftposition, rightposition;
    if(carousel.currentSlide == 0){
      leftposition = carousel.numberOfSlides-1;
    } else leftposition = carousel.currentSlide-1;

    if(carousel.currentSlide == carousel.numberOfSlides-1){
      rightposition = 0;
    } else rightposition = carousel.currentSlide+1;


    // Select all the slides, remove any odd classes from them, and then set them back to carousel-slide
    var cs = carousel.element.find(".carousel-slide")
      .removeClass("atLeft atRight atCenter moving");

    cs.eq(carousel.previousSlide).addClass("atCenter")
    if(direction===true){
      cs.eq(carousel.currentSlide).addClass("atRight");
      cs.eq(rightposition).addClass("atRight");
    } else if(direction===false){
      cs.eq(carousel.currentSlide).addClass("atLeft");
      cs.eq(leftposition).addClass("atLeft");
    }

    // Set timing to true so that no button clicks will work while a slide is happening
    carousel.timing = true;

    // Wait some milliseconds for the computer to render the slides into their starting positions
    // Then move the correct slides to their new positions
    carousel.changeTimer = setTimeout(function(){
      carousel.element.find(".carousel-paginate")
        .eq(carousel.currentSlide).addClass("active")
        .siblings().removeClass("active");
      cs.eq(carousel.currentSlide)
        .removeClass("atLeft atRight").addClass("moving atCenter");
      cs.eq(carousel.previousSlide)
        .removeClass("atLeft atRight atCenter").addClass("moving at"+
          (direction===true ? "Left" : "Right"));

      // Wait a second and let the button be clicked again
      setTimeout(function(){carousel.timing = false;},400);
    // The number here can be adjusted if you have too many glitches
    },50);
  };


  // Slideshow Methods
  // .startTimer() starts a repeating interval timer which calls .tick() every timerLength
  carousel.startTimer = function(){
    // No slideshow if the timerLength is 0
    if(carousel.timerLength === 0) return;
    carousel.timer = setInterval(carousel.tick, carousel.timerLength);
  };
  // .stopTimer() clears the interval and resets the timer to false
  carousel.stopTimer = function(){
    clearInterval(carousel.timer);
    carousel.timer = false;
  };
  // .pauseTimer() calls the .stopTimer() and then starts a single use timer to call .startTimer() again
  carousel.pauseTimer = function(){
    carousel.stopTimer();
    carousel.timer = setTimeout(carousel.startTimer, carousel.timerPause);
  };
  // .tick() will call the .changePosition() function and move to the right
  carousel.tick = function(){
    carousel.changePosition(true);
  };



  // This function will create a series of buttons to a new div and append that
  // div to the controls div
  carousel.makeButtons = function(){
    // Passing a string of an html tag into jquery returns a new element
    var button,buttondiv = $("<div class='carousel-pagination'>");
    // New elements can be appended, prepended, and more to other elements
   
    // Add the buttondiv to the carousel controls
    carousel.element.append(
      $("<div class='carousel-controls'>").html(
        "<div class='carousel-move-left'><i class='fa fa-chevron-left'></i></div>"+
        "<div class='carousel-move-right'><i class='fa fa-chevron-right'></i></div>"
        ).append(buttondiv)
      );
  };



  carousel.init = function(){

    // If a timer attribute has been given, set the timer values
    if(carousel.element.data("timer")=="none") {
      carousel.timerLength = 0;
    } else if(carousel.element.data("timer")!=undefined) {
      carousel.timerLength = +carousel.element.data("timer")*1000;
    }
    carousel.timerPause = carousel.timerLength*2;

    // Find the number of slides from the html carousel-deck
    carousel.numberOfSlides = carousel.element.find(".carousel-slide").length;
    // Show the first slide
    carousel.element.find(".carousel-slide").eq(0).addClass("atCenter");

    // Create all the buttons
    carousel.makeButtons();
    // Start the slideshow
    carousel.startTimer();
  };





  // EVENT HANDLERS
  carousel.element.on("click",".carousel-move-left",function(){
    carousel.changePosition(false);
    carousel.pauseTimer();
  });
  carousel.element.on("click",".carousel-move-right",function(){
    carousel.changePosition(true);
    carousel.pauseTimer();
  });



  // Call a function called .init() to start anything that needs to be started
  carousel.init();
}

$(function(){ // document ready
  // Find all the .carousel elements and assign them to a Carousel Object
  $(".carousel").each(function(){
    new Carousel(this);
  });
});




$('.submit_button_c9f0f895fb98ab9159f51fd0297e236d').hide();

$("#custom_13").keyup(function(){
  //console.log($("#custom_13").val());
  $("#custom_13").text($("#custom_13").val());
});

$( ".check_submission" ).on( "click", function(e) {
  //$('.submit_button_c9f0f895fb98ab9159f51fd0297e236d').show();
      
    if (!$('#custom_7').val() || $('#custom_13').text() == "" || $('#first_name').val() == "" || $('#first_name').val() == null || $('#phone_number').val() == "" || $('#phone_number').val() == null || $('#email').val() == "" || $('#email').val() == null) {
      console.log($('#custom_13').text());
      if (!$('#custom_7').val()) {
        $('#custom_7').addClass('kartra_error');        
       }else{
          $('#custom_7').removeClass('kartra_error'); 
      }
      if (!$('#custom_13').text()) {
        $('#custom_13').addClass('kartra_error');        
      }else{
          $('#custom_13').removeClass('kartra_error'); 
      }
      if ($('#first_name').val() == "" || $('#first_name').val() == null) {        
        $('#first_name').addClass('kartra_error');        
      }else{
          $('#first_name').removeClass('kartra_error'); 
      }
      if ($('#phone_number').val() == "" || $('#phone_number').val() == null) {        
        $('#phone_number').addClass('kartra_error');      
      }else{
          $('#phone_number').removeClass('kartra_error'); 
      }  
      if ($('#email').val() == "" || $('#email').val() == null) {
        $('#email').addClass('kartra_error');           
      }else{
          $('#email').removeClass('kartra_error'); 
      }
      return false; 
    }else{   
      $('input').removeClass('kartra_error'); 
      $('select').removeClass('kartra_error'); 
      $('textarea').removeClass('kartra_error'); 
       console.log('move');
       $('#city').val($('#allplace').val());
       $('.submit_button_c9f0f895fb98ab9159f51fd0297e236d').trigger('click');
      return true;      
    }  

    


});

$(".add_more").on( "click", function() {
   $('#allplace').val($('#defaultplace').val());
  $('.places').text('');  
  var city = $('#city').val();
  if (city != "") {       
    var allplace= $('#allplace').val();   
    console.log(allplace);
    if (allplace) {           
      $('#allplace').val(allplace+','+city);  
      $('#defaultplace').val(allplace+','+city);
    }else{
      $('#allplace').val(city); 
    }
  }
//$('.places').append("<li class='delete_place'>" + city + " <span>x</span></li>");
/*list.push($("<li class='delete_place'>" + city + " <span>x</span></li>"));
$('.places').append(list);*/
  var places = $('#allplace').val();  
  var strArray = places.split(",");        
       
      for(var i = 0; i < strArray.length; i++){
          $('.places').append("<li class='delete_place'>" + strArray[i] + " <span>x</span></li>");
      }
    $('#city').val('');   
    });

$(document).on('click', '.delete_place', function(e) {
/*$(".delete_place").on('click',function(){*/
    
    
    var myString = $(this).html();
    var place= myString.replace(' <span>x</span>','');
    var places = $('#defaultplace').val();
    $('#defaultplace').val(places.replace(place+',',''));
    
    console.log(places.replace(place+',',''));
  $(this).remove();
  
 // str_replace($(this).val(), "",places);
});     

