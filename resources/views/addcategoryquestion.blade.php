@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dodaj pytanie') }}</div>

                <div class="card-body">
                    <form method="post" id="addcategoryname" action="{{route('add.newquestion',$row->id)}}" enctype="multipart/form-data">
                        @csrf
                        
                        

                       <div class="form-group row">
                            <label for="Question" class="col-md-4 col-form-label text-md-right">{{ __('Treść pytania') }}</label>

                            <div class="col-md-6">
                                <input id="Question" type="text" class="form-control @error('Question') is-invalid @enderror" name="Question" required autocomplete="Question" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('Question')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="A" class="col-md-4 col-form-label text-md-right">{{ __('A') }}</label>

                            <div class="col-md-6">
                                <input id="A" type="text" class="form-control @error('A') is-invalid @enderror" name="A" required autocomplete="categoryName" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('A')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="B" class="col-md-4 col-form-label text-md-right">{{ __('B') }}</label>

                            <div class="col-md-6">
                                <input id="B" type="text" class="form-control @error('B') is-invalid @enderror" name="B" required autocomplete="B" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('B')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="C" class="col-md-4 col-form-label text-md-right">{{ __('C') }}</label>

                            <div class="col-md-6">
                                <input id="C" type="text" class="form-control @error('C') is-invalid @enderror" name="C" required autocomplete="C" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('C')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="correctAnswer" class="col-md-4 col-form-label text-md-right">{{ __('Poprawna odpowiedź') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="correctAnswer" id="correctAnswerr">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                @error('correctAnswer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Plik') }}</label>

                            <div class="col-md-6">
                                <input id="file" type="file" name="file" required autocomplete="file" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('file')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>


                

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="console.log('HelloWorld')" class="btn btn-primary">
                                    {{ __('Dodaj pytanie') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
