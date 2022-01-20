@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/testcss.css')}}">
    <div class="container mt-sm-5 my-1">  
    
    <form method="post" action="{{route('finishtest',$questions->id)}}">
    @csrf
    <div class="questionclass ml-sm-5 pl-sm-5 pt-2">
    <img src="{{ asset('storage/questionfiles/'.$questions->file) }}" class="img-thumbnail" alt="">
        <div class="py-2 h5"><b>{{Session::get("nextquestion")}}. {{ $questions->question}}</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="optionsclass"> 
            <label class="optionsclass">{{ $questions->A}} <input value="A" type="radio" name="answer" checked> <span class="checkmark"></span> </label>
            <label class="optionsclass">{{ $questions->B}} <input value="B" type="radio" name="answer"> <span class="checkmark"></span> </label>
            <label class="optionsclass">{{ $questions->C}} <input value="C" type="radio" name="answer"> <span class="checkmark"></span> </label>
            <label> <input value="{{$questions->correctanswer}}" type="hidden" name="trueanswer"> </label>
        </div>

    <div class="d-flex align-items-center pt-3">
        <div class="ml-auto mr-sm-5"> 
            <button class="btn btn-success" type="submit" >Dalej</button> 
        </div>
    </div>
    </form>
    </div>
@endsection























