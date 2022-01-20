@section('content')
<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themefisher.com">


  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Header Start --> 
<header class="navigation">
	<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="{{ url('welcome') }}">
		  OSK<span>DDG.</span>
		  </a>

		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
              <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Kontakt</a></li>
			  </li>
              <a class="nav-link" href="{{ url('welcome') }}">Strona Główna <span class="sr-only">(current)</span></a>
			   <li class="nav-item"><a class="nav-link" href="{{ url('price') }}">Cennik</a></li>
			</ul>

            @if (Route::has('login'))
                    @auth
                    <form class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
                        <a href="{{ url('/login') }}" class="btn btn-solid-border btn-round-full">Moje konto</a>
                    </form>
                    @else
                    <form class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
                        <a href="{{ route('login') }}" class="btn btn-solid-border btn-round-full">Zaloguj się</a>
                    </form>
                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif -->
                    @endauth
            @endif
		  </div>
		</div>
	</nav>
</header>

<!-- Header Close --> 

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Jeśli masz jakieś pytania</span>
          <h1 class="text-capitalize mb-4 text-lg">Napisz do nas</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ url('welcome') }}" class="text-white">Strona Główna</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="{{ url('contact') }}" class="text-white-50">Kontakt</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact form start -->
<section class="contact-form-wrap section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                 <form  method="POST" action="{{ route('sendUserEmail') }}" >
                 @csrf
                 <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <h3 class="text-md mb-4">Formularz Kontaktowy</h3>
                    <div class="form-group">
                        <input name="personalData" id="personalData" type="text" class="form-control" placeholder="Imię i Nazwisko">
                    </div>
                    <div class="form-group">
                        <input name="email"  id="email" type="email" class="form-control" placeholder="Adres Email">
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" id="message" class="form-control" placeholder="Wiadomość"></textarea>
                    </div>
                    <button class="btn btn-main" name="submit" type="submit">Wyślij wiadomość</button>
                </form>
            </div>

            <div class="col-lg-5 col-sm-12">
                <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                    <span class="text-muted">Zaufaj nam. Jesteśmy profesjonalistami.</span>
                    <h2 class="mb-5 mt-2">Najważniejsze informacje na temat ośrodka szkolenia.</h2>

                    <ul class="address-block list-unstyled">
						<li>
                            <i class="ti-pin-alt mr-3"></i><b>Adres:</b> Spadochroniarzy 17 20-400 Lublin
                        </li>
                        <li>
                            <i class="ti-email mr-3"></i><b>Email:</b> oskddg@gmail.com
                        </li>
                        <li>
                            <i class="ti-mobile mr-3"></i><b>Telefon:</b> 789-987-789
                        </li>
						<li>
                            <i class="ti-timer mr-3"></i><b>Godziny otwarcia</b><br>
                            Dni powszednie: 8:00 - 19:00 <br>
                            Sobota: 8:00-12:00
                        </li>
						<li>
                            <i class="ti-car mr-3"></i><b>Plac Manewrowy:</b> Lipowa 217 20-400 Lublin
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

<div class="google-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2498.1730955858516!2d22.526422315932543!3d51.23430693845433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472257801b802bdb%3A0xf1cc4df84ae32eff!2sPana%20Balcera%2012%2C%2020-400%20Lublin!5e0!3m2!1spl!2spl!4v1633892441795!5m2!1spl!2spl" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>


<!-- Footer -->
<footer class="footer section2 bg-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-color3 mb-4">ProjectOSK</h4>

					<ul class="list-unstyled footer-menu lh-35">
						<li class="footer-contact"><i class="fa fa-home"></i> Lipowa 17 20-400 Lublin</li>
						<li class="footer-contact"><i class="fa fa-envelope"></i><a href="#" class="text-color3"> oskddg@gmail.com</a></li>
						<li class="footer-contact"><i class="fa fa-phone"></i> 789-987-789</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-color3 mb-4">Dołącz</h4>

					<ul class="list-unstyled footer-menu lh-35">
					<li><a href="{{ url('login') }}" class="text-color3">Zaloguj się</a></li>
						<li><a href="{{ url('contact') }}" class="text-color3">Kontakt</a></li>
						<li><a href="{{ url('price') }}" class="text-color3">Cennik</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-color3 mb-4">Osiągnięcia</h4>
					<p>Ośrodek szkolenia kierowców OSKDDG w latach 2019-2021 zdobył tytuł najlepszego ośrodka w województwie Lubelskim.</p>
				</div>
			</div>

			<div class="col-lg-3 ml-auto col-sm-6">
				<div class="widget">
					<div class="logo mb-4">
						<h3 class="text-color3">OSK<span>DDG.</span></h3>
					</div>
					<h6><a href="mailto:inzynierkaoskddg@gmail.com" class="text-color3">oskddg@gmail.com</a></h6>
					<a href="tel:789-987-789"><span class="text-color h4">789-987-789</span></a>
				</div>
			</div>
		</div>
		
		<div class="footer-btm pt-4">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						&copy; Copyright Reserved to <span class="text-color">OSKDDG.</span>
					</div>
				</div>
				<div class="col-lg-6 text-left text-lg-right">
					<ul class="list-inline footer-socials">
						<li class="list-inline-item text-color3"><a href="https://www.facebook.com/themefisher" class="text-color3"><i class="ti-facebook mr-2 text-color3"></i>Facebook</a></li>
						<li class="list-inline-item"><a href="https://twitter.com/themefisher" class="text-color3"><i class="ti-instagram mr-2 text-color3"></i>Instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Koniec footer -->

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- <script src="js/contact.js"></script> -->
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
   <!--  Magnific Popup-->
    <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>

  </body>
  </html>