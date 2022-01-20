<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        if(\Auth::check()){
            $dane = DB::table('questions')->get();
            return view('iwouldliketoseefiles', ['dane_wyswietl' => $dane]);
        }
        else
            return view('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'Question' => 'required|string|min:3|max:1000',
            'A' => 'required|string|min:1|max:500',
            'B' => 'required|string|min:1|max:500',
            'C' => 'required|string|min:1|max:500',
            'correctAnswer'=> 'required|string|min:1|max:3',
            'file' => 'image|mimes:jpeg,bmp,png|max:2048' // Only allow .jpg, .bmp and .png file types.
        ]);


        // Save the file locally in the storage/public/ folder under a new folder named /questionfiles
        
        $request->file->store('questionfiles', 'public');

        $query = DB::table('questions')->insert([
        'categoryid' => $id,
        'question' => $request->input('Question'),
        'A' => $request->input('A'),
        'B' => $request->input('B'),
        'C' => $request->input('C'),
        'correctanswer' => $request->input('correctAnswer'),
        'file' => $request->file->hashName()
        ]);
    
        if($query)
        {
            return redirect()->route('theoreticaltests')->with('success',Alert::success('Sukces', 'Pytanie zostało dodane prawidłowo'));
        }
        else
        {
            return back()->with('fail',Alert::error('Błąd', 'Pytanie nie zostało dodane'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // KLIKNIECIE PRZYCISKU ROZWIĄŻ(podczas wyboru kategorii) URUCHAMIA TĄ METODĘ
    public function store(Request $request, $id)                // przekazuje ID kategorii pytania, losuje pierwsze pytanie z testu, 
                                                                // klikniecie przycisku DALEJ na pierwszym pytaniu odpala metodą finishtest();
    {
        Session::put("nextquestion", '1');                      // zmienna przechowywująca numer pytania wyświetlany koło pytania            
        Session::put("wronganswer", '0');                       // zmienna przechowywująca błędne odpowiedzi
        Session::put("correctanswer", '0');                     // zmienna przechowywująca poprawne odpowiedzi 
        Session::put("idtable", []);                           // tablica przechowywująca id pytań (w teorii, wychodzi, że nie działa prawidłowo)
        Session::put("answerstable", []);                         


        $qs=question::where(['categoryid' => $id])->inRandomOrder()->first();   // losowanie pytania
        $questioncategory=$qs->categoryid;                                      // zapisanie kategorii tego pytania
        Session::put("questioncategory", $questioncategory);                    // zapisanie tego do zmiennej sesyjnej questioncategory
            return view('test')->with(['questions' => $qs]);                    // wyświetlenie pytania (test.blade)
    }

    // KLIKNIĘCIE DALEJ NA PIERWSZYM I KAŻDYM KOLEJNYM PYTANIU URUCHAMIA TĄ METODĘ
    public function finishtest(Request $request, $id)       // przekazuja ID pytania
    {
        $nextquestion=Session::get('nextquestion');         // zczytanie wartości zmiennej sesyjnej do zmiennej $nextquestion
        $wronganswer=Session::get('wronganswer');           // zczytanie wartości zmiennej sesyjnej do zmiennej $wronganswer
        $correctanswer=Session::get('correctanswer');       // zczytanie wartości zmiennej sesyjnej do zmiennej $correctanswer
        $categoryid=Session::get('questioncategory');       // zczytanie wartości zmiennej sesyjnej do zmiennej $caterogyid
        
        $idtable=Session::get('idtable');                   // zczytanie wartości zmiennej sesyjnej do $idtable
        $answerstable=Session::get('answerstable');                   

        $validate=$request->validate([
            'answer'=> 'required',
            'trueanswer' => 'required'
        ]);

        $idtable[$nextquestion-1]=$id;                    // zapisanie do tablicy $idtable ID pytań, które się już wyświetlały
        // print_r($idtable);                             
        $nextquestion+=1;                                 // zwiększam numer pytania
        $answerstable[$nextquestion-1]=$request->answer;

        if($request->trueanswer==$request->answer){       // zliczenie poprawnych odpowiedzi, to na pewno działa prawidłowo, w każdym przypadku
            $correctanswer+=1;
        }
        else{
            $wronganswer+=1;
        }

        Session::put("nextquestion", $nextquestion);      // zapisanie do zmiennnych sesyjnych danych wartości, które zostały zmienione
        Session::put("wronganswer", $wronganswer);
        Session::put("correctanswer", $correctanswer);
        Session::put("idtable", $idtable);
        Session::put("answerstable", $answerstable);

        // $i=0;
        
        $i=true;                                                            // LOSOWANIE KOLEJNEGO PYTANIA, narazie na sztywno losuje 4 pytania
        if($nextquestion<=4){
            while($i==true){
                $licznik=0;
                $qs=question::where(['categoryid' => $categoryid])->inRandomOrder()->first();
                $idthisquestion=$qs->id;
                for($i=0; $i<=($nextquestion-2); $i++){
                    if($idtable[$i]!=$idthisquestion)
                        $licznik++;
                }
                if($licznik==($nextquestion-1)){        // sprawdzenie czy licznik jest równy liczbie pytań, jeśli tak znalazł pytanie
                                                        // o id, które jeszcze nie wystąpiło
                    $i=false;
                }  
            }
            return view('test')->with(['questions' => $qs]);
        }
        else {
            return view ('finishtest');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
