<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Zajecia_praktyczne;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function index() 
    {
        if(\Auth::check()){
            $dane = DB::table('users')->get();
            return view('actualusers', ['dane_wyswietl' => $dane]);
        }
        else
            return view('/login');
    }
    
    public function update_user(Request $request,$id)
    {
        $request->validate([
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
        'pesel' => "required|string|min:11|max:11|unique:users,pesel,$id",
        'email' => "required|string|max:255|unique:users,email,$id",
        'pkkNumber' => "nullable|string|min:20|max:24|unique:users,pkkNumber,$id",
        'licenceNumber' => "nullable|string|min:6|max:255|unique:users,licenceNumber,$id"
        ]);
        $privilege=$request->input('privilege');
        $firstName=$request->input('firstName');
        $secondName=$request->input('secondName');
        $lastName=$request->input('lastName');
        $province=$request->input('province');
        $town=$request->input('town');
        $postCode=$request->input('postCode');
        $street=$request->input('street');
        $houseNumber=$request->input('houseNumber');
        $flatNumber=$request->input('flatNumber');
        $phone=$request->input('phone');
        $pesel=$request->input('pesel');
        $email=$request->input('email');
        $pkkNumber=$request->input('pkkNumber');
        $licenceNumber=$request->input('licenceNumber');
        DB::update('update users set privilege = ?,firstName = ?, secondName = ?, lastName = ?, 
        province = ?, town = ?, postCode = ?, street = ?, houseNumber = ?,
        flatNumber = ?, phone = ?, pesel = ?, pkkNumber = ?, email = ?, licenceNumber =? where id = ?'
        ,[$privilege,$firstName,$secondName,$lastName,$province,$town,$postCode,
        $street,$houseNumber,$flatNumber,$phone,$pesel,$pkkNumber,$email,$licenceNumber,$id]);
        Alert::success('Sukces', 'Dane zostały zmienione prawidłowo');
        return redirect()->route('allusers');
    }
    public function delete_function(Request $request,$id)
    {
        $fullDate = Carbon::now()->addHours(1);
        //Get date
        $date=$fullDate->toDateString();
        $instructorLessons=false;
        $users=DB::table('users')->get();
        foreach($users as $row)
        {
            if($row->id==$id)
            {
                if($row->privilege=="instructor")
                $instructor=true;
                else
                $instructor=false;
            }
        }
        if($instructor==true)
        {
            $rows=Zajecia_praktyczne::where('instructor_id',[$id])->get();
             foreach($rows as $data)
            {
                if($date<=$data->data)
                {
                    if($data->status!="free")
                        $instructorLessons=true;
                }
            
            }
            if($instructorLessons==true)
            {
                Alert::error('Błąd', 'Nie można usunąć instruktora, gdyż posiada rezerwacje na jazdy.');
            }
            else
            {
                DB::delete('delete from users where id =? ',[$id]);
                Alert::success('Sukces', 'Instruktor został usnięty'); 
            }
        }
        else
        {
        $practice_lessons = DB::table('practice_lessons')->get();
        $presences=0;
            foreach ($practice_lessons as $row)
            {
                if($row->status==$id and $row->driveStatus=="present")
                {
                    $startTime=$row->start_time;
                    $endTime=$row->end_time;
                    $time=(double)$endTime-(double)$startTime;
                    $presences+=$time;
                }
            }
            if($presences==30)
            {
                DB::delete('delete from users where id =? ',[$id]);
                Alert::success('Sukces', 'Użytkownik został usnięty'); 
            }
            else
            {
                Alert::error('Błąd', 'Nie można usunąć użytkownika, gdyż nie ukończył kursu.');
            }

        }
        return redirect()->route('allusers');
    }

}
