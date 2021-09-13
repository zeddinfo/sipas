@component('mail::message')
# {{ $data['title'] }}
 
Saya sedang belajar mengirim email dengan Laravel.
 
@component('mail::button', ['url' => $data['url']])
Visit
@endcomponent
 
Terimakasih,<br>
{{ config('app.name') }}
@endcomponent