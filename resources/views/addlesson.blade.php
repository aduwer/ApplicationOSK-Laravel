@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <p>Dodawanie wolnych terminów na jazdy praktyczne</p>
    </div>    

    <div class="row">
        <div class="col-md-6">
            
            <form method="POST" id="addlesson" action="{{ route('addlesson') }}">
            @csrf

                <div class="form-group row">
                    <label for="dayValue" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>
                    <div class="col-md-6">
                        <input id="dayValue" type="date" class="form-control" name="dayValue" required placeholder="rrrr-mm-dd">
                        <span style="color:red"> @error('dayValue'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="statTime" class="col-md-4 col-form-label text-md-right">{{ __('Godzina rozpoczęcia') }}</label>
                    <div class="col-md-6">
                    <input id="statTime" type="text" class="form-control" name="startTime" required placeholder="gg:mm">
                    <span style="color:red"> @error('statTime'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endTime" class="col-md-4 col-form-label text-md-right">{{ __('Godzina zakończenia') }}</label>
                    <div class="col-md-6">
                        <input id="endTime" type="text" class="form-control" name="endTime" required placeholder="gg:mm">
                        <span style="color:red"> @error('endTime'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="placeValue" class="col-md-4 col-form-label text-md-right">{{ __('Miejsce') }}</label>
                    <div class="col-md-6">
                        <input id="placeValue" type="text" class="form-control" name="placeValue" required placeholder="Adres rozpoczęcia zajęć">
                        <span style="color:red"> @error('placeValue'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="categoryValue" class="col-md-4 col-form-label text-md-right">{{ __('Kategoria') }}</label>
                        <div class="col-md-6">
                            <select id="categoryValue" type="text" class="form-control" name="categoryValue" required  style='text-transform:uppercase'>
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
                            <button type="submit" onclick="console.log('HelloWorld')" class="btn btn-dark">{{ __('Dodaj') }}</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="reset" onclick="console.log('HelloWorld')" class="btn btn-warning">{{ __('Wyczyść') }}</button>
                        </div>
                    </div>
                </div>
                        
            </form>
                
            
        </div>
        <div class="col-md-6 imagesRWD">
            <img src="images/bg/addlesson.jpg" alt="Obraz do dodawania jazd praktycznych" class="imgRWD">
        </div>
    </div>
</div>
@endsection