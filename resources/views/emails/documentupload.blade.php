
@if($admin == true)
<h1>Hello {!! ucfirst($user->username) !!}</h1>

<p>{!!$msg!!}</p>

<p>Order Details :</p>
<p>TITLE ID : {!!$titleid!!}</p>
<p>Document Link :<a href="{{asset('/storage/titlefiles/'.$orderid.'/'.$link)}}"> click here</a> </p>

Thanks,<br>
{{ config('app.name') }}
@endif