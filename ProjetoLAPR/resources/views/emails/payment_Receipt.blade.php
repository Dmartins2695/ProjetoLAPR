@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        asset('logo.png')
    @endcomponent
@endslot

@component('mail::message')
# {{'receipt of purchase in Allegro store.'}}

We apreciate for purchase.<br>
If something is wrong with the package this is the code of your purchase: <bold>{{$email->token}}</bold>.<br>
This code will be asked get the details of the purchase.<br>

Information of the purchase:<br>
Name: {{ucfirst($email->name)}},<br>
Email: {{ucfirst($email->email)}},<br>
Total: {{ucfirst($email->amount)}}€,<br>
Adress: {{ucfirst($email->adress)}},<br>
Zip-code: {{ucfirst($email->zip)}}.<br>

@component('mail::button', ['url'=> route('home')])
    Go back to Site
@endcomponent()

Regards,<br>
{{ config('app.name') }}
@endcomponent()
