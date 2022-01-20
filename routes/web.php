<?php
use App\Models\User;
use App\Models\Zajecia_praktyczne;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Quiz;
use App\Models\Question;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// STRONA GŁÓWNA:

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/price', function () {
    return view('price');
});


Route::get('/actualusers', function () {
    return view('actualusers');
});

// -----------------------------------------------ADMIN:---------------------------------------------------------

Route::get('/admin',['middleware'=>'privilege.admin', function () {
    return view('admin');
}]);
Route::get('/allusers', 'App\Http\Controllers\AdminController@index')->name('allusers')->middleware('privilege.admin'); // Wyświetlenie strony wyświetlającej wszystkich zalogowanych użytkowników.
Route::post('/update_user/{id}', 'App\Http\Controllers\AdminController@update_user')->name('update_user')->middleware('privilege.admin');   // Zmiana danych użytkownika
Route::get('/delete_user/{id}','App\Http\Controllers\AdminController@delete_function')->name('delete_user')->middleware('privilege.admin'); //Usunięcie użytkownika
//Edytowanie danych użytkownika
Route::get('/dataeditor/{id}', function ($id) {
    $rekord=User::findOrFail($id);
    return view('dataeditor',['row'=>$rekord]);
})->name('edit.user')->middleware('privilege.admin');
//Wyświetlenie wszystkich użytkowników
Route::get('/showuser/{id}', function ($id) {
    $rekord=User::findOrFail($id);
    return view('showuser',['row'=>$rekord]);
})->name('show.user')->middleware('privilege.admin');

Route::get('/theoreticaltests', 'App\Http\Controllers\QuizController@showcategory')->name('theoreticaltests')->middleware('privilege.admin'); // Wyświetlenie strony testów teoretycznych
Route::get('/newtheoreticalcategory', 'App\Http\Controllers\QuizController@show')->name('newtheoreticalcategory')->middleware('privilege.admin'); 
Route::post('/addtheoreticalcategory', 'App\Http\Controllers\QuizController@create')->name('addtheoreticalcategory')->middleware('privilege.admin');   // Dodanie kategorii  // Wyświetlenie formularza dodającego kategorię testu teoretycznego
Route::get('/addquestion/{id}', function ($id) {                            // Wyświetlenie formularza umożliwiającego dodanie nowego pytania
    $rekord=Quiz::findOrFail($id);
    return view('addcategoryquestion',['row'=>$rekord]);
})->name('add.question')->middleware('privilege.admin');
Route::post('/theoreticaltests/{id}','App\Http\Controllers\QuestionController@create')->name('add.newquestion')->middleware('privilege.admin');   // Dodanie pytania do konkretnej kategorii

// -----------------------------------------------USER:---------------------------------------------------------


Route::get('/user',['middleware'=>'privilege.user', function () {
    return view('user');
}]);

Route::get('/data', 'App\Http\Controllers\UserController@index')->name('data')->middleware('auth');  // Wyświetlenie strony edycji hasła, po kliknięciu w zakładkę Moje konto 
Route::get('/welcome', function () {
    return view('welcome');
})->name('mainpage'); // Wyświetlenie strony głównej
Route::post('/changepassword', 'App\Http\Controllers\UserController@changepassword')->name('changepassword');   // Zmiana hasła przez użytkowników. 
Route::get('/actuallesson', 'App\Http\Controllers\UserController@showlesson')->name('actualLessons')->middleware('privilege.user');   // Wyswietlenie strony ze wszytkimi jazdami
Route::get('/updateStatus/{id}','App\Http\Controllers\UserController@update_status')->name('updateStatus')->middleware('privilege.user'); //Zmiana statusu jazd na zapisane
Route::get('/userlesson', 'App\Http\Controllers\UserController@showuserlesson')->name('userLessons')->middleware('privilege.user');   // Wyswietlenie strony ze wszytkimi zapisanymi jazdami usera
Route::get('/cancelLessons/{id}','App\Http\Controllers\UserController@cancel_lessons')->name('cancelLessons')->middleware('privilege.user'); //Odwołanie jazd
Route::post('/contact','App\Http\Controllers\UserController@send_email')->name('sendUserEmail');
Route::get('/choosecategory', 'App\Http\Controllers\UserController@choosecategory')->name('choosecategory')->middleware('privilege.user'); // Wyświetlenie strony testów teoretycznych
Route::get('/test/{id}', 'App\Http\Controllers\QuestionController@store')->name('dothetest')->middleware('privilege.user'); // Rozwiązanie testu z danej kategorii
Route::post('/test/{id}', 'App\Http\Controllers\QuestionController@finishtest')->name('finishtest')->middleware('privilege.user'); // Podsumowanie testu



// ------------------------------------------  INSTRUCTOR:------------------------------------------------------

Route::get('/instructor',['middleware'=>'privilege.instructor', function () {
    return view('instructor');
}]); 
Route::get('/newlesson', 'App\Http\Controllers\InstructorController@newlesson')->name('newlesson')->middleware('privilege.instructor');   // Wyswietlenie strony z dodaniem jazd
Route::get('/showlesson', 'App\Http\Controllers\InstructorController@showlesson')->name('showlesson')->middleware('privilege.instructor');   // Wyswietlenie strony ze wszytkimi jazdami
Route::post('/addlesson', 'App\Http\Controllers\InstructorController@create')->name('addlesson')->middleware('privilege.instructor');   // Dodanie jazd praktycznych
Route::get('/delete_lesson/{id}','App\Http\Controllers\InstructorController@delete_function')->name('delete_lesson')->middleware('privilege.instructor'); //Usunięcie zajęć
// Edytowanie informacji o jazdach
Route::get('/lessoneditor/{id}', function ($id) {
    $rekord=Zajecia_praktyczne::findOrFail($id);
    return view('lessoneditor',['row'=>$rekord]);
})->name('edit.lesson')->middleware('privilege.instructor');
Route::post('/update_lesson/{id}', 'App\Http\Controllers\InstructorController@update_lesson')->name('update.lesson')->middleware('privilege.instructor');   // Zmiana danych lekcji
Route::get('/bookedlesson', 'App\Http\Controllers\InstructorController@booked_lessons')->name('bookedlesson')->middleware('privilege.instructor');   // Wyświetlenie zarezerwowanych terminów
Route::get('/cancelLesson/{id}','App\Http\Controllers\InstructorController@cancel_lesson')->name('instructorcancelLesson')->middleware('privilege.instructor'); //Odwołanie jazd
Route::get('/confirmLesson/{id}','App\Http\Controllers\InstructorController@confirm_lesson')->name('confirmLesson')->middleware('privilege.instructor'); //Odwołanie jazd
Auth::routes();
