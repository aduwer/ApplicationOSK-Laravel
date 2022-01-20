@extends('layouts.app')

@section('content')
<html>
<head>
    <link href="css/style2.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row">
        <div class="col-md-6">
        <!-- Miejsce na wyświtlenie kategorii testów teoretycznych -->
        <!-- <div class="col-md-8 mt-4"> -->
            <div class="table-responsive">
                <table class="table">

	                  	  	  <h4><i class="fa fa-angle-right "></i> Kategorie testów teoretycznych </h4>
                              <thead>
                              <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Nazwa kategorii</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach ($dane_wyswietl as $dane)
                              <tr>
                              <td>{{ $dane->id}}</td>
                              <td>{{ $dane->categoryname}}</td>
                              <td>
                              <a href="{{route('add.question',$dane->id)}}" class="btn btn-info btn-round-full"> Dodaj pytanie</a>
                              </td>
                              @endforeach 
                              </tr>
                              </tbody>
                </table>
            </div>

            <div class="form-group">
                        <div class="col-md-6">
                        <button class="btn btn-warning" href="{{ route('newtheoreticalcategory') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('newtheoreticalcategory').submit();">
                                        {{ __('Dodaj kategorię') }}
                        </button>

                                    <form id="newtheoreticalcategory" action="{{ route('newtheoreticalcategory') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                        </div>
            </div>
        </div>
        <div class="col-md-6 imagesRWD">
            <img src="images/bg/addlesson.jpg" alt="Obraz do dodawania kategorii testów teoretycznych" class="imgRWD">
    </div>          
    </div>
    
</div>
</body>
</html>
@endsection
