@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row justify-content-center passwordF">
        
        <div class="col-md-5">

        
            
            <div class="dataeditorText">
                <h6><p>Edytuj dane użytkownika:</p> </h6>
            </div>
        
            <form role="form" method="post" action="{{route('update_user',$row->id)}}" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Uprawnienie:</label>
                <div class="col-sm-10">
                <select class="form-control" name="privilege" id="privilege">
                    @if($row->privilege=="instructor")
                    <option value="instructor">Instruktor</option>
                     <option value="admin">Administrator</option>
                     <option value="user">Użytkownik</option>
                     @elseif($row->privilege=="admin")
                     <option value="admin">Administrator</option>
                     <option value="instructor">Instruktor</option>
                     <option value="user">Użytkownik</option>
                     @else
                     <option value="user">Użytkownik</option>
                     <option value="admin">Administrator</option>
                     <option value="instructor">Instruktor</option>
                     @endif
                </select>
                @error('privilege')
                <div class="invalid-feedback">
                <strong>{{$message}}</strong>
                </div>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Imię:</label>
                <div class="col-sm-10">
                <input type="text" name = "firstName" id="firstName" class="form-control" required value="{{$row->firstName}}" placeholder="Edytuj imię">
                <span style="color:red;font-size:12px;">
                @error('firstName')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Drugie imię:</label>
                <div class="col-sm-10">
                <input type="text" name = "secondName" id="secondName" class="form-control" value="{{$row->secondName}}"placeholder="Edytuj drugie imię">
                <span style="color:red;font-size:12px;">
                @error('secondName')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Nazwisko:</label>
                <div class="col-sm-10">
                <input type="text" name = "lastName" id="lastName" class="form-control" required value="{{$row->lastName}}" placeholder="Edytuj nazwisko">
                <span style="color:red;font-size:12px;">
                @error('lastName')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Województwo:</label>
                <div class="col-sm-10">
                <input type="text" name = "province" id="province" class="form-control" value="{{$row->province}}" required placeholder="Edytuj Województwo">
                <span style="color:red;font-size:12px;">
                @error('province')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Miasto:</label>
                <div class="col-sm-10">
                <input type="text" name = "town" id="town" class="form-control" value="{{$row->town}}" required placeholder="Edytuj miasto">
                <span style="color:red;font-size:12px;">
                @error('town')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Ulica:</label>
                <div class="col-sm-10">
                <input type="text" name = "street" id="street" class="form-control" value="{{$row->street}}" required placeholder="Edytuj ulicę">
                <span style="color:red;font-size:12px;">
                @error('street')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer domu:</label>
                <div class="col-sm-10">
                <input type="text" name = "houseNumber" id="houseNumber" class="form-control" value="{{$row->houseNumber}}" required placeholder="Edytuj numer domu">
                <span style="color:red;font-size:12px;">
                @error('houseNumber')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>
            

        </div>

        <div class="col-md-5">
        <div class="form-group">
        <br></br>
        <br></br>

                <label for="actualdata" class="col-sm-4 control-label">Numer mieszkania:</label>
                <div class="col-sm-10">
                <input type="text" name = "flatNumber" id="flatNumber" class="form-control" value="{{$row->flatNumber}}" placeholder="Edytuj numer mieszkania">
                <span style="color:red;font-size:12px;">
                @error('flatNumber')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Kod pocztowy:</label>
                <div class="col-sm-10">
                <input type="text" name = "postCode" id="postCode" class="form-control" value="{{$row->postCode}}" required placeholder="__-___">
                <span style="color:red;font-size:12px;">
                @error('postCode')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Email:</label>
                <div class="col-sm-10">
                <input type="email" name = "email" id="email" class="form-control" required value="{{$row->email}}" placeholder="Edytuj adres email">
                <span style="color:red;font-size:12px;">
                @error('email')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>
    
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Telefon:</label>
                <div class="col-sm-10">
                <input type="text" name = "phone" id="phone" class="form-control" required value="{{$row->phone}}" placeholder="Edytuj numer telefonu">
                <span style="color:red;font-size:12px;">
                @error('phone')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">PESEL:</label>
                <div class="col-sm-10">
                <input type="text" name = "pesel" id="pesel" class="form-control" required value="{{$row->pesel}}" placeholder="Edytuj pesel">
                <span style="color:red;font-size:12px;">
                @error('pesel')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer PKK:</label>
                <div class="col-sm-10">
                <input type="text" name = "pkkNumber" id="pkkNumber" class="form-control" value="{{$row->pkkNumber}}" placeholder="Edytuj numer PKK">
                <span style="color:red;font-size:12px;">
                @error('pkkNumber')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer licencji:</label>
                <div class="col-sm-10">
                <input type="text" name = "licenceNumber" id="licenceNumber" class="form-control" value="{{$row->licenceNumber}}" placeholder="Edytuj numer licencji">
                <span style="color:red;font-size:12px;">
                @error('licenceNumber')
                    {{ $message }}
                @enderror
                </span>
                </div>
            </div>

            <div class="form-group col-lg-5">
                <button type="submit" class="btn btn-secondary ">Aktualizuj</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection