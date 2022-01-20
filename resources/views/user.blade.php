@extends('layouts.app')
<link rel="stylesheet" href="css/progressbar.css" />

@section('content')
<?php
use Illuminate\Support\Facades\DB;
$practice_lessons = DB::table('practice_lessons')->get();
$presence=0;
$absence=30;
?>
@foreach ($practice_lessons as $row)
    @if($row->status==Auth::user()->id and $row->driveStatus=="present")
    <?php
	$startTime=$row->start_time;
	$endTime=$row->end_time;
	$time=(double)$endTime-(double)$startTime;
    $presence+=$time;
    ?>
    @endif
@endforeach
<?php
$absence=$absence-$presence;
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
					<i class="fa fa-check" aria-hidden="true"></i>
					<h4 class="mb-3">Ilość odbytych jazd</h4>
					<p>Ilość jazd praktycznych, które zostały odbyte wynosi: <strong>{{$presence}}</strong> </p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-times" aria-hidden="true"></i>
					<h4 class="mb-3">Ilość pozostałych jazd</h4>
					<p>Aktualna ilość pozostałych jazd do ukończenia kursu: <strong>{{$absence}}</strong></p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
				<div class="service-item mb-5">
					<i class="fa fa-line-chart" aria-hidden="true"></i>
					<h4 class="mb-3">Postęp jazd:</h4>
					<div class="pojemnik">
						<div class="circular-progress">
							<div class="value-container" data-presence="{{$presence}}">
								0%
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- <script src="js/progressbar.js"></script> -->
	<script src="https://use.fontawesome.com/a11d10b9af.js"></script>
	<script>
	let progressBar = document.querySelector(".circular-progress");
	let valueContainer = document.querySelector(".value-container");


	let progressValue = 0;
	let progressEndValue = Math.floor((parseInt({{$presence}})/30*100));
	let speed = 50;

	let progress = setInterval(() => {
		if (progressValue == progressEndValue) {
			clearInterval(progress);
		} else {
			progressValue++;
			valueContainer.textContent = `${progressValue}%`;
			
		}
		progressBar.style.background = `conic-gradient( #f75757 ${progressValue * 3.6}deg, #cadcff ${progressValue * 3.6}deg)`;

	}, speed);
	</script>
</section>



@endsection