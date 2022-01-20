<link rel="stylesheet" href="{{asset('css/style.css')}}">
@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <p>Dodawanie wolnych terminów na jazdy praktyczne</p>
    </div>    
    <div class="row">
        <div class="col-md-6">
            
            <form method="POST" id="addlesson" action="{{route('update.lesson',$row->id)}}">
            @csrf

                <div class="form-group row">
                    <label for="dayValue" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>
                    <div class="col-md-6">
                        <input id="dayValue" type="date" class="form-control" value="{{$row->data}}" name="dayValue" required placeholder="rrrr-mm-dd">
                        <span style="color:red"> @error('dayValue'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="statTime" class="col-md-4 col-form-label text-md-right">{{ __('Godzina rozpoczęcia') }}</label>
                    <div class="col-md-6">
                    <input id="statTime" type="text" class="form-control" value="{{$row->start_time}}" name="startTime" required placeholder="gg:mm">
                    <span style="color:red"> @error('statTime'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endTime" class="col-md-4 col-form-label text-md-right">{{ __('Godzina zakończenia') }}</label>
                    <div class="col-md-6">
                        <input id="endTime" type="text" class="form-control" value="{{$row->end_time}}" name="endTime" required placeholder="gg:mm">
                        <span style="color:red"> @error('endTime'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="placeValue" class="col-md-4 col-form-label text-md-right">{{ __('Miejsce') }}</label>
                    <div class="col-md-6">
                        <input id="placeValue" type="text" class="form-control" value="{{$row->place}}" name="placeValue" required placeholder="ul. Ulicy nr mieszkania">
                        <span style="color:red"> @error('placeValue'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="categoryValue" class="col-md-4 col-form-label text-md-right">{{ __('Kategoria') }}</label>
                        <div class="col-md-6">
                            <select id="categoryValue" type="text" class="form-control" name="categoryValue" required  style='text-transform:uppercase'>
                            <option>{{$row->category}}</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                            </select>
                            <span style="color:red"> @error('categoryValue'){{ $message }}@enderror</span>
                        </div>
                </div>
                            
                <div class="row justify-content-center">
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="submit"  class="btn btn-dark">{{ __('Aktualizuj') }}</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="reset"  class="btn btn-warning">{{ __('Wyczyść') }}</button>
                        </div>
                    </div>
                </div>
                        
            </form>
                
            </div>
        <div class="col-md-6 imagesRWD">
        <img src="{{asset('images/bg/addlesson.jpg')}}" alt="Obraz do dodawania jazd praktycznych" class="imgRWD">
        </div>
    </div>
</div>
@endsection