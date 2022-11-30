@php 
    $missing = 'Field is missing';
    $incorrect = 'Incorrect field value';
@endphp


<h3 style="font-size: 20px;
    font-weight: normal;">Dear {{ucfirst($username)}}, </h3>
<p>We have received the information and document provided on the info/docs system. 

Please see below the comments of your consultant. 

Please make sure to copy and paste and answer under each question in order to allow your consultant to finalize your application. </p>    
<p>Form name : {{$formname}}</p>

@if(!empty($fieldsname))

    @foreach( $fieldsname as $index => $data  )
        
        <p><strong style="font-size: 17px; text-decoration: underline;"> Question :  {{$data}} </strong>:  @if(empty($fieldsvalue[$index])) <p style="font-size: 17px;"> Applicant’s Answer:  "N/A" </p> @else  <p style="font-size: 17px;">Applicant’s Answer:  {{$fieldsvalue[$index]}}  </p> @endif  </p>
        @if(empty($fieldsvalue[$index]))
        <p>Comment of the consultant : {{$fieldscomments[$index]}}</p>
        @else
            <p>Comment of the consultant: {{$fieldscomments[$index]}}</p>
        @endif
    @endforeach
    
@endif


<h4 style="font-size: 20px;
    font-weight: normal;">Once the form updated please send us an updated email.</h4>
<h3 style="font-size: 20px;
    font-weight: normal;">Thanks </h3>