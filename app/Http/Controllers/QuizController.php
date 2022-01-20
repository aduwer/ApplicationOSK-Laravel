<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
        if(\Auth::check()){
            
            return view('/theoreticaltests');
        }
        else
            return view('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idAmin = \Auth::user()->id;

        $request->validate([
            'categoryName' => 'required|string|min:3|max:100',
        ]);

        $query = DB::table('quizzes')->insert([
        'categoryname' => $request->input('categoryName'),
        ]);

        if($query)
        {
            return redirect()->route('theoreticaltests')->with('success',Alert::success('Sukces', 'Kategoria została dodana prawidłowo'));
        }
        else
        {
            return back()->with('fail',Alert::error('Błąd', 'Kategoria nie została dodana'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show()      // wyświetlenie formularza dodającego kategorię testu
    {
            if(\Auth::check()){
                
                return view('/newtheoreticalcategorytest');
            }
            else
                return view('/login');
    }

    public function showcategory (Request $request)
    {
        if(\Auth::check()){
           
            $dane = DB::table('quizzes')->get();
            return view('theoreticaltests', ['dane_wyswietl' => $dane,]);
        }
        else
            return view('/login');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
