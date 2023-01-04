
@if($admin == false)
<h1>Hello {!! ucfirst($user->username) !!}, Welcome Back</h1>

<p>{!!$msg!!}</p>

<p>Order Details :</p>
<p>TITLE ID : {!!$titleid!!}</p>

Thanks,<br>
{{ config('app.name') }}

@elseif($admin == true)
<h1>Dear Admin, Welcome Back</h1>

<p>{!!$msg!!}</p>

<p>Order Details :</p>
<p>TITLE ID : {!!$titleid!!}</p>
<p>Username : {!!$user->username!!}</p>
<p>Email : {!!$user->email!!}</p>

Thanks,<br>
{{ config('app.name') }}
@endif