
@if($admin == false)
<h1>Hello {!! ucfirst($user->username) !!}</h1>

<p>{!!$msg!!}</p>

<p>Order Details :</p>
{!! $orderHtml !!}
<p>Your OrderId : {!!$orderid!!}</p>
<p>Order Total : {!!$amount!!}</p>


Thanks,<br>
{{ config('app.name') }}

@elseif($admin == true)
<h1>Dear Admin, Welcome Back</h1>

<p>{!!$msg!!}</p>

<p>Order Details :</p>
<p>Order ID : {!!$orderid!!}</p>
<p>Username : {!!$user->username!!}</p>
<p>Email : {!!$user->email!!}</p>
<p>Order Total : {!!$amount!!}</p>


Thanks,<br>
{{ config('app.name') }}
@endif