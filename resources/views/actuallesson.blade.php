@extends('layouts.app')

@section('content')
<?php
use Carbon\Carbon;
$fullDate = Carbon::now()->addHours(1);
//Get date
$date=$fullDate->toDateString();
?>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<div class="container">
    <div>
        <p>Wyświetlenie terminów jazd praktycznych</p>
    </div>    
    <link href="css/style2.css" rel="stylesheet">
    <div class="row fluid">
        <div class="col-md-9">
            <!-- Formularz do wyswietlenia jazd praktycznych -->
            <form class="row" method="get" id="actualLessons" action="{{route('actualLessons')}}">
            @csrf

                <div class="col-md-4 form-group">
                    <label for="dayFrom" class="col-12  text-center">{{ __('Data od') }}</label>
                    <div class="col-md-12">
                        <input id="dayFrom" type="date" class="form-control" name="dayFrom" required placeholder="rrrr-mm-dd">
                    </div>
                    
                </div>

                <div class="col-md-4 form-group">
                    <label for="dayTo" class="col-12 text-center">{{ __('Data do') }}</label>
                    <div class="col-12">
                    <input id="dayTo" type="date" class="form-control" name="dayTo" required placeholder="rrrr-mm-dd">
                    </div>
                </div>

                <div class="col-md-4 form-group">
                    <label for="category" class="col-12  text-center">{{ __('Kategoria') }}</label>
                    <div class="col-12">
                    <select id="category" type="text" class="form-control" name="category" required  style='text-transform:uppercase'>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                            </select>
                    </div>
                </div>

                <div class="col-md-12 form-group">
                        <div class="col-md-12">
                            <button type="submit"  class="btn btn-dark w-100 center">{{ __('Szukaj') }}</button>
                        </div>
                </div>
                            
               
            </form>
            
        </div>
        <div class="col-md-3 imagesRWD">
            <img src="images/bg/addlesson.jpg" alt="Obraz do dodawania jazd praktycznych" class="imgRWD">
        </div>

        <div class="col-sm-12 mt-3">
            <p>Wyniki wyszukiwania:</p>
        </div>

        <!-- Miejsce na wyświtlenie użytkowników -->
        <div class="col-md-12 mt-4">
            <div class="table-responsive">
                <table class="table">

	                  	  	  <h4><i class="fa fa-angle-right "></i> Dodane terminy jazd </h4>
                              <thead>
                              <tr>
                                  <th scope="col">Imię i nazwisko instrutkora.</th>
                                  <th scope="col">Data.</th>
                                  <th scope="col">Start.</th>
                                  <th scope="col">Koniec.</th>
                                  <th scope="col">Miejsce.</th>
                                  <th scope="col">Kategoria.</th>
                                  
                              </thead>
                              <tbody>
                              @foreach ($dane_wyswietl as $dane)
                              <tr>
                                  @foreach($dane_uzytkownikow as $userData)
                                    @if($dane->instructor_id==$userData->id)
                                    <?php
                                    $firstName = $userData->firstName.' ';
                                    $lastName = $userData->lastName;
                                    ?>
                                    @endif
                                  @endforeach
                                  @if($date<=$dane->data)
                                  @if(isset($filterData['filterCategory']))
                                    @if($filterData['filterDayFrom']<=$filterData['filterDayFrom'])
                                        @if($filterData['filterCategory']==$dane->category and $filterData['filterDayFrom']<=$dane->data and $filterData['filterDayTo']>=$dane->data )
                                        @if($dane->status=="free")
                                        <td>{{ $firstName}}{{$lastName}}</td>
                                        <td>{{ $dane->data}}</td>
                                        <td>{{ $dane->start_time}}</td>
                                        <td>{{ $dane->end_time}}</td>
                                        <td>{{ $dane->place}}</td>
                                        <td>{{ $dane->category}}</td>
                                        <td>
                                        <a href="{{route('updateStatus',$dane->id)}}" class="btn btn-success show_confirm" >Zapisz</a>
                                        </td>
                                        </tr>
                                        @endif
                                        @endif
                                  @endif
                                  @else
                                  @if($dane->status=="free")
                                    <tr>
                                    <td>{{ $firstName}}{{$lastName}}</td>
                                    <td>{{ $dane->data}}</td>
                                    <td>{{ $dane->start_time}}</td>
                                    <td>{{ $dane->end_time}}</td>
                                    <td>{{ $dane->place}}</td>
                                    <td>{{ $dane->category}}</td>
                                        
                                            <td>
                                            <a href="{{route('updateStatus',$dane->id)}}" class="btn btn-success show_confirm" >Zapisz</a>
                                        </td>
                                        </tr>
                                    @endif
                                    @endif
                                    @endif
                                        @endforeach     
                              </tbody>
                </table>
            </div>
        </div>          
    </div>
</div>
</body>
</html>
@endsection
