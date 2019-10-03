
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="node_modules/video.js/dist/video.min.js"></script>

<script>
    

$('.img-parallax').each(function(){
var img = $(this);
var imgParent = $(this).parent();
function parallaxImg () {
var speed = img.data('speed');
var imgY = imgParent.offset().top;
var winY = $(this).scrollTop();
var winH = $(this).height();
var parentH = imgParent.innerHeight();


// The next pixel to show on screen      
var winBottom = winY + winH;

// If block is shown on screen
if (winBottom > imgY && winY < imgY + parentH) {
  // Number of pixels shown after block appear
  var imgBottom = ((winBottom - imgY) * speed);
  // Max number of pixels until block disappear
  var imgTop = winH + parentH;
  // Porcentage between start showing until disappearing
  var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
}
img.css({
  top: imgPercent + '%',
  transform: 'translate(-50%, -' + imgPercent + '%)'
});
}
$(document).on({
scroll: function () {
  parallaxImg();
}, ready: function () {
  parallaxImg();
}
});
});


// Establish default settings
var parallaxElements = [];
var windowHeight = 0;
var speed = 2;

var requestAnimationFrame =
window.requestAnimationFrame ||
window.mozRequestAnimationFrame ||
window.webkitRequestAnimationFrame ||
window.msRequestAnimationFrame;

window.requestAnimationFrame = requestAnimationFrame;

$(document).ready(function() {
windowHeight = $(window).height();

//touch event check
var touchSupported =
"ontouchstart" in window ||
(window.DocumentTouch && document instanceof DocumentTouch);

if (touchSupported) {
$(window).bind("touchmove", function(e) {
  var scroll = e.currentTarget.scrollY;
  Parallax(scroll);
});
} else {
$(window).bind("scroll", function(e) {
var scroll = $(this).scrollTop();
Parallax(scroll);
});
}

$(window).resize(function() {
windowHeight = $(window).height();
});
});

function Parallax(scrollTop) {
// for each of content parallax element
$('[data-type="parallax"]').each(function() {
// Save a reference to the element
var $this = $(this);
var speed = $this.data("speed") || 0;
var offset = $this.offset().top;
var height = $this.outerHeight(true);

// Check if above or below viewport
if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
  return;
}

var yPos = Math.round((scrollTop - offset) / speed);

// Apply the Y Position to Set the Parallax Effect
window.requestAnimationFrame(function() {
  $this.css("transform", "translate3d(0, " + yPos + "px, 0)");
  $this.css("-webkit-transform", "translate3d(0, " + yPos + "px, 0)");
});
});
}

</script>
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

    <div class="bg-info">
      <div class="container bg-info">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0 text-black">
            <h6 class="mb-0">Suivez-nous sur les réseaux !</h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right text-black">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5 text-white">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Drone Passion</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Passion Drone est la première plateforme française en ligne pour les pilotes de drones et les passionnés du monde entier</p>

        </div>
        <!-- Grid column -->
        

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Liens utiles</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a class=" text-info" href="../myAccount.php">Votre compte</a>
          </p>
          <p>
            <a class=" text-info" href="../myAccount.php">Mentions légales</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> Arras
          <p>
            <i class="fas fa-envelope mr-3"></i> passiondrone@gmail.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i>0781252515</p>
          

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 text-white">Copyright © 2019 Passion Drone. Tous droits réservés.
      
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</body>
</html>