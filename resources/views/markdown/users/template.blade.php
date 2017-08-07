@component('mail::message')

Welcome *** {{$user->name}}***
**You are receiving ** *this email* using markdown.

@component('mail::button', ['url' => 'http://summer.co'])
Summer.co
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
