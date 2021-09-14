@component('mail::message')
# {{ $data['title'] }}
 
Dear {{$data['name']}}

Ada <b>{{$data['mail_type']}}</b> yang harus di <b>{{$data['type']}}</b>. 
Silahkan login ke aplikasi untuk melihat detail.

Best Rigards.

Divisi Informasi.
 
@component('mail::button', ['url' => $data['url']])
Visit
@endcomponent
 
Terimakasih,<br>
{{ config('app.name') }}
@endcomponent