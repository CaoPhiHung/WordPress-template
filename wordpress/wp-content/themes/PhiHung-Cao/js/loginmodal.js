// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var signin = document.getElementById("signin");
if(signin != null){
signin.addEventListener("click", function(){
    document.getElementById('id01').style.display='block';
    var button = document.getElementById('buttonExpand');
    if(button.getAttribute("aria-expanded") == 'true'){
    toggle('navbar','buttonExpand');
    }
});
}

if(getWidth() <= 1300){
closeMenu();
}


function closeMenu(){
var n = document.getElementById('navbar');
if(n != null){
var items = n.getElementsByTagName("li");
for (var i = 0; i < items.length-1; ++i) {
    // do something with items[i], which is a <li> element
    if(getWidth() <= 700){
    items[i].addEventListener("click", function(){
        toggle('navbar','buttonExpand');
    });
   }
}
}
}

function getWidth() {
    if(document != null && document.body != null && document.documentElement != null){
    return Math.max(
      document.body.scrollWidth,
      document.documentElement.scrollWidth,
      document.body.offsetWidth,
      document.documentElement.offsetWidth,
      document.documentElement.clientWidth
    );
    }
    return 1140;
  }
  
  function getHeight() {
    return Math.max(
      document.body.scrollHeight,
      document.documentElement.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.offsetHeight,
      document.documentElement.clientHeight
    );
  }

function toggle(id, id2) {
    var n = document.getElementById(id);
    var items = n.getElementsByTagName("li");
    if(document.getElementById(id2).getAttribute("aria-expanded") == 'true'){
        document.getElementById(id2).setAttribute('aria-expanded', 'false');
        for (var i = 0; i < items.length; ++i) {
            // do something with items[i], which is a <li> element
                if(i >= 1){
                    items[i].setAttribute('style','display: none;');
                }
        }
    }else {
        document.getElementById(id2).setAttribute('aria-expanded', 'true');
        for (var i = 0; i < items.length; ++i) {
            // do something with items[i], which is a <li> element
                if(i >= 1){
                    items[i].setAttribute('style','display: block;');
                }
        }
    }
  }

//   google map
  function initMap() {
    var coor = {lat: 49.234209, lng: -123.028132};
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 15,
          center: coor
        });
        var marker = new google.maps.Marker({
          position: coor,
          map: map
        });
}

//sticky header
var header = document.getElementById("myTopnav");
if(header != null){
var sticky = header.offsetTop;
window.onscroll = function() {
    if (window.pageYOffset >= sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }

};
}