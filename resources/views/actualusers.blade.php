@extends('layouts.app')
@section('content')
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<div class="container col-md-12 fluid" >
    <link href="css/style2.css" rel="stylesheet">

        <div class="col-md-12">

            <!-- Miejsce na wyświtlenie użytkowników -->
            <div class="col-md-12 mt-4">
                      <div class="table-responsive">
                          <table class="table">

	                  	  	  <h4><i class="fa fa-angle-right "></i> Zarejestrowani użytkownicy </h4>
                              <thead>
                              <tr>
                                  <th scope="col">ID.</th>
                                  <th scope="col">Uprawnienie.</th>
                                  <th scope="col">Imię.</th>
                                  <th scope="col">Nazwisko.</th>
                                  <th scope="col">E-mail.</th>
                                  <th scope="col">Telefon kontaktowy.</th>
                                  <th scope="col">Data utworzenia konta.</th>
                              </thead>
                              <tbody>
                              @foreach ($dane_wyswietl as $dane)
                              <tr>
                              <td>{{ $dane->id}}</td>
                              <td>{{ $dane->privilege}}</td>
                              <td>{{ $dane->firstName}}</td>
                              <td>{{ $dane->lastName}}</td>
                              <td>{{ $dane->email}}</td>
                              <td>{{ $dane->phone}}</td>
                              <td>{{ $dane->created_at}}</td>
                              <td>
                              <a href="{{route('edit.user',$dane->id)}}" class="btn btn-info btn-round-full">Edytuj</a>
                                </td>
                                <td>
                                <a href="{{route('delete_user',$dane->id)}}" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć osobę?')" >Usuń</a>
                              <td>
                                <a href="{{route('show.user',$dane->id)}}" class="btn btn-success" >Wyświetl</a>
                              <td>
                            </td>
                              </tr>
                            @endforeach     
                              </tbody>
                          </table>
                      </div>
                      <button class="btn btn-warning" href="{{ route('register') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('register').submit();">
                                        {{ __('Dodaj użytkownika') }}
                      </button>
                      <form id="register" action="{{ route('register') }}" method="GET" class="d-none">
                          @csrf
                      </form>
                  </div>          
    </div>
</div>

</body>
</html>
@endsection