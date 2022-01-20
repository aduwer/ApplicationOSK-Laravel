@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10 text-center">
				<div class="section-title">
					<!-- <span class="h6 text-color">Our Services</span> -->
					<h2 class="mt-3 content-title ">Testy na prawo jazdy 2021 </h2>
                    <h4 class="mb-2 position-relative">Skuteczna nauka do egzaminu teoretycznego na prawo jazdy.</h4>
                    <p class="mb-5">Wszystkie aktualne pytania z WORD identyczne jak na egzaminie państwowym!
                        Baza oficjalnych pytań zatwierdzonych przez Ministerstwo Infrastruktury.
                    </p>


                    <table class="table md-5">

	                  	  	  <h4><p class="mb-5 "></p> Kategorie testów teoretycznych </h4>
                             
                              <tbody>
                              @foreach ($dane_wyswietl as $dane)
                              <tr>
                            
                              <td>{{ $dane->categoryname}}</td>
                              <td>
                              <a href="{{route('dothetest',$dane->id)}}" class="btn btn-success btn-round-full"> Rozwiąż </a>
                              </td>
                              @endforeach 
                              </tr>
                              </tbody>
                    </table>
				</div>
			</div>
        </div>
	</div>

<!-- Koniec kategorii -->



@endsection