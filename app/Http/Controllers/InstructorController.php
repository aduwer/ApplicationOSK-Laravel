<?php

namespace App\Http\Controllers;
use App\Models\Zajecia_praktyczne;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Mail\canceledLessonByInstructorMail;
use Illuminate\Support\Facades\Mail;
class InstructorController extends Controller
{
    public function newlesson ()
    {
        if(\Auth::check()){
            
            return view('/addlesson');
        }
        else
            return view('/login');
    }
    public function showlesson (Request $request)
    {
        if(\Auth::check()){
            $filterData=[
                'filterDayFrom'=>$request->input('dayFrom'),
                'filterDayTo'=>$request->input('dayTo'),
                'filterCategory'=>$request->input('category')
        ];
            $dane = DB::table('practice_lessons')->get();
            return view('showlesson', ['dane_wyswietl' => $dane,'filterData'=>$filterData]);
        }
        else
            return view('/login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Zajecia_praktyczne
     */

    public function update_lesson(Request $request,$id)
    {
        $idInstruktor = \Auth::user()->id;
        $request->validate([
        'dayValue' => 'required|string|min:10|max:10,$id',
        'startTime' => 'required|string|min:5|max:5,$id',
        'endTime' =>'required|string|min:5|max:5,$id',
        'placeValue' => 'required|string|max:255,$id',
        'categoryValue' => 'required|string|min:1|max:2,$id',
        ]);

        $dane = DB::table('practice_lessons')->get();
        foreach($dane as $row)
        {
            if($row->id==$id)
            $lessonStatus=$row->status;
        }
        if($lessonStatus=="free")
        {
            if($request->input('startTime')>=$request->input('endTime'))
        {
            return back()->with('fail',Alert::error('Błąd', 'Godzina rozpoczęcia zajęć jest późniejsza od godziny zakończenia.'));
        }
        else
        {
            $insert=true;
            $startTime=$request->input('startTime');
            $endTime=$request->input('endTime');
            $hours=(strtotime($endTime)-strtotime($startTime))/3600;
            if($hours!=1 and $hours!=2)
            {
                return back()->with('fail',Alert::error('Błąd', 'Jazdy muszą trwać równo 1 godzinę bądź maksymalnie 2 godziny.'));
            }
            else
            {
                foreach ($dane as $row)
        {
            if($id!=$row->id)
            {
                if($request->input('dayValue')==$row->data && $idInstruktor==$row->instructor_id)
                {
                    if($request->input('startTime')==$row->start_time && $request->input('endTime')==$row->end_time)
                    {
                        if($request->input('placeValue')!=$row->place || $request->input('categoryValue')!=$row->category)
                        {
                            $insert=true;
                        }
                        else
                        {
                            $insert=false;
                        }
                    } 
                    else if($request->input('startTime')>$row->start_time && $request->input('startTime')<$row->end_time  ||
                     $request->input('endTime')>$row->start_time && $request->input('endTime')<$row->end_time )
                    {
                        $insert=false;
                    }
                }
            }
        }
            }
            if($insert==true)
            {
                $data=$request->input('dayValue');
                $start_time=$request->input('startTime');
                $end_time=$request->input('endTime');
                $place=$request->input('placeValue');
                $category=$request->input('categoryValue');
                DB::update('update practice_lessons set data = ?,start_time = ?, end_time = ?, place = ?, category = ? where id = ?',
                [$data,$start_time,$end_time,$place,strtoupper($category),$id]);
                Alert::success('Sukces', 'Dane zostały zmienione prawidłowo');
            return redirect()->route('showlesson');
            }
            else
            {
                return back()->with('fail',Alert::error('Błąd', 'Jazdy istnieją w tych godzinach.'));
            }
            }
        }
        else
        {
            return back()->with('fail',Alert::error('Błąd', 'Nie wolno edytować zarezerwowanych terminów.'));
        }
        
         
    }
    public function delete_function(Request $request,$id)
    {
        $dane = DB::table('practice_lessons')->get();
        foreach($dane as $row)
        {
            if($row->id==$id)
            $lessonStatus=$row->status;
        }
        if($lessonStatus=="free")
        {
              DB::delete('delete from practice_lessons where id =? ',[$id]);
        Alert::success('Sukces', 'Zajęcia zostały usunięte.');
        }
        else
        {
            return back()->with('fail',Alert::error('Błąd', 'Nie wolno usuwać zarezerwowanych terminów.'));
        }
      
        return redirect()->route('showlesson');
    }

    function create (Request $request)
    {
        $idInstruktor = \Auth::user()->id;

        $request->validate([
            'dayValue' => 'required|string|min:10|max:10',
            'startTime'=> 'required|string|min:5|max:5',
            'endTime'=> 'required|string|min:5|max:5',
            'placeValue'=> 'required|string|max:255',
            'categoryValue'=> 'required|string|min:1|max:2',
        ]);
        $dane = DB::table('practice_lessons')->get();
        if($request->input('startTime')>=$request->input('endTime'))
        {
            return back()->with('fail',Alert::error('Błąd', 'Godzina rozpoczęcia zajęć jest późniejsza od godziny zakończenia.'));
        }
        else
        {
            $insert=true;
            $startTime=$request->input('startTime');
            $endTime=$request->input('endTime');
            $hours=(strtotime($endTime)-strtotime($startTime))/3600;
            if($hours!=1 and $hours!=2)
            {
                return back()->with('fail',Alert::error('Błąd', 'Jazdy muszą trwać równo 1 godzinę bądź maksymalnie 2 godziny.'));
            }
            else
            {
                   foreach ($dane as $row)
            {
                if($request->input('dayValue')==$row->data && $idInstruktor==$row->instructor_id)
                {
                    if($request->input('startTime')==$row->start_time && $request->input('endTime')==$row->end_time)
                    {
                            $insert=false;

                    } 
                    else if(($request->input('startTime')>$row->start_time && $request->input('startTime')<$row->end_time) ||
                     ($request->input('endTime')>$row->start_time && $request->input('endTime')<=$row->end_time))
                    {
                        $insert=false;
                    }
                }
            }
        if($insert==true)
        {
            $query = DB::table('practice_lessons')->insert([
            'data' => $request->input('dayValue'),
            'start_time'=> $request->input('startTime'),
            'end_time'=>  $request->input('endTime'),
            'place'=>  $request->input('placeValue'),
            'category'=> $request->input('categoryValue'),
            'status' => 'free',
            'instructor_id' => $idInstruktor,
            
        ]);
            if($query)
            {
                return back()->with('success',Alert::success('Sukces', 'Jazdy zostały dodane prawidłowo'));
            }
            else
            {
                return back()->with('fail',Alert::error('Błąd', 'Jazdy nie zostały dodane'));
            }
        }
        else
        {
            return back()->with('fail',Alert::error('Błąd', 'Jazdy istnieją w tych godzinach.'));
        }
            }
         
        }
 }
 public function booked_lessons (Request $request)
 {
     if(\Auth::check()){
         $lessonsData = DB::table('practice_lessons')->get();
         $usersData = DB::table('users')->get();
         $filterData=[
             'filterDayFrom'=>$request->input('dayFrom'),
             'filterDayTo'=>$request->input('dayTo'),
             'filterCategory'=>$request->input('category')
     ];
         return view('bookedlesson', ['practice_lesson' => $lessonsData,
         'user_data'=>$usersData,'filterData'=>$filterData]);
     }
     else
         return view('/login');
 }
 public function cancel_lesson(Request $request,$id)
 {
     $status="free";
     $lesson=Zajecia_praktyczne::find($id);
        $date=$lesson->data;
        $start_time=$lesson->start_time;
        $end_time=$lesson->end_time;
        $user_id=$lesson->status;
        $user = User::find($user_id);
        $firstName=$user->firstName;
        $lastName=$user->lastName;
        $email=$user->email;
        $maildetails=[
            'date'=>$date,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'email'=>$email,
        ];
        Mail::to($email)->send(new canceledLessonByInstructorMail($maildetails));
        DB::delete('delete from practice_lessons where id =? ',[$id]);
     Alert::success('Sukces', 'Zajęcia zostały odwołane');
     return redirect()->route('bookedlesson');
 }
 public function confirm_lesson(Request $request,$id)
 {
     $driveStatus="present";
     DB::update('update practice_lessons set driveStatus = ? where id =? ',[$driveStatus,$id]);
     Alert::success('Sukces', 'Potwierdzenie odbycia zajęć.');
     return redirect()->route('bookedlesson');
 }
        
}