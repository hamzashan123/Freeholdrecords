
@if($admin == false)
<h1>Hello {!! ucfirst($user->first_name) !!},</h1>

<p>{!!$msg!!}</p>

<p>Order Details :</p>

<p>Your OrderId : {!!$orderid!!}</p>
<table border = "1" cellpadding="10">
         <thead>
            <!-- <th>ID</th> -->
            <th>Sku</th>
            <th>Item</th>
            <th>Code</th>
            <th>Purchased Quantity</th>
            <!-- <th>Total Price</th> -->
            <th>Total Price </th>
         </thead>
         <tbody>

            @foreach($purchasedProducts as $key => $product)
                @php 
                    $productPrice = number_format( $product['orderproducts']['price'] - (Auth::user()->discount / 100) * $product['orderproducts']['price'] , 2 );
                @endphp
            <tr>
                
                <td>{{  $product['orderproducts']['sku'] }}</td>
                <td>{{  $product['orderproducts']['name'] }}</td>
                <td>{{  $product['orderproducts']['code'] }}</td>
                <td>{{  $product['quantity'] }}</td>
             
                <td> £{{ $productPrice * $product['quantity'] }}</td>
            </tr>
            @endforeach


         </tbody>
         
</table>
    
      <h4> Delivery Required: {!!$delivery_notes!!} </h4> 
      <h4> Order Notes: {!!$order_notes!!}</h4>  
      <h3>Grand Total : {!!$amount!!}</h3>
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
<table border = "1" cellpadding="10">
<thead>
            <!-- <th>ID</th> -->
            <th>Sku</th>
            <th>Item</th>
            <th>Code</th>
            <th>Purchased Quantity</th>
            <!-- <th>Total Price</th> -->
            <th>Total Price </th>
         </thead>
         <tbody>

            @foreach($purchasedProducts as $key => $product)
                @php 
                    $productPrice = number_format( $product['orderproducts']['price'] - (Auth::user()->discount / 100) * $product['orderproducts']['price'] , 2 );
                @endphp
            <tr>
               
                <td>{{  $product['orderproducts']['sku'] }}</td>
                <td>{{  $product['orderproducts']['name'] }}</td>
                <td>{{  $product['orderproducts']['code'] }}</td>
                <td>{{  $product['quantity'] }}</td>
               
                <td> £{{ $productPrice * $product['quantity'] }}</td>
            </tr>
            @endforeach


         </tbody>
         
      </table>

      <h4> Delivery Required: {!!$delivery_notes!!} </h4> 
      <h4> Order Notes: {!!$order_notes!!}</h4>  
      <h2>Grand Total : {!!$amount!!}</h2>
<!-- {!! $orderHtml !!} -->



Thank you <br>
Vagabond Sales Department

@endif