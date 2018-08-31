<h1>{{ $event->name }}</h1>

<p>Being {{ $event->lead_start_date }}, the lead duration for {{ $event->name }} has officially began and it ends on
    {{$event->lead_end_date}}.

    To make this event a success, start prepping now.</p>

<p>The actual event date is {{ $event->start_date }}.</p>

<p>Kindly reply to acknowledge receipt of this email.</p>

<p>Happy prepping!</p>