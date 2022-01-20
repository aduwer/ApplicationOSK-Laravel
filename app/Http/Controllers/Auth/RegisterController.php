<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected function redirectTo()
    {
        Alert::success('Sukces', 'Rejestracja przebiegła pomyślnie');
        return '/register';   
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //  $this->middleware('\App\Http\Middleware\PrivilegeAdmin::class');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'privilege'=>['required','string'],
            'firstName' => 'required|string|max:255',
            'secondName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'houseNumber' => 'required|string|max:255',
            'flatNumber' => 'nullable|string|max:255',
            'postCode' => 'required|string|min:6|max:6',
            'phone' => 'required|string|min:9|max:11',
            'pesel' => 'required|string|min:11|max:11|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'pkkNumber' => 'nullable|string|min:20|max:24|unique:users',
            'licenceNumber' => 'nullable|string|min:6|max:255|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'privilege' => $data['privilege'],
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'lastName' => $data['lastName'],
            'province' => $data['province'],
            'town' => $data['town'],
            'postCode' => $data['postCode'],
            'street' => $data['street'],
            'houseNumber' => $data['houseNumber'],
            'flatNumber' => $data['flatNumber'],
            'phone' => $data['phone'],
            'pesel' => $data['pesel'],
            'pkkNumber' => $data['pkkNumber'],
            'licenceNumber' => $data['licenceNumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $maildetails=[
            'firstName'=>$user->firstName,
            'lastName'=>$user->lastName,
            'login'=>$user->email,
            'password'=>$data['password'],
        ];
        Mail::to($user->email)->send(new WelcomeMail($maildetails));
        return $user;

    }
}
