@extends('layouts.app')

@section('content')
<?php
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
$fullDate = Carbon::now()->addHours(1);
//Get date
$date=$fullDate->toDateString();
$users= DB::table('users')->get();
$practice_lessons = DB::table('practice_lessons')->get();
$lessons_quantity=0;
$present_lessons=0;
$todays_lessons=0;
?>
@foreach($practice_lessons as $row)
    @if($row->instructor_id==Auth::user()->id)
            <?php
                $lessons_quantity++
            ?>
            @if($row->driveStatus=="present")
                <?php
                $present_lessons++
                ?>
            @endif 
            @if($row->data==$date and $row->status!="free")
            <?php
                $todays_lessons++
            ?>
            @endif
    @endif
@endforeach
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
					<i class="fa fa-car" aria-hidden="true"></i>
					<h4 class="mb-3">Ilość dodanych jazd</h4>
					<p>Aktualna ilość dodanych jazd w ośrodku szkolenia wynosi: <strong>{{$lessons_quantity}}</strong></p>
				</div>
			</div>

            <div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-check" aria-hidden="true"></i>
					<h4 class="mb-3">Ilość odbytych jazd</h4>
					<p>Ilość jazd praktycznych odbytych przez kursantów wynosi: <strong>{{$present_lessons}}</strong> </p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-child" aria-hidden="true"></i>
					<h4 class="mb-3">Ilość rezerwacji jazd</h4>
					<p>Aktualna ilość zarezerwowanych jazd w dniu dziejszym: <strong>{{$todays_lessons}}</strong></p>
				</div>
			</div>
		
			
		</div>
	</div>
</section>
@endsection