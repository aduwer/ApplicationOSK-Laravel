<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Zajecia_praktyczne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Mail\canceledLessonByUserMail;
use App\Mail\bookedLessonByUserMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

class UserController extends Controller
{
    public function index() 
    {
        if(\Auth::check()){
            $id = \Auth::user()->id;
            $users = User::where('id', $id)->get();
            return view('changepassword', compact('users'));
        }
        else
            return view('/login');
    }

    public function changepassword(Request $request)
    {
        if(\Auth::check()){
        $id = \Auth::user()->id;
        $users = User::find($id);
        if(Hash::check($request->actualpassword, $users->password))                 // wprowadzone aktualne hasło zgadza się z hasłem użytkownika               
        {
            
            if($request->newpassword==$request->newpasswordagain)                   // potwierdzenie, ze nowe hasło jest wpisane dwa razy takie samo.
            {
                $users->password = Hash::make($request->newpassword);               // ustawienia nowego hasla uzytkownikowi
            }
            else {
                Alert::error('Error', 'Podane hasła nie są jednoznaczne');
                return view('changepassword', compact('users'));                   // przejscie ponownie do strony edycji hasła
            }
               
        
            if($users->save())                                                      // zapisanie zmian 
            { 
                Alert::success('Sukces', 'Hasło zostało zmienione prawidłowo');
                return view('changepassword', compact('users'));                            
            }       
        }
        else{
            Alert::error('Error', 'Wprowadzone hasło nie jest zgodne z hasłem użytkownika');
            return view('changepassword', compact('users'));
        } 
        }
        else
            return view('auth/login');
    }
    public function showlesson (Request $request)
    {
        if(\Auth::check()){
            $lessonsData = DB::table('practice_lessons')->get();
            $usersData = DB::table('users')->get();
            $filterData=[
                'filterDayFrom'=>$request->input('dayFrom'),
                'filterDayTo'=>$request->input('dayTo'),
                'filterCategory'=>$request->input('category')
        ];
            return view('actuallesson', ['dane_wyswietl' => $lessonsData,'dane_uzytkownikow'=>$usersData,'filterData'=>$filterData]);
        }
        else
            return view('/login');
    }
    public function showuserlesson (Request $request)
    {
        if(\Auth::check()){
            $lessonsData = DB::table('practice_lessons')->get();
            $usersData = DB::table('users')->get();
            $filterData=[
                'filterDayFrom'=>$request->input('dayFrom'),
                'filterDayTo'=>$request->input('dayTo'),
                'filterCategory'=>$request->input('category')
        ];
            return view('userlesson', ['dane_wyswietl' => $lessonsData,
            'dane_uzytkownikow'=>$usersData,'filterData'=>$filterData]);
        }
        else
            return view('/login');
    }
    public function update_status(Request $request,$id)
    {
        $data = DB::table('practice_lessons')->get();
        $idUser = \Auth::user()->id;
        $lesson=DB::select('select * from practice_lessons where id=?',[$id]);
        foreach($lesson as $infromation)
        {
            $startTime=($infromation->start_time);
            $endTime=($infromation->end_time);
        }
        $status=true;
        foreach($data as $row)
        {
            if($row->status==$idUser)
            {
                 if($startTime>$row->start_time && $startTime<$row->end_time  || $endTime>$row->start_time && $endTime<$row->end_time )
                 {
                     $status=false;
                 }
            }
        }
        if($status==true)
        {
        $lesson=Zajecia_praktyczne::find($id);
        $date=$lesson->data;
        $start_time=$lesson->start_time;
        $end_time=$lesson->end_time;
        $instructor_id=$lesson->instructor_id;
        $instructor = User::find($instructor_id);
        $firstName=$instructor->firstName;
        $lastName=$instructor->lastName;
        $email=$instructor->email;
        $maildetails=[
            'date'=>$date,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'email'=>$email,
        ];
        Mail::to($email)->send(new bookedLessonByUserMail($maildetails));
        DB::update('update practice_lessons set status = ? where id = ?',[$idUser,$id]);
        Alert::success('Sukces', 'Zostałeś zapisany na zajęcia');
        }
        else
        {
            Alert::error('Błąd', 'Jesteś zapisany już na jazdy w tych godzinach.');
        }   
        return redirect()->route('actualLessons');
    }
    public function cancel_lessons(Request $request,$id)
    {
        $status="free";
        $lesson=Zajecia_praktyczne::find($id);
        $date=$lesson->data;
        $start_time=$lesson->start_time;
        $end_time=$lesson->end_time;
        $instructor_id=$lesson->instructor_id;
        $instructor = User::find($instructor_id);
        $firstName=$instructor->firstName;
        $lastName=$instructor->lastName;
        $email=$instructor->email;
        $maildetails=[
            'date'=>$date,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'email'=>$email,
        ];
        Mail::to($email)->send(new canceledLessonByUserMail($maildetails));
        DB::update('update practice_lessons set status = ? where id = ?',[$status,$id]);
        Alert::success('Sukces', 'Zajęcia zostały odwołane');
        return redirect()->route('userLessons');
    }
    public function send_email(Request $request)
    {
        $personalData=$request->input('personalData');
                $email=$request->input('email');
                $message=$request->input('message');
            Mail::to('inzynierkaoskddg@gmail.com')->send(new contactMail($personalData,$email,$message));
            return back()->with('success',Alert::success('Sukces', 'E-mail został wysłany poprawnie.'));
    }

    public function choosecategory(Request $request)
    {
        if(\Auth::check()){
           
            $dane = DB::table('quizzes')->get();
            return view('choosecategory', ['dane_wyswietl' => $dane,]);
        }
        else
            return view('/login');
    }


}
