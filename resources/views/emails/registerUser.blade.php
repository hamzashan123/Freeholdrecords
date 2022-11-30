@if($admin == false && $usertype == 'user')
    Dear {{ucfirst($username)}}, 

    <p>{!!$messagetype!!}</p>


    Your login details are:

    <p>Username : {{$username}}</p>
    <p>Email  : {{$email}}</p>



    Thanks,<br>
    {{ config('app.name') }}

@elseif($admin == false && $usertype == 'consultant')
    Dear {{ucfirst($username)}}, 

    <p>{!!$messagetype!!}</p>


    Your login details are:

    <p>Username : {{$username}}</p>
    <p>Email  : {{$email}}</p>



    Thanks,<br>
    {{ config('app.name') }}
@elseif($admin == true)

    Dear Admin, 

    <p>{!!$messagetype!!}</p>


    User details:

    <p>Username : {{$username}}</p>
    <p>Email  : {{$email}}</p>


    Thanks,<br>
    {{ config('app.name') }}    
@endif