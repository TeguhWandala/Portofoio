<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Harvest Moon</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="fa.ico" rel="icon">
  <link href="fav.ico" rel="apple-touch-icon">

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
  <link href="css/style.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <img src="fav.ico" alt="icon" width="5%">
      <h1 class="logo me-auto"><a href="{{route('landing')}}" style="text-decoration:none">Harvest Moon</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('landing')}}" style="text-decoration:none" class="active">Home</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                    {{-- <li><a class="dropdown-item" href="#!">{{ $category->name }}</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('landing', ['category' => $category->name]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
    <form class="d-flex">
        <a class="btn btn-outline-light" role="button" href="https://api.whatsapp.com/send?phone=6281237235897">
          <i class="bi bi-whatsapp"></i>
            Pesan
        </a>

        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light ms-1">
                <i class="bi-person-fill me-1"></i>
                Dashboard
            </a>
        @endauth

         @guest
          <li><a href="{{ route('login') }}" class="btn btn-outline-dark getstarted">Log In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
        @endguest
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
          @foreach ($sliders as $slider)
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                  aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
          @endforeach
      </div>
      <div class="carousel-inner">
          @foreach ($sliders as $slider)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                  {{-- cek apakah slider memiliki image --}}
                  @if ($slider->image)
                      <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->image }}">
                  @else
                      <img src="{{ asset('images/default-slider.png') }}" class="d-block w-100" alt="default-image">
                  @endif
                  <div class="carousel-caption d-none d-md-block">
                      <h2 class="animate__animated animate__fadeInDown">{{ $slider->title }}</h5>
                      <p class="animate__animated animate__fadeInUp">{{ $slider->caption }}</p>
                      <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                  </div>
              </div>
          @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
        <!-- Section-->
        <section class="py-5">
          <div class="container px-4 px-lg-5 mt-5">
              <form action="{{ route('landing') }}" method="GET">
                  @csrf
                  <div class="row g-3 my-5">
                      <div class="col-sm-3">
                          <input type="text" class="form-control" placeholder="Min" name="min" value="{{ old('min') }}">
                      </div>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" placeholder="Max" name="max" value={{ old('max') }}>
                      </div>
                      <div class="col-sm-3">
                          <button type="submit" class="btn btn-primary">Terapkan</button>
                      </div>
                  </div>
              </form>
              <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
  
                  @forelse ($products as $product)
                      <div class="col mb-5">
                          <div class="card h-100">
                              @if ($product['sale_price'] != 0)
                                  <!-- Sale badge-->
                                  <div class="badge bg-success text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                              @endif
  
                              <!-- Product image-->
                              {{-- Cek apakah product memiliki image --}}
                              @if ($product->image)
                                  <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}" />
                              @else
                                  <img class="card-img-top" src="{{ asset('assets/default-product.png') }}" alt="default-image" />
                              @endif
  
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <a href="{{ route('product.show', ['id' => $product->id]) }}" style="text-decoration: none" class="text-dark">
                                          <h5 class="fw-bolder">{{ $product->name }}</h5>
                                      </a>
                                      <!-- Product reviews-->
                                      <div class="d-flex justify-content-center small text-warning mb-2">
                                          @for ($i = 0; $i < $product->rating; $i++)
                                              <div class="bi-star-fill"></div>
                                          @endfor
                                      </div>
                                      <!-- Product price-->
                                      @if ($product['sale_price'] != 0)
                                          <span class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                                          Rp.{{ number_format($product->sale_price, 0) }}
                                      @else
                                          Rp.{{ number_format($product->price, 0) }}
                                      @endif
                                  </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://api.whatsapp.com/send?phone=6281237235897">
                                  <i class="bi bi-whatsapp"></i> Pesan Sekarang</a></div>
                              </div>
                          </div>
                      </div>
                  @empty
                      <div class="alert alert-secondary w-100 text-center" role="alert">
                          <h4>Produk belum tersedia</h4>
                      </div>
                  @endforelse
              </div>
          </div>
      </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6">
        <div class="footer-info">
          <h3>Harvest Moon</h3>
          <p>
            Jalan Tegal Banyu, No.3 <br>
            Ds. Lembuak, Kec. Narmada, Kab. Lombok Barat<br><br>
            <strong>Email:</strong> moonlight@mail.com<br>
          </p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Link Pendukung</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Pelayanan</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Kirim Kurir</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Situs COD</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Kunjungan Industri</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Pelatihan Pertanian</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Harvest Moon</h4>
        <p>Lengkapi kebutuhan Pertanian & Perkebunanmu hanya di Harvest Moon Store</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>

      </div>

    </div>
  </div>
</div>

  <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Harvest Moon</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
  <script src="js/main.js"></script>

</body>

</html>