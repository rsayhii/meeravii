<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3jnBOZHyT6RtZpmFNpK0N6D+PfYZ7R6pujISiFDUFxIr05oig3NbS1Ry6j3Tz7kBxKuX3sI5GxU5l5z5qU2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Owl Carousel Theme (optional) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-5NxzS4e7j2SpZAt4EvsC0BpvyEuk+qS0bkkCm1cW0XkyRjO6jwxKF1u9IiMaivGi99ZTSdKCbFf8xC3l4r5V5Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<!-- Hero: Owl Carousel -->
<section class="relative w-full h-96 md:h-[580px] overflow-hidden z-5 bg-[#fff9f2]">
  <div class="owl-carousel owl-carousel2 h-full">
    <div class="item h-full">
      <img src="{{ asset('assets/images/banner/banner1.webp') }}"
           class="w-full h-full object-cover"
           alt="Slide 1">
    </div>
    <div class="item h-full">
      <img src="{{ asset('assets/images/banner/banner2.jpg') }}"
           class="w-full h-full object-cover"
           alt="Slide 2">
    </div>
    <div class="item h-full">
      <img src="{{ asset('assets/images/banner/banner3.jpg') }}"
           class="w-full h-full object-cover"
           alt="Slide 3">
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
  $(".owl-carousel2").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: false,
    dots: true,
    nav: true,
    navText: [
      '<span class="px-4 py-2 bg-white/80 text-2xl rounded-full shadow hover:bg-white transition cursor-pointer">‹</span>',
      '<span class="px-4 py-2 bg-white/80 text-2xl rounded-full shadow hover:bg-white transition cursor-pointer">›</span>'
    ],
    smartSpeed: 600,
  });

  // Fix nav positioning ONLY for hero carousel
  $(".hero-carousel .owl-nav").addClass("absolute top-1/2 left-0 w-full flex justify-between px-4 -translate-y-1/2 z-10");
  $(".hero-carousel .owl-dots").addClass("absolute bottom-4 left-1/2 -translate-x-1/2 z-10 flex");
});
</script>
