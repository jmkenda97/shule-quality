@component('mail::message')
Hello{{$user->name}},

<p>we understand what happen</p>

@component('mail::button',['url'=>url('admin/reset/' . $user->remember_token)])
Reset your password
@endcomponent

<p>In case you have any issue recoverng your password contact us</p>

thanks,<br>
{{config('app.name')}}
@endcomponent