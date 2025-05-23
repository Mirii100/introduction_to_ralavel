<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">



  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Vendor CSS Files -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

<!-- Main CSS File -->
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.blade.php" class="logo d-flex align-items-center">
       
        <h1 class="sitename">AlexiaSchool</h1>
      </a>

     <nav id="navmenu" class="navmenu">
  <ul>
    @guest
    <li><a href="{{ route('home') }}" class="active">Home</a></li>
   
  <li><a href="{{route('login')}}" class="active">login</a></li>
    <li><a href="{{ route('register') }}" class="active">register</a></li>
    
      <!-- <li><a href="{{ route('logout') }}" class="active">logout</a></li> -->
     

    <li class="dropdown"><a href="{{ route('about') }}"><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
 
      <ul>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('admissions') }}">Admissions</a></li>
        <li><a href="{{ route('academics') }}">Academics</a></li>
        <li><a href="{{ route('faculty-staff') }}">Faculty &amp; Staff</a></li>
        <li><a href="{{ route('campus-facilities') }}">Campus &amp; Facilities</a></li>
      </ul>
    </li>
    @endguest
@auth
    <li><a href="{{ route('students-life') }}">Students Life</a></li>
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route('news') }}">News</a></li>
    <li><a href="{{ route('events') }}">Events</a></li>
      
   
    <li><a href="{{ route('alumni') }}">Alumni</a></li>

    <li class="dropdown"><a href="#"><span>More Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
      <ul>
        <li><a href="{{ route('news-details') }}">News Details</a></li>
        <li><a href="{{ route('event-details') }}">Event Details</a></li>
        
        <li><a href="{{ route('privacy') }}">Privacy</a></li>
        <li><a href="{{ route('terms') }}">Terms of Service</a></li>
        <li><a href="{{ route('404') }}">Error 404</a></li>
        <li><a href="{{ route('starter-page') }}">Starter Page</a></li>
      </ul>
      @endauth
    </li>
@guest
    <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
      <ul>
        <li><a href="#">Dropdown 1</a></li>
        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Deep Dropdown 1</a></li>
            <li><a href="#">Deep Dropdown 2</a></li>
            <li><a href="#">Deep Dropdown 3</a></li>
            <li><a href="#">Deep Dropdown 4</a></li>
            <li><a href="#">Deep Dropdown 5</a></li>
          </ul>
        </li>
        <li><a href="#">Dropdown 2</a></li>
        <li><a href="#">Dropdown 3</a></li>
        <li><a href="#">Dropdown 4</a></li>
      </ul>
    </li>

    <li><a href="{{ route('contact') }}">Contact</a></li>
    @endguest
    @auth
      <form action="{{ route('logout') }}" method="POST"   style="display: inline;">
    @csrf
    <button type="submit" >
        Logout
    </button>
    @endauth
</form>

  </ul>

  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

    </div>
  </header>

  <main class="main">
 @yield('content')
</main>



  <footer id="footer" class="footer position-relative dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <span class="sitename">AlexiaSchool</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">MyWebsite</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
     
        Designed by <a href="#">AlexiaSchool</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

