
@if($admin == false)
<h1>Hello {!! ucfirst($user->username) !!}</h1>

<p>{!!$msg!!}</p>

<p>Order Details :</p>

<p>Your OrderId : {!!$orderid!!}</p>
<table border = "1">
         <thead>
            <th>ID</th>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
         </thead>
         <tbody>
         <tr>
            <td>1</td>
            <td>Laptop</td>
            <td>200</td>
            <td>2</td>
         </tr>
         
         <tr>
            <td>2</td>
            <td>Juice</td>
            <td>200</td>
            <td>2</td>
         </tr>
         <tr>
            <td>3</td>
            <td>Mobile</td>
            <td>650</td>
            <td>2</td>
         </tr>
         </tbody>
         
      </table>
<!-- {!! $orderHtml !!} -->




Thanks,<br>
{{ config('app.name') }}

@elseif($admin == true)
<h1>Dear Admin, Welcome Back</h1>

<p>{!!$msg!!}</p>



<p>Order Details :</p>
<p>Username : {!!$user->username!!}</p>
<p>Email : {!!$user->email!!}</p>

<p>Order ID : {!!$orderid!!}</p>
<table border = "1">
         <thead>
            <th>ID</th>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
         </thead>
         <tbody>
         <tr>
            <td>1</td>
            <td>Laptop</td>
            <td>200</td>
            <td>2</td>
         </tr>
         
         <tr>
            <td>2</td>
            <td>Juice</td>
            <td>200</td>
            <td>2</td>
         </tr>
         <tr>
            <td>3</td>
            <td>Mobile</td>
            <td>650</td>
            <td>2</td>
         </tr>
         </tbody>
         
      </table>
<!-- {!! $orderHtml !!} -->



Thanks,<br>
{{ config('app.name') }}
@endif