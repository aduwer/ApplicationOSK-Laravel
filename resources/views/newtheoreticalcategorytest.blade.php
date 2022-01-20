@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dodaj kategorię') }}</div>

                <div class="card-body">
                    <form method="POST" id="addcategoryname" action="{{ route('addtheoreticalcategory') }}">
                        @csrf
                       <div class="form-group row">
                            <label for="categoryName" class="col-md-4 col-form-label text-md-right">{{ __('Kategoria testu') }}</label>

                            <div class="col-md-6">
                                <input id="categoryName" type="text" class="form-control @error('categoryName') is-invalid @enderror" name="categoryName" required autocomplete="categoryName" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('categoryName')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="console.log('HelloWorld')" class="btn btn-primary">
                                    {{ __('Dodaj kategorię') }}
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
