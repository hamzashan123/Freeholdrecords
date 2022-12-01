@if($admin == false && $usertype == 'user')
    Dear {{ucfirst($username)}}, 

    <p>{!!$messagetype!!}</p>


    Your login details are:

    <p>Username : {{$username}}</p>
    <p>Password : {{$password}}</p>
    <p>Email  : {{$email}}</p>



    Thanks,<br>
    {{ config('app.name') }}
   
@endif