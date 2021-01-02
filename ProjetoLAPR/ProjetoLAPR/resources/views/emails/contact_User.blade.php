@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        asset('logo.png')
    @endcomponent
@endslot

@component('mail::message')
# {{ucfirst($email->title)}}

{{ucfirst($email->body)}}

@component('mail::button', ['url'=> route('home')])
    Visit Allegro
@endcomponent()

Regards,<br>
{{ config('app.name') }}
@endcomponent()
