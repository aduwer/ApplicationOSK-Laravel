@component('mail::message')
Ośrodek szkolenia kierowców OSKDDG.

Witaj <b>{{$details['firstName']}} {{$details['lastName']}}</b>.<br>
Dziękujemy za wybranie naszego ośrodka. Dołożymy wszelkich starań, aby przygotować Cię do egzaminu jak najlepiej.<br>
Poniżej przesyłamy twój <b>login</b> oraz <b>hasło</b> do konta.<br>
<b>Login</b>: {{$details['login']}}<br>
<b>Hasło</b>: {{$details['password']}}<br>


Dziękujemy,<br>
Zespół OSKDDG.
@endcomponent
