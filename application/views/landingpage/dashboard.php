<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>balibliss</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="inex.html">Balibliss</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!--<a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Home</a></li>

          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">Daftar sebagai pengelola</a></li>
              <li><a href="team.html">Ajukan Sponsor</a></li>
              <li><a href="testimonials.html">Rating Destination</a></li>
            </ul>
          </li>

          <li><a href="contact.html">Contact</a></li>
          <li><a href="<?php echo base_url('index.php/ctampil/login');?>" class="getstarted" type="button" onclick="login()">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item" style="background-image: url(assets/img/slide/batur.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Danau Buyan</h2>
              <p class="animate__animated animate__fadeInUp">Jelajahi keindahan Danau Buyan Bali, sebuah destinasi alam yang memukau dengan lokasi strategis di dekat Botanical Garden. Nikmati suasana tenang dan asri sambil menjelajahi keindahan flora yang melimpah. Di sekitar danau, terdapat banyak pedagang lokal yang menawarkan berbagai kuliner dan kerajinan khas Bali, menjadikan tempat ini sebagai lokasi sempurna untuk persinggahan Anda. Datanglah dan rasakan pesonanya!</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/farm2.jpg)">
          <div class="carousel-container">
            <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Bali Farm <span>House</span></h2>
            <p class="animate__animated animate__fadeInUp">Nikmati keseruan bersama alpaka dan hewan lucu lainnya seperti burung unta, kelinci, kambing, dan kuda poni. Beri makan hewan-hewan ramah ini dan abadikan momen dengan foto indah berlatar pemandangan menakjubkan.
                Akhiri hari dengan makan di suasana rustik yang nyaman. Cocok untuk rekreasi keluarga!</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/kelingking.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Kelingking Beach</h2>
              <p class="animate__animated animate__fadeInUp">Temukan surga tersembunyi di Kelingking Beach, Bali. Nikmati panorama spektakuler dari tebing yang menjulang tinggi dengan bentuk unik menyerupai kelingking tangan. Dari atas, pemandangan laut biru jernih yang membentang luas akan memukau hati Anda.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/gwk.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/waterbom.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/ubud.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/birdpark.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/balizoo.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/tanahlot.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">MEMESANAN TIKET ONLINE</a></h4>
              <p>Hindari antrean panjang dan pesan tiket untuk berbagai atraksi wisata secara online melalui website kami.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">PILIHAN DESTINASI YANG BERAGAM</a></h4>
              <p>Dari pantai yang memukau, taman rekreasi, hingga tempat-tempat budaya yang kaya, kami menawarkan berbagai destinasi wisata yang dapat dipilih sesuai keinginan Anda.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4><a href="#">KONFRIMASI OTOMATIS</a></h4>
              <p>Terima konfirmasi pemesanan secara otomatis melalui email atau SMS setelah transaksi berhasil.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4><a href="#">PENDAFTARAN MUDAH DAN CEPAT</a></h4>
              <p>Daftarkan destinasi wisata Anda dengan proses yang mudah dan cepat melalui website kami.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4><a href="#">PROMOSI DAN PEMASARAN</a></h4>
              <p>Kami akan membantu mempromosikan destinasi Anda kepada ribuan pengunjung yang mencari pengalaman wisata terbaik di Bali.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-calendar4-week"></i>
              <h4><a href="#">MANAJEMEN TIKET</a></h4>
              <p>Kelola penjualan tiket dan pantau performa destinasi Anda dengan dashboard yang intuitif dan user-friendly.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

   <!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-monumen">Monumen</li>
          <li data-filter=".filter-nature">Nature</li>
          <li data-filter=".filter-water">Water</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container">

      <div class="col-lg-4 col-md-6 portfolio-item filter-water">
        <div class="card">
          <img src="assets/img/portfolio/tanahlot.jpg" class="card-img-top" alt="Tanah Lot">
          <div class="card-body">
            <h5 class="card-title">Tanah Lot</h5>
            <p class="card-text">Tabanan</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐☆</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/tanahlot.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tanah Lot"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-water">
        <div class="card">
          <img src="assets/img/portfolio/beratan.jpg" class="card-img-top" alt="Danau Beratan">
          <div class="card-body">
            <h5 class="card-title">Danau Beratan</h5>
            <p class="card-text">Tabanan</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐☆</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/beratan.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Danau Beratan"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-nature">
        <div class="card">
          <img src="assets/img/portfolio/zoo.jpg" class="card-img-top" alt="Bali Zoo">
          <div class="card-body">
            <h5 class="card-title">Bali Zoo</h5>
            <p class="card-text">Gianyar</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐⭐</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/zoo.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Bali Zoo"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-monumen">
        <div class="card">
          <img src="assets/img/portfolio/bajrasandi.jpg" class="card-img-top" alt="Bajra Sandi">
          <div class="card-body">
            <h5 class="card-title">Bajra Sandi</h5>
            <p class="card-text">Denpasar</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐☆</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/tanahlot.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tanah Lot"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-nature">
        <div class="card">
          <img src="assets/img/portfolio/birdpark.jpg" class="card-img-top" alt="Bird Park">
          <div class="card-body">
            <h5 class="card-title">Bird Park</h5>
            <p class="card-text">Gianyar</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐☆</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/beratan.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Danau Beratan"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-monumen">
        <div class="card">
          <img src="assets/img/portfolio/gwk.jpg" class="card-img-top" alt="Garuda Wisnu Kencana">
          <div class="card-body">
            <h5 class="card-title">Garuda Wisnu Kencana</h5>
            <p class="card-text">Uluwatu</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐⭐</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/zoo.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Bali Zoo"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-water">
        <div class="card">
          <img src="assets/img/portfolio/lovina.jpg" class="card-img-top" alt="Pantai Lovina">
          <div class="card-body">
            <h5 class="card-title">Pantai Lovina</h5>
            <p class="card-text">Denpasar</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐☆</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/tanahlot.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tanah Lot"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-nature">
        <div class="card">
          <img src="assets/img/portfolio/ubud.jpg" class="card-img-top" alt="Swing The Jungle">
          <div class="card-body">
            <h5 class="card-title">Swing The Jungle</h5>
            <p class="card-text">Gianyar</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐☆</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/beratan.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Danau Beratan"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-water">
        <div class="card">
          <img src="assets/img/portfolio/waterboom.jpg" class="card-img-top" alt="Water Boom">
          <div class="card-body">
            <h5 class="card-title">Water Boom/h5>
            <p class="card-text">Kuta</p>
            <p class="card-rating">Rating: ⭐⭐⭐⭐⭐</p>
            <div class="portfolio-links">
              <a href="assets/img/portfolio/zoo.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Bali Zoo"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Add more portfolio items similarly -->

    </div>

  </div>
</section><!-- End Portfolio Section -->
<script>
     function login() {
        window.open("<?php echo base_url('ctampil/login'); ?>", "_self");
   }

  </script>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>BaliBliss</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">Team</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 

</body>

</html>