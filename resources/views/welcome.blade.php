<?php
use Illuminate\Support\Facades\DB;
use App\Models\User;
$instructors=User::where('privilege','instructor')->get();
$users=User::where('privilege','user')->get();
$instructorsQuantity=0;
$usersQuantity=0;
foreach($instructors as $data)
{
	$instructorsQuantity++;
}
foreach($users as $data)
{
	$usersQuantity++;
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

<body class="antialiased">

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
				<a class="nav-link" href="#about">O nas <span class="sr-only">(current)</span></a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="{{ url('price') }}">Cennik</a></li>
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

<div class="main-wrapper ">
<!-- Section one PIERWSZE PHOTO-->
  <section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10">
				<div class="block">
					<!-- <span class="d-block mb-3 text-white text-capitalize">DDG Ośrodek szkolenia kierowców</span> -->
					<h1 class="animated fadeInUp mb-5">Najlepsza szkoła nauki jazdy w Twoim mieście </h1>
					<a href="{{ url('price') }}" class="btn btn-main animated fadeInUp btn-round-full" >Sprawdź nasze ceny<i class="btn-icon fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Section one -->

<!-- Kategorie -->
<section class="section service border-top">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<!-- <span class="h6 text-color">Our Services</span> -->
					<h2 class="mt-3 content-title ">Testy na wszystkie kategorie prawa jazdy </h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-motorcycle" aria-hidden="true"></i>
					<h4 class="mb-3">Kat. A</h4>
					<p>Kurs składa się z 30h zajęć teoretycznych i 20h zajęć praktycznych.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-car" aria-hidden="true"></i>
					<h4 class="mb-3">Kat. B</h4>
					<p>Kurs składa się z 30h zajęć teoretycznych i 30h zajęć paraktyczych.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-truck" aria-hidden="true"></i>
					<h4 class="mb-3">Kat. C</h4>
					<p>Krus składa się z 20h zajeć teoretycznych oraz 30h zajęć partycznych.</p>
				</div>
			</div>

			<!-- <div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5 mb-lg-0">
					<i class="ti-vector"></i>
					<h4 class="mb-3">Branding.</h4>
					<p>A digital agency isn't here to replace your internal team, we're here to partner</p>
				</div>
			</div> -->

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5 mb-lg-0">
					<i class="fa fa-bus" aria-hidden="true"></i>
					<h4 class="mb-3">Kat D.</h4>
					<p>Kurs składa się z 20h zajęć teoretycznych oraz 60h zajęć praktycznych.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5 mb-lg-0">
					<i class="fa fa-plus" aria-hidden="true"></i>
					<h4 class="mb-3">Kat. B/C+E</h4>
					<p>Krus oferuję możliwość poruszania pojazdem z przczepą. </p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Koniec kategorii -->



<!-- Licznik -->
<section class="section counter bg-counter">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<i class="ti-check color-one text-md"></i>
					<h3 class="mt-2 mb-0 text-white"><span class="counter-stat font-weight-bold">63</span>%</h3>
					<p class="text-white-50">Średnia zdawalność</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<i class="ti-flag color-one text-md"></i>
					<h3 class="mt-2 mb-0 text-white"><span class="counter-stat font-weight-bold">{{$usersQuantity}}</span> </h3>
					<p class="text-white-50">Wyszkolonych kursantów</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<i class="fa fa-child color-one text-md"></i>
					<h3 class="mt-2 mb-0 text-white"><span class="counter-stat font-weight-bold">{{$instructorsQuantity}}</span></h3>
					<p class="text-white-50">Doświadczonych instruktorów</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center">
					<i class="ti-car color-one  text-md"></i>
					<h3 class="mt-2 mb-0 text-white"><span class="counter-stat font-weight-bold">{{$instructorsQuantity+3}}</span></h3>
					<p class="text-white-50">Pojazdów </p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Koniec licznika -->

<!-- Section About Start -->
<section class="section about-2 position-relative" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="about-item-img">
					<img src="images/bg/home-8.png" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="about-item pr-3 mb-5 mb-lg-0">
					<span class="h6 text-color">O nas</span>
					<h2 class="mt-3 mb-4 position-relative content-title">ProjectOSK</h2>
					<h4 class="mb-3 position-relative">Jesteśmy najlepsi w swojej dziedzinie ...</h4>
					<p class="mb-5">Nasze wyniki zawdzięczamy wykwalifikowanej kadrze szkoleniowej i indywidualnym podejściu do każdego kursanta. Zostań kierowcą razem z nami!</p>

					<a href="{{ url('contact') }}" class="btn btn-main btn-round-full">Kontakt</a>
				</div>
			</div>
			
		</div>
	</div>
</section>


<!-- Section About Start -->
<section class="section about-2 position-relative">
	<div class="container about-2margin">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="about-item pr-3 mb-5 mb-lg-0">
					<span class="h6 text-color">Aktualności</span>
					<h2 class="mt-3 mb-4 position-relative content-title">Nadchodzące kursy i wydarzenia</h2>
					<p class="mb-5">W dniu 02.02.2022 rozpoczynamy kurs z kategorii B. W celu uzyskania większej ilości informacji zapraszamy do kontaktu telefonicznego lub formularza kontaktowego(zakładka kontakt).</p>
					<p class="mb-5">W dniu 05.02.2022 rozpoczynamy kurs doszkalający z zakresu wyprowadzania aut przednionapędowych z poślizgu. W celu uzyskania większej ilości informacji zapraszamy do kontaktu telefonicznego lub formularza kontaktowego(zakładka kontakt).</p>

					<!-- <a href="#" class="btn btn-main btn-round-full">Get started</a> -->
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="about-item-img">
					<img src="images/bg/pobrane.png" alt="" class="img-fluid">
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