@if($admin == true)
<h1>Hello Admin,Welcome Back</h1>
<p>{!!$messagetype!!}</p>

<p>Client Details :</p>
<p>Username : {!!$username!!}</p>
<p>Email : {!!$email!!}</p>

@elseif($admin == false )
<h4>Dear  {!! ucfirst($surname) !!},</h4>
<p>{!!$messagetype!!}</p>

@endif 


Thanks,<br>
{{ config('app.name') }}