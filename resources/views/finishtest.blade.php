@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/progressbar.css')}}" />
<?php
use App\Models\Question;
?>

@section('content')
<link rel="stylesheet" href="{{asset('css/testcss.css')}}">
<div class="container">
		<div class="row justify-content-center">
        <div class="col-lg-7 text-center">
				<div class="section-title">
					<!-- <span class="h6 text-color">Our Services</span> -->
					<h2 class="mt-3 content-title ">Wyniki egzaminu: </h2>
				</div>
		</div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-check" aria-hidden="true"></i>
					<h4 class="mb-3">Poprawne odpowiedzi:</h4>
					<p> {{Session::get('correctanswer')}} </p>
				</div>
		</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<i class="fa fa-times" aria-hidden="true"></i>
					<h4 class="mb-3">Błędne odpowiedzi:</h4>
					<p>{{Session::get('wronganswer')}}</strong></p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 mb-5">
				<div class="service-item mb-5">
					<i class="fa fa-line-chart" aria-hidden="true"></i>
					<h4 class="mb-3">Wynik egzaminu</h4>
                    <p>{{Session::get('correctanswer')}}/{{Session::get('correctanswer')+Session::get('wronganswer')}}</strong></p>
					
                    <div class="pojemnik">
						<div class="circular-progress">
							<div class="value-container">
								0%
							</div>
						</div>
					</div>
				</div>
				<br>
	<br>
	<br>
	<br>
			</div>
	
 
	<?php
	
				$idquestion=Session::get('idtable');
				$answers=Session::get('answerstable');
				$firstMeter=0;
				foreach($idquestion as $index=>$id){			//$id to IDpytań
					$secondMeter=0;
					foreach($answers as $indexAnswer=>$answer){
						$row=question::where(['id' => $id])->first();
						$filepath=$row->file;
						$correctAnswer=$row->correctanswer;
					if($firstMeter==$secondMeter){
						?>
						<div class="container mt-sm-5 my-1">
						<div class="questionclass ml-sm-5 pl-sm-5 pt-2">
							<img src="{{ asset('storage/questionfiles/'.$filepath) }}" class="img-thumbnail" alt="">
						<?php
							if($correctAnswer==$answer){
							?>
								<div class="py-2 h5"  style="color: green"><b> {{ $row->question}}</b></div>
							<?php
							}

							else{
							?>
								<div class="py-2 h6"><b> Twoja błędna odpowiedź to: <strong> {{ $answer }} </strong> </b></div>
								<div class="py-2 h4"  style="color: red"><b> {{ $row->question}}</b></div>
							<?php
							}
						?>
						
						<div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="optionsclass"> 
						
						


						<?php

						if($correctAnswer=='A'){
						?>
							<label class="optionsclasses">{{ $row->A}} <input checked value="A" disabled="disabled" type="checkbox" name="answer"> <span class="checkmark"></span> </label>
						<?php
						}
						else{
						?>
							<label class="optionsclass">{{ $row->A}} <input value="A" checked disabled="disabled" type="checkbox" name="answer"> <span class="checkmark"></span> </label>
						<?php
						}
						
						if($correctAnswer=='B'){
						?>
								<label class="optionsclasses">{{ $row->B}} <input checked value="B" disabled="disabled" type="checkbox" name="answer"> <span class="checkmark"></span> </label>
							<?php
						}
						else{
						?>
								<label class="optionsclass">{{ $row->B}} <input value="B" checked disabled="disabled" type="checkbox" name="answer"> <span class="checkmark"></span> </label>
						<?php
						}

						if($correctAnswer=='C'){
						?>
							<label class="optionsclasses">{{ $row->C}} <input checked value="C" disabled="disabled" type="checkbox" name="answer"> <span class="checkmark"></span> </label>
						<?php
						}
						else{
						?>
							<label class="optionsclass">{{ $row->C}} <input value="C" checked disabled="disabled" type="checkbox" name="answer"> <span class="checkmark"></span> </label>
						<?php
						}


						?>

						
							
						</div>
						</div>
						</div>
						
						<?php
					}
						
					?>
						
					<?php
					$secondMeter++;
					}
				$firstMeter++;
				}
				?>
</div>

<!-- <script src="js/progressbar.js"></script> -->
<script src="https://use.fontawesome.com/a11d10b9af.js"></script>
	<script>
	let progressBar = document.querySelector(".circular-progress");
	let valueContainer = document.querySelector(".value-container");


	let progressValue = 0;
	let progressEndValue = Math.floor((parseInt({{Session::get('correctanswer')}})/{{Session::get('correctanswer')+Session::get('wronganswer')}}*100));
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

@endsection