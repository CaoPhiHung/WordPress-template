var $animation_elements = $('.blog-post');
var $window = $(window);

function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height);
  var count = 0;
//   console.log("window top: " + window_top_position);
//   console.log("window bottom: " + window_bottom_position);
  $.each($animation_elements, function() {
    
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);
    // console.log("Element :" +  count + " : " + $element);
    if(count == 0){
    console.log("window top: " + (window_top_position));
    console.log("element_bottom_position:" +  count + " : " + element_bottom_position);
    console.log("element_top_position:" +  count + " : " + element_top_position);
    
    //check to see if this current container is within viewport
    if ((element_bottom_position >= window_top_position) &&
      (element_top_position <= window_bottom_position )) {
       $element.addClass('in-view');
    } else {
      $element.removeClass('in-view');
    }
}
    count++;
  });
}

// function checkElementIntheViewPort(){

// }

$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');