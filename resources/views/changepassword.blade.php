@extends('layouts.app')
@section('content')

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


<div class="container" >
    <div class="row row-content">
            <div class="col-lg-12 text-center content">
                <h2 class="mt-5"> Witaj {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h2>
            </div>
    </div> 
    <div class="row justify-content-center passwordF">
        <div class="col-md-10">
        <p class="col-sm-8">Zmień hasło: </p> 
            <form role="form" method="post" enctype="multipart/form-data" action="{{ route('changepassword') }}" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="actualpassword" class="col-sm-4 control-label">Aktualne hasło:</label>
                <div class="col-sm-10">
                <input type="password" name = "actualpassword" id="actualpassword" class="form-control" required placeholder="Podaj swoje aktualne hasło">
                </div>
            </div>

            <div class="form-group">
                <label for="newpassword" class="col-sm-4 control-label">Nowe hasło:</label>
                <div class="col-sm-10">
                <input type="password" name="newpassword" id="newpassword" class="form-control" required placeholder="Podaj nowe hasło">
            </div>
            </div>

            <div class="form-group">
                <label for="newpasswordagain" class="col-sm-6 control-label">Potwierdź nowe hasło:</label>
                <div class="col-sm-10">
                <input type="password" name="newpasswordagain" id="newpasswordagain" class="form-control" required placeholder="Potwierdź nowe hasło">
                </div>
            </div>
    
            <div class="form-group col-lg-5">
                <button type="submit" class="btn btn-secondary ">Zmień hasło</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection