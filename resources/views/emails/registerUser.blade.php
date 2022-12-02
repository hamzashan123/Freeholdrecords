<p> Welcome to Freehold Records LLC </p>    
@if($admin == true)
<p> New User has been registered .</p>

<p> Login Id : {{$email}} </p>

<p> Please Check the dashboard for further actions thanks. </p>
@else
<p> Your account is successfully created with Freeholdrecords .</p>

<p> Login Id : {{$email}} </p>
<p>Password: {{$password}} </p>

<p> {!! $messagetype !!} </p>
@endif
