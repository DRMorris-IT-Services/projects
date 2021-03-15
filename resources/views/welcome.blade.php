<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projects</title>

         <!-- Favicons -->
  <link href="{{ asset('favicon.png')}}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <script src="https://use.fontawesome.com/45cfb6a801.js"></script>

 <script src="https://use.fontawesome.com/45cfb6a801.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Vesperr - v2.0.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139160154-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139160154-2');
</script>

<!-- COOKIE CONCENT BAR -->
<script type="text/javascript"> window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":"./daten.html","theme":"dark-bottom"}; </script> <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"> </script>

    </head>
    <body>

    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="https://www.drmorris-itservices.de"><img src="{{ asset('img/logo.png')}}"  ></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#price">Price</a></li>
          
          
          <li><a href="#contact">Contact</a></li>
        
        @if (Route::has('login'))
                
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                       <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                
            @endif
          
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Project Management</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Making Project Management More Easier</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="{{ route('register') }}" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{ asset('img/undraw_Scrum_board_re_wk7v.svg') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients clients">
      <div class="container">

        <div class="row">
<br><br>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our Project Management Software</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
           <br><br>
            
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              <ul>
                <li><i class="ri-check-double-line"></i> Years of Experience.</li>
                
              </ul>
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


<section id="price" class="pricing py-5">
 <div class="container">
 <div class="section-title" data-aos="fade-up">
          <h2>Pricing</h2>
        </div>
    

    <div class="row content">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
       <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Free</h5>
            <h6 class="card-price text-center">0 &euro;<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Single User</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>5GB Storage</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Unlimited Private Projects</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Dedicated Phone Support</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Monthly Status Reports</li>
            </ul>
            <a href="{{ route('register')}}" class="btn btn-block btn-primary text-uppercase">Sign Up</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
            <h6 class="card-price text-center">10 &euro;<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-hourglass"></i></span><strong>Team Users</strong></li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>50GB Storage</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Monthly Status Reports</li>
            </ul>
            <a href="#contact" class="btn btn-block btn-primary text-uppercase">Contact Us</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
            <h6 class="card-price text-center">50 &euro;<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-hourglass"></i></span><strong>Unlimted Team Users</strong></li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>150GB Storage</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Monthly Status Reports</li>
            </ul>
            <a href="#contact" class="btn btn-block btn-primary text-uppercase">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
      
      </div>
      </div>
      </div>
      </section>

     <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Questions?</h3>
              <p>Contact me today with your questions or requests for more information on how I can help you on your IT journey</p>
              <div class="social-links">
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>Hauptstraße 14, <br> 88167 Maierhöfen</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>d.morris@drmorris-itservices.de</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>+49 8383 6319967</p>
                <i class="ri-smartphone-line"></i>
                <p>+49 1520 2709055</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <!-- <form action="forms/contact2.php" method="post" role="form" class="php-email-form"> -->
              <form name="sentMessage" class="well" id="contactForm"  novalidate> 
       
                <div class="control-group">
                  <div class="form-group">
     <input type="text" class="form-control" 
             placeholder="Company" id="company" required
                data-validation-required-message="Please enter your Company" />
       <p class="help-block"></p>
  
      </div>
          </div> 	
  
                <div class="control-group">
                       <div class="form-group">
          <input type="text" class="form-control" 
                  placeholder="First Name" id="firstname" required
                     data-validation-required-message="Please enter your First Name" />
            <p class="help-block"></p>
    
           </div>
               </div> 	
  
               <div class="control-group">
                <div class="form-group">
   <input type="text" class="form-control" 
           placeholder="Last Name" id="lastname" required
              data-validation-required-message="Please enter your Last Name" />
     <p class="help-block"></p>
  
    </div>
        </div> 	
  
  
                    <div class="form-group">
                      <div class="controls">
          <input type="email" class="form-control" placeholder="Email" 
                           id="email" required
                    data-validation-required-message="Please enter your email" />
        </div>
          </div> 	
            
                   <div class="form-group">
                     <div class="controls">
             <textarea rows="10" cols="100" class="form-control" 
                           placeholder="Message" id="message" required
               data-validation-required-message="Please enter your message" minlength="5" 
                           data-validation-minlength-message="Min 5 characters" 
                            maxlength="999" style="resize:none"></textarea>
        </div>
                   </div> 		 
           <div id="success"> </div> <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary pull-right">Send</button><br />
              </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    </main>

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; 2018 - 2021 <strong>Duncan Robert Morris</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-4">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            
            <a href="{{url('https://drmorris-itservices.de/de/impressum.html')}}" target="_blank">Impressum</a>
            <a href="{{url('https://drmorris-itservices.de/de/daten.html')}}" target="_blank">Datenschutzerklärung</a>
          </nav>
        </div>
        <div class="col-lg-2">
          
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <i class="fa fa-globe"></i>  
            <a href="../de/index.html" class="scrollto">Deutsch</a>
            <a href="../en/index.html" class="scrollto">English</a>
            
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{ asset('vendor/aos/aos.js')}}"></script>

  <script src="{{ asset('contact/jqBootstrapValidation.js')}}"></script>
 <script src="{{ asset('contact/contact_me.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js')}}"></script>

    </body>
</html>
