@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row justify-content-center passwordF">
        
        <div class="col-md-5">
            <div class="dataeditorText">
                <h6><p>Edytuj dane użytkownika:</p> </h6>
            </div>
        
            <form role="form" method="get" action="{{route('allusers')}}" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Uprawnienie:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "firstName" id="firstName" class="form-control"  value="{{$row->privilege}}" >
                </div>
            </div>
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Imię:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "firstName" id="firstName" class="form-control"  value="{{$row->firstName}}">
                </div>
            </div>
            @if($row->secondName!=null)
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Drugie imię:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "secondName" id="secondName" class="form-control" value="{{$row->secondName}}">
                </div>
            </div>
            @else
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Drugie imię:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "secondName" id="secondName" class="form-control" value="Brak">
                </div>
            </div>
            @endif

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Nazwisko:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "lastName" id="lastName" class="form-control"  value="{{$row->lastName}}">
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Województwo:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "province" id="province" class="form-control" value="{{$row->province}}">
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Miasto:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "town" id="town" class="form-control" value="{{$row->town}}" >
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Ulica:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "street" id="street" class="form-control" value="{{$row->street}}" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer domu:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "houseNumber" id="houseNumber" class="form-control" value="{{$row->houseNumber}}" >
                </div>
            </div>
            

        </div>

        <div class="col-md-5">
        @if($row->flatNumber!=null)
        <div class="form-group">
        <br></br>

                <label for="actualdata" class="col-sm-4 control-label">Mieszkanie:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "flatNumber" id="flatNumber" class="form-control" value="{{$row->flatNumber}}" >
                </div>
            </div>
        @else
        <div class="form-group">
        <br></br>

                <label for="actualdata" class="col-sm-4 control-label">Mieszkanie:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "flatNumber" id="flatNumber" class="form-control" value="Brak" >
                </div>
            </div>
        @endif
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Kod pocztowy:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "postCode" id="postCode" class="form-control" value="{{$row->postCode}}" >
                <span style="color:red;font-size:12px;">
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Email:</label>
                <div class="col-sm-10">
                <input type="email" disabled name = "email" id="email" class="form-control" required value="{{$row->email}}" >
                </div>
            </div>
    
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Telefon:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "phone" id="phone" class="form-control" required value="{{$row->phone}}" >
                <span style="color:red;font-size:12px;">
                </div>
            </div>

            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">PESEL:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "pesel" id="pesel" class="form-control" required value="{{$row->pesel}}" >
                </div>
            </div>
            @if($row->pkkNumber!=null)
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer PKK:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "pkkNumber" id="pkkNumber" class="form-control" value="{{$row->pkkNumber}}" >
                </div>
            </div>
            @else
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer PKK:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "pkkNumber" id="pkkNumber" class="form-control" value="Brak" >
                </div>
            </div>
            @endif
            @if($row->licenceNumber!=null)
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer licencji:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "licenceNumber" id="licenceNumber" class="form-control" value="{{$row->licenceNumber}}">
                </div>
            </div>
            @else
            <div class="form-group">
                <label for="actualdata" class="col-sm-4 control-label">Numer licencji:</label>
                <div class="col-sm-10">
                <input type="text" disabled name = "licenceNumber" id="licenceNumber" class="form-control" value="Brak">
                </div>
            </div>
            @endif
            <div class="form-group col-lg-5">
                <button type="submit" class="btn btn-secondary ">Powrót</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection