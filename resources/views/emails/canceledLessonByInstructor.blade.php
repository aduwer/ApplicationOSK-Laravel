@component('mail::message')
Ośrodek szkolenia kierowców OSKDDG.

Witaj <b>{{$details['firstName']}} {{$details['lastName']}}</b>.<br>
Musimy z przykrością stwierdzić iż jazdy w dniu <b>{{$details['date']}}</b> w godzinach <b>{{$details['start_time']}}-{{$details['end_time']}}</b> zostały odwołane.<br>

Dziękujemy,<br>
Zespół OSKDDG.
@endcomponent