<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>OSK</title>

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

<!-- ======= Header ======= -->
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
              <li class="nav-item"><a class="nav-link" href="{{ url('price') }}">Cennik</a></li>
			  </li>
              <a class="nav-link" href="{{ url('welcome') }}">O nas <span class="sr-only">(current)</span></a>
			   <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Kontakt</a></li>
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
<!-- End Header -->


<!-- Section About Price-->

<section class="section about-2 position-relative">
	<div class="container">
		<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
			<h1 class="display-4">Cennik</h1>
			<p class="lead">
				Zapraszamy do zapoznania się z cenami jakie obowiązują za nasze kursy. W razie pytań prosimy o kontakt na numer 123456789.
			</p>
		</div>

	</div>
	<div class="container">
		<div class="card-deck mb-3 text-center">
			<div class="card mb-4 box-shadow">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal">Jazdy doszkalające</h4>
				</div>
				<div class="card-body">
					<h1 class="card-title pricing-card-title">70 zł
						<small class="text-muted">/godz.</small>
					</h1>
					<p class="lead">
						Godzina jazd doszkalających to pełne 60 min jazdy z instruktorem. Cena podana jest dla 1h z kategorii B.
					</p>
					
				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card mb-8 box-shadow">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal">Kurs</h4>
				</div>
				<div class="card-body">
					<h1 class="card-title pricing-card-title">2200 zł
						<small class="text-muted">/Kat. A</small>
					</h1>
					<p class="lead">
					Kurs składa się z 30h zajęć teoretycznych i 20h zajęć praktycznych prowadzonych na identycznych motocyklach jak na prawdziwym egzaminie. Minimalny wiek to 24 lata bez posiadania ubarwień: AM, A1, A2. W czasie tego kursu uzyskasz najważniejsze informacje i doświadczenie pozwalające zdać egzamin i czerpać radość z jazdy motocyklem.
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card mb-8 box-shadow">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal">Kurs</h4>
				</div>
				<div class="card-body">
					<h1 class="card-title pricing-card-title">2100 zł
						<small class="text-muted">/Kat.B</small>
					</h1>
					<p class="lead">
					Kurs składa się z 30h zajęć teoretycznych i 30h zajęć praktycznych prowadzonych na identycznych samochodach jak na prawdziwym egzaminie. W czasie tego kursu uzyskasz najważniejsze informacje i doświadczenie pozwalające zdać egzamin i czerpać radość z jazdy samochodem.
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card mb-8 box-shadow">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal">Kurs</h4>
				</div>
				<div class="card-body">
					<h1 class="card-title pricing-card-title">2500 zł
						<small class="text-muted">/Kat.C</small>
					</h1>
					<p class="lead">
						Na kurs składa się 20 godzin teorii prowadzonej stacjonarnie oraz 30 godzin praktyki na identycznych samochodach ciężarowych jak na prawdziwym egazminie. W czasie tego kursu uzyskasz najważniesze informacje i doświadczenie pozwalające zdać egzamin i czerpać radość z jazdy.
					</p>
				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card mb-8 box-shadow">
				<div class="card-header">
					<h4 class="my-0 font-weight-normal">Kurs</h4>
				</div>
				<div class="card-body">
					<h1 class="card-title pricing-card-title">4400 zł
						<small class="text-muted">/Kat.D</small>
					</h1>
					<p class="lead">
						Na kurs składa się 20 godzin teorii prowadzonej stacjonarnie oraz 60 godzin praktyki na identycznych samochodach jak na prawdziwym egazminie. W czasie tego kursu uzyskasz najważniesze informacje i doświadczenie pozwalające zdać egzamin i czerpać radość z jazdy.
					</p>
				</div>
			</div>
		</div>
		
	</div>

</section>




<!-- Footer -->
<footer class="footer section2 bg-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-color3 mb-4">ProjectOSK</h4>

					<ul class="list-unstyled footer-menu lh-35">
						<li class="footer-contact"><i class="fa fa-home"></i> Lipowa 17 20-400 Lublin</li>
						<li class="footer-contact"><i class="fa fa-envelope"></i><a href="{{ url('contact') }}" class="text-color3"> oskddg@gmail.com</a></li>
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
					<a href="tel:789-987-789 "><span class="text-color h4">789-987-789</span></a>
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



</div>   <!-- koniec class="main-wrapper" -->
  
 <!-- Main jQuery -->
 <script src="plugins/jquery/jquery.js"></script>
 <script src="js/contact.js"></script>
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

 <script src="js/script.js"></script>


</body>

</html>