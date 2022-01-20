<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- bootstrap.min css -->
   <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
   <!-- Icon Font Css -->
   <link rel="stylesheet" href="{{asset('plugins/themify/css/themify-icons.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/magnific-popup/dist/magnific-popup.css')}}">
   <!-- Owl Carousel CSS -->
   <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick-theme.css')}}">
 
   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <link rel="stylesheet" href="{{asset('css/footer.css')}}">
   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   
</head>
<body>
    <div id="app">
        @include('sweetalert::alert')
        <nav class="navbar navbar-expand-lg navbar-dark  py-4" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/welcome') }}">
                OSK<span>DDG.</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-solid-border btn-round-full" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-solid-border btn-round-full" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                                </li>
                            @endif -->
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @include('sweetalert::alert')
                                {{ Auth::user()->firstName }}
                                    {{ Auth::user()->lastName }}
                                    {{ "(" }}
                                    {{ Auth::user()->privilege }}
                                    {{ ")" }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <!-- STRONA GŁÓWNA: -->
                                 <a class="dropdown-item changenavbg" href="{{ route('mainpage') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('mainpage').submit();">
                                        {{ __('Strona główna') }}
                                    </a>

                                    <form id="mainpage" action="{{ route('mainpage') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- KONIEC STRONY GŁÓWNEJ-->
                                     <!-- ZMIANA HASLA - MOJE KONTO: -->

                                <a class="dropdown-item changenavbg" href="{{ route('data') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('data').submit();">
                                        {{ __('Moje konto') }}
                                </a>

                                <form id="data" action="{{ route('data') }}" method="GET" class="d-none">
                                    @csrf
                                </form>

                                <!-- KONIEC ZMIANY HASLA - MOJE KONTO: -->
                                
<!-------------------------------------OPCJE ADMINA---------------------------------------->
                                
                                @if (Auth::user()->privilege=='admin')
                                <!-- DODAJ UŻYTKOWNIKA -->
                                    <a class="dropdown-item changenavbg" href="{{ route('register') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('register').submit();">
                                        {{ __('Dodaj użytkownika') }}
                                    </a>

                                    <form id="register" action="{{ route('register') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>

                                <!-- KONIEC DODAJ UŻYTKOWNIKA -->

                                <!-- WYSWIETL UZYTKOWNIKOW -->

                                    <a class="dropdown-item changenavbg" href="{{ route('allusers') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('allusers').submit();">
                                        {{ __('Użytkownicy') }}
                                    </a>

                                    <form id="allusers" action="{{ route('allusers') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                <!-- KONIEC WYSWIETLANIA UZYTKOWNIKOW -->



                                 <!-- TESTY TEORETYCZNE: -->
                                 <a class="dropdown-item changenavbg" href="{{ route('theoreticaltests') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('theoreticaltests').submit();">
                                        {{ __('Testy teoretyczne') }}
                                    </a>

                                    <form id="theoreticaltests" action="{{ route('theoreticaltests') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                <!-- KONIEC TESTY TEORETYCZNE: -->
                                
                                @endif

<!-------------------------------------KONIEC OPCJI ADMINA---------------------------------------->

<!-------------------------------------OPCJE INSTRUKTORA---------------------------------------->

                                        <!-- WYSWIETLANIE OPCJI DODANIA TERMINOW -->
                                @if (Auth::user()->privilege=='instructor')
                                <a class="dropdown-item changenavbg" href="{{ route('newlesson') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('newlesson').submit();">
                                        {{ __('Dodaj termin jazd') }}
                                    </a>

                                    <form id="newlesson" action="{{ route('newlesson') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- KONIEC WYSWIETLANIA OPCJI DODANIA TERMINOW -->

                                    <!-- WYSWIETLANIE DODANYCH TERMINOW -->
                                <a class="dropdown-item changenavbg" href="{{ route('showlesson') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('showlesson').submit();">
                                        {{ __('Wyświetl dodane terminy') }}
                                    </a>

                                    <form id="showlesson" action="{{ route('showlesson') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                     <!-- KONIEC WYSWIETLANIA DODANYCH TERMINOW -->

                                    <!-- WYSWIETLANIE ZAREZERWOWANYCH TERMINOW -->
                                    <a class="dropdown-item changenavbg" href="{{ route('bookedlesson') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('bookedlesson').submit();">
                                        {{ __('Zarezerwowane terminy') }}
                                    </a>

                                    <form id="bookedlesson" action="{{ route('bookedlesson') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- KONIEC WYSWIETLANIA ZAREZERWOWANYCH TERMINOW -->
                                @endif
<!-------------------------------------KONIEC OPCJI INSTRUKTORA---------------------------------------->

<!-------------------------------------OPCJE UŻYTKOWNIKA---------------------------------------->
                                @if (Auth::user()->privilege=='user')
                                <!-- WYSWIETLENIE JAZD - JAZDY: -->
                                <a class="dropdown-item changenavbg" href="{{ route('actualLessons') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('actualLessons').submit();">
                                        {{ __('Aktualne terminy jazd') }}
                                    </a>

                                    <form id="actualLessons" action="{{ route('actualLessons') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- KONIEC WYSWIETLENIA JAZD - JAZDY -->
                                    <!-- WYSWIETLENIE ZAPISANYCH JAZD USERA - JAZDY: -->
                                <a class="dropdown-item changenavbg" href="{{ route('userLessons') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('userLessons').submit();">
                                        {{ __('Zarezerwowane jazdy') }}
                                    </a>

                                    <form id="userLessons" action="{{ route('userLessons') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- KONIEC WYSWIETLENIA ZAPISANYCH JAZD JAZD - JAZDY -->

                                      <!-- TESTY TEORETYCZNE: -->
                                <a class="dropdown-item changenavbg" href="{{ route('choosecategory') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('choosecategory').submit();">
                                        {{ __('Testy teoretyczne') }}
                                    </a>

                                    <form id="choosecategory" action="{{ route('choosecategory') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- KONIEC TESTY TEORETYCZNE -->
                                @endif

<!-------------------------------------KONIEC OPCJI UŻYTKOWNIKA---------------------------------------->

                               



                                <!-- WYLOGUJ SIĘ -->

                                    <a class="dropdown-item changenavbg" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj się') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                <!-- KONIEC WYLOGUJ SIĘ -->

                                






                                </div>


                                
                               

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>

<!-- Footer -->

<footer class="footer section2 bg-footer appfooter">
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
					<p>Ośrodek szkolenia kierowców OSKDDG w latach 2019-2021 zdobył tytuł najlepszego ośrodka w województwie Mazowieckim.</p>
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

</div>
</body>
</html>