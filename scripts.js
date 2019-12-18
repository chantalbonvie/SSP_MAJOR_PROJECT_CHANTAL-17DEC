function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) { 
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}


$(document).ready(function(){
  // Activate Carousel
  $("#dynamic_slide_show").carousel();
    
  // Enable Carousel Indicators
  $(".item1").click(function(){
    $("#dynamic_slide_show").carousel(0);
  });
  $(".item2").click(function(){
    $("#dynamic_slide_show").carousel(1);
  });
  $(".item3").click(function(){
    $("#dynamic_slide_show").carousel(2);
  });
    
  // Enable Carousel Controls
  $(".carousel-control-prev").click(function(){
    $("#dynamic_slide_show").carousel("prev");
  });
  $(".carousel-control-next").click(function(){
    $("#dynamic_slide_show").carousel("next");
  });
});

