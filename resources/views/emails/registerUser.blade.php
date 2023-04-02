<p> Welcome to Wholesale Customer Portal </p>    
@if($admin == true)
<p> New User/Customer Registered on your system .</p>

<p> Name Of the User : {{$username}} </p>
<p> Email Of the User : {{$email}} </p>


@else
<p> Your account is successfully created.</p>

<p> Login Id : {{$email}} </p>
<p>Password: {{$password}} </p>

<p> {!! $messagetype !!} </p>
@endif
