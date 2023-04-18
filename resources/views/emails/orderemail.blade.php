
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
                    $productPrice = number_format( $product->price - (Auth::user()->discount / 100) * $product->price , 2 );
                @endphp
            <tr>
                <!-- <td>{{  $product->id }}</td> -->
                <td>{{  $product->sku }}</td>
                <td>{{  $product->name }}</td>
                <td>{{  $product->code }}</td>
                <td>{{  $productquantities[$key] }}</td>
                <!-- <td> £{{ number_format( $product->price - (Auth::user()->discount / 100) * $product->price , 2 ) }}</td> -->
                <td> £{{ $productPrice * $productquantities[$key] }}</td>
            </tr>
            @endforeach


         </tbody>
         
      </table>

      <h5>Grand Total : {!!$amount!!}</h5>
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
                    $productPrice = number_format( $product->price - (Auth::user()->discount / 100) * $product->price , 2 );
                @endphp
            <tr>
                <!-- <td>{{  $product->id }}</td> -->
                <td>{{  $product->sku }}</td>
                <td>{{  $product->name }}</td>
                <td>{{  $product->code }}</td>
                <td>{{  $productquantities[$key] }}</td>
                <!-- <td> £{{ number_format( $product->price - (Auth::user()->discount / 100) * $product->price , 2 ) }}</td> -->
                <td> £{{ $productPrice * $productquantities[$key] }}</td>
            </tr>
            @endforeach


         </tbody>
         
      </table>

      <h5>Grand Total : {!!$amount!!}</h5>
<!-- {!! $orderHtml !!} -->



Thanks,<br>
{{ config('app.name') }}
@endif