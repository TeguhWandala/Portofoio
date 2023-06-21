<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tentang jeruk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/favicon.ico" rel="icon">
  <link href="assets/favicon.ico" rel="apple-touch-icon">

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
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5">
      <div class="container px-4 px-lg-5 my-5">
          <div class="row gx-4 gx-lg-5 align-items-center">
              @if ($product->image)
                  <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ assets('storage/product/' . $product->image) }}" alt="{{$product->image}}" /></div>
              @else
                  <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ assets('images/default-product-detail.png') }}" alt="default-image" /></div>
              @endif
              
              <div class="col-md-6">
                  <div class="small mb-1">SKU: BST-498</div>
                  <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                  <div class="fs-5 mb-5">
                      <span class="text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                      <span>Rp.{{ number_format($product->sale_price, 0) }}</span>
                  </div>
                  <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius
                      blanditiis delectus ipsam minima ea iste laborum vero?</p>
                  <div class="d-flex">
                      <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                      <button class="btn btn-outline-dark flex-shrink-0" type="button">
                          <i class="bi-cart-fill me-1"></i>
                          Add to cart
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
      <div class="container px-4 px-lg-5 mt-5">
          <h2 class="fw-bolder mb-4">Related products</h2>
          <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
              @foreach ($related as $product)
                  <div class="col mb-5">
                      <div class="card h-100">
                          <!-- Product image-->
                          @if ($product->image)
                              <img class="card-img-top" src="{{ assets('storage/product/' . $product->image) }}" alt="..." />
                          @else
                              <img class="card-img-top" src="{{ assets('images/default-product.png') }}" alt="..." />
                          @endif
                          <!-- Product details-->
                          <div class="card-body p-4">
                              <div class="text-center">
                                  <!-- Product name-->
                                  <h5 class="fw-bolder">{{ $product->name }}</h5>
                                  <!-- Product price-->
                                  Rp.{{ number_format($product->sale_price, 0) }}
                              </div>
                          </div>
                          <!-- Product actions-->
                          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                              <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </section>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
          <div class="container">
            <div class="row">
    
              <div class="col-lg-3 col-md-6">
                <div class="footer-info">
                  <h3>Tentang Jeruk</h3>
                  <p>
                    Jalan Kenangan, No.45 <br>
                    Ds. Ngadisuko, Kec. Durenan, Kab. Trenggalek<br><br>
                    <strong>Phone:</strong> 085790515760<br>
                    <strong>Email:</strong> tentangjeruk@gmail.com<br>
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
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Pelatihan Markering</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Pelatihan Pertanian</a></li>
                </ul>
              </div>
    
              <div class="col-lg-4 col-md-6 footer-newsletter">
                <h4>Tentang Jeruk</h4>
                <p>Kebun jeruk terlengkap yang bisa jadi objek pendidikan maupun ekonomi</p>
                <form action="" method="post">
                  <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
    
              </div>
    
            </div>
          </div>
        </div>
  
          <div class="container">
              <div class="copyright">
                &copy; Copyright <strong><span>Tentang Jeruk</span></strong>. All Rights Reserved
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