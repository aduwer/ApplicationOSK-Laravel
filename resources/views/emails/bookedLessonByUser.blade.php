@component('mail::message')
Ośrodek szkolenia kierowców OSKDDG.

Witaj <b>{{$details['firstName']}} {{$details['lastName']}}</b>.<br>
Nowa rezerwacja jazd w dniu <b>{{$details['date']}}</b> w godzinach <b>{{$details['start_time']}}-{{$details['end_time']}}</b>.<br>
Wszystkie szczczegóły na temat rezerwacji sprawdzisz w aplikacji w zakładce zarezerwowane terminy.<br>

Dziękujemy,<br>
Zespół OSKDDG.
@endcomponent