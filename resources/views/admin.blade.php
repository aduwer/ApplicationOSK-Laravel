@extends('layouts.app')

@section('content')
<?php
use Illuminate\Support\Facades\DB;
$dane = DB::table('users')->get();
$practice_lesson = DB::table('practice_lessons')->get();
$instructors_quantity=0;
$users_quantity=0;
$lessons_quantity=0;
foreach($dane as $row)
{
if($row->privilege=="user")
$users_quantity++;
else if($row->privilege=="instructor")
$instructors_quantity++;
}
foreach($practice_lesson as $record)
{
    if($record->category=="B" AND $record->driveStatus=="present")
    $lessons_quantity++;
}
?>
        <section class="section service border-top">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<!-- <span class="h6 text-color">Our Services</span> -->
					<h2 class="mt-3 content-title ">Ośrodek szkolenia kierowców OSKDDG </h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-child" aria-hidden="true"></i>
					<h4 class="mb-3">Ilość instruktorów</h4>
					<p>Aktualna ilość instruktorów w ośrodku szkolenia wynosi:<strong> {{$instructors_quantity}}</strong></p>
				</div>
			</div>

            <div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-car" aria-hidden="true"></i>
					<h4 class="mb-3">Kategoria B</h4>
					<p>Ilość jazd praktycznych odbytych przez kursantów wynosi: <strong>{{$lessons_quantity}}</strong> </p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-child" aria-hidden="true"></i>
					<h4 class="mb-3">Ilość kursantów</h4>
					<p>Aktualna ilość kursantów w ośrodku szkolenia wynosi:<strong> {{$users_quantity}}</strong></p>
				</div>
			</div>
		
			
		</div>
	</div>
</section>
@endsection