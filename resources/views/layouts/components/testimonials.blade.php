<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jisora - Customer Testimonials</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- OwlCarousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <style>
    /* ✅ Unique prefix for testimonial section */
    .jisora-hear-from {
      font-size: 18px;
      font-weight: 500;
      letter-spacing: 0.25em;
      text-align: center;
      color: #ffc152;
      margin-bottom: 8px;
    }

    .jisora-our-customers {
      font-size: 36px;
      font-weight: 600;
      text-align: center;
      color: #333;
      margin-bottom: 40px;
    }

    .jisora-review-card {
      background-color: #ffc152;
      padding: 24px;
      border-radius: 14px;
      display: grid;
      grid-template-columns: 220px 1fr;
      align-items: center;
      gap: 20px;
      min-height: 260px;
      max-width: 900px;
      margin: 50px auto;
      position: relative;
    }

    .jisora-review-card::before,
    .jisora-review-card::after {
      content: "";
      position: absolute;
      width: 50px;
      height: 50px;
      background: url("{{ asset('assets/images/whyChoseImg/quoet.png')}}") no-repeat center/contain;
      opacity: 1;
      z-index: 9;
    }

    .jisora-review-card::before {
      top: -20px;
      left: -12px;
      z-index: 12;
    }

    .jisora-review-card::after {
      bottom: -12px;
      right: -12px;
      transform: rotate(180deg);
    }

    .jisora-review-card img {
      width: 100%;
      height: 100%;
      max-height: 260px;
      object-fit: cover;
      border-radius: 12px;
      position: relative;
      z-index: 2;
    }

    .jisora-review-content {
      flex: 1;
      text-align: left;
      position: relative;
      z-index: 2;
    }

    .jisora-review-texts {
      font-size: 16px;
      line-height: 1.6;
      color: #000;
      margin-bottom: 10px;
    }

    .jisora-review-author {
      font-size: 15px;
      font-weight: 600;
      color: #333;
    }

    /* Carousel item scaling */
    .jisora-carousel .owl-item.active {
      transform: scale(0.85);
    }

    .jisora-carousel .owl-item.active.center {
      transform: scale(1.05);
      opacity: 1;
      z-index: 5;
      border-radius: 16px;
    }

    /* Custom navigation */
    .jisora-swiper-button {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #5c745a;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .jisora-swiper-button:hover {
      background-color: #3f5745;
    }

    .jisora-swiper-button svg {
      width: 24px;
      height: 24px;
      fill: white;
    }

    .jisora-swiper-button-prev svg {
      transform: rotate(-90deg);
    }

    .jisora-swiper-button-next svg {
      transform: rotate(90deg);
    }

    @media (max-width: 768px) {
      .jisora-review-card {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .jisora-review-card img {
        max-height: 220px;
        width: 100%;
      }

      .jisora-review-content {
        text-align: center;
      }

      .jisora-swiper-button {
        width: 45px;
        height: 45px;
      }
    }
  </style>
</head>
<body class="py-1">
  <div class="container mx-auto px-4 py-12 ">
    <h3 class="jisora-hear-from">HEAR FROM</h3>
    <h2 class="jisora-our-customers">Our Customers</h2>

    <!-- ✅ Wrapper with unique namespace -->
    <div class="relative overflow-visible">
      <!-- Custom Buttons -->
      <div class="jisora-swiper-button jisora-swiper-button-prev absolute left-[5px] top-1/2 transform -translate-y-1/2 z-20">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
        </svg>
      </div>

      <div class="jisora-swiper-button jisora-swiper-button-next absolute right-0 top-1/2 transform -translate-y-1/2 z-20">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
        </svg>
      </div>

      <!-- Testimonials Carousel -->
      <div id="jisora-carousel" class="owl-carousel jisora-carousel owl-theme">
        <div class="item">
          <div class="jisora-review-card">
            <img src="https://cdn.shopify.com/s/files/1/0524/3522/2686/files/Kavisha_Nagda.jpg?v=1722924501" alt="Kavisha Nagda" />
            <div class="jisora-review-content">
              <p class="jisora-review-texts">I had ordered a Jumpsuit and the quality of the material and the design were amazing, fitting was perfect. Loved it!</p>
              <h5 class="jisora-review-author">Kavisha Nagda</h5>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="jisora-review-card">
            <img src="https://cdn.shopify.com/s/files/1/0524/3522/2686/files/Shilpa_Sharma.webp?v=1722859343" alt="Shilpa Sharma" />
            <div class="jisora-review-content">
              <p class="jisora-review-texts">Extremely happy to wear this 3-piece co-ord set. Fabric is skin friendly, fine quality and stylish. Perfect for summers!</p>
              <h5 class="jisora-review-author">Shilpa Sharma</h5>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="jisora-review-card">
            <img src="https://cdn.shopify.com/s/files/1/0524/3522/2686/files/Bina_Chetry.webp?v=1722859343" alt="Bina Chetry" />
            <div class="jisora-review-content">
              <p class="jisora-review-texts">Beautiful design and quality. Great for summer wear. Service was also good.</p>
              <h5 class="jisora-review-author">Bina Chetry</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- OwlCarousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script>
    $(function () {
      var owl = $("#jisora-carousel");

      owl.owlCarousel({
        loop: true,
        margin: 24,
        nav: false,
        dots: false,
        center: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: false,
        smartSpeed: 300,
        responsive: {
          0: { items: 1 },
          768: { items: 2 },
          1024: { items: 3 }
        }
      });

      // Custom buttons
      $(".jisora-swiper-button-next").click(function () {
        owl.trigger("next.owl.carousel");
      });

      $(".jisora-swiper-button-prev").click(function () {
        owl.trigger("prev.owl.carousel");
      });
    });
  </script>
</body>
</html>
