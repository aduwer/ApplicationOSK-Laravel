@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rejestracja') }}</div>

                <div class="card-body">
                    <form method="POST" id="register" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="privilege" class="col-md-4 col-form-label text-md-right">{{ __('Uprawnienie') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="privilege" id="privilege">
                                    <option value="">Wybierz uprawnienie</option>
                                    <option value="admin">Administrator</option>
                                    <option value="user">Użytkownik</option>
                                    <option value="instructor">Instruktor</option>
                                </select>
                                @error('privilege')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Imię') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('firstName')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="secondName" class="col-md-4 col-form-label text-md-right">{{ __('Drugie imię') }}</label>

                            <div class="col-md-6">
                                <input id="secondName" type="text" class="form-control @error('secondName') is-invalid @enderror" name="secondName" value="{{ old('secondName') }}" autocomplete="secondName" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('secondName')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('lastName')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Województwo') }}</label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" required autocomplete="province" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('province')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Miasto') }}</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('town')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postCode" class="col-md-4 col-form-label text-md-right">{{ __('Kod pocztowy') }}</label>

                            <div class="col-md-6">
                                <input id="postCode" type="text" class="form-control @error('postCode') is-invalid @enderror" placeholder="xx-xxx" name="postCode" value="{{ old('postCode') }}" required autocomplete="postCode" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('postCode')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Ulica') }}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('street')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="houseNumber" class="col-md-4 col-form-label text-md-right">{{ __('Numer domu') }}</label>

                            <div class="col-md-6">
                                <input id="houseNumber" type="text" class="form-control @error('houseNumber') is-invalid @enderror" name="houseNumber" value="{{ old('houseNumber') }}" required autocomplete="houseNumber" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('houseNumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="flatNumber" class="col-md-4 col-form-label text-md-right">{{ __('Numer mieszkania') }}</label>

                            <div class="col-md-6">
                                <input id="flatNumber" type="text" class="form-control @error('flatNumber') is-invalid @enderror" name="flatNumber" value="{{ old('flatNumber') }}" autocomplete="flatNumber" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('flatNumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email">

                                <span style="color:red;font-size:12px;">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefon') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="xxx-xxx-xxx" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pesel" class="col-md-4 col-form-label text-md-right">{{ __('Pesel') }}</label>

                            <div class="col-md-6">
                                <input id="pesel" type="text" class="form-control @error('pesel') is-invalid @enderror" name="pesel" value="{{ old('pesel') }}" required autocomplete="pesel" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('pesel')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pkkNumber" class="col-md-4 col-form-label text-md-right">{{ __('Numer PKK') }}</label>

                            <div class="col-md-6">
                                <input id="pkkNumber" type="text" class="form-control @error('pkkNumber') is-invalid @enderror" placeholder="Wpisujemy w przypadku rejestracji kandydata" name="pkkNumber" value="{{ old('pkkNumber') }}"  autocomplete="pkkNumber" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('pkkNumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="licenceNumber" class="col-md-4 col-form-label text-md-right">{{ __('Numer licencji') }}</label>

                            <div class="col-md-6">
                                <input id="licenceNumber" type="text" class="form-control @error('licenceNumber') is-invalid @enderror" placeholder="Wpisujemy w przypadku rejestracji instruktora" name="licenceNumber" value="{{ old('licenceNumber') }}" autocomplete="licenceNumber" autofocus>

                                <span style="color:red;font-size:12px;">
                                    @error('licenceNumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                <span style="color:red;font-size:12px;">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potwierdź hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="console.log('HelloWorld')" class="btn btn-primary">
                                    {{ __('Zarejestruj') }}
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
