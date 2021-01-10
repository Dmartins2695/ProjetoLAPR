@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        asset('logo.png')
    @endcomponent
@endslot

@component('mail::message')
# {{'receipt of purchase in Allegro store.'}}

We apreciate for purchase.<br>
If something is wrong with the package this is the code to confirm the payment: <bold>{{$email->token}}</bold>,<br>
And this is the Identifier of your Order: {{$order->id}}.<br>
This code will be asked get the details of the purchase.<br>

Information of the purchase:<br>
Name: {{ucfirst($payment->name)}},<br>
Email: {{ucfirst($payment->email)}},<br>
Total: {{ucfirst($payment->amount)}}€,<br>
Adress: {{ucfirst($payment->adress)}},<br>
Zip-code: {{ucfirst($payment->zip)}}.<br>

@component('mail::button', ['url'=> route('home')])
    Go back to Site
@endcomponent()

Regards,<br>
{{ config('app.name') }}
@endcomponent()
