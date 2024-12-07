<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style type="text/css">
        .div_deg
        {
          display: flex;
          justify-content: center;
          align-items: center;  
          margin: 60px;
        }
        
        table
        {
            border: 2px  solid black;
            text-align: center;
            width: 800px;

        }

        th
        {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;

        }

        td
        {
            border: 1px solid skyblue;
        }

        .cart_value
        {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .order_deg
        {
            padding-right: 100px;
            margin-top: -50px;
        }

        label
        {
            display: inline-block;
            width: 150px;

        }

        .div_gap
        {
            padding: 20px;
        }

    </style>
  
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>


<div class="div_deg">

    <div class="order_deg">

        <form action="{{url('comfirm_order')}}" method="Post">

        @csrf    

        <div class="div_gap"> 
            <label>Receiver Name</label>
            <input type="text" name="name" value="{{Auth::user()->name}}">
        </div>

        <div class="div_gap"> 
            <label>Receiver Address</label>
            <textarea name="address">{{Auth::user()->address}}</textarea>
        </div>

        <div class="div_gap"> 
            <label>Receiver Phone</label>
            <input type="text" name="phone" value="{{Auth::user()->phone}}">
        </div>

        <div class="div_gap"> 
            
            <input class="btn btn-primary" type="submit" value="Place Order">
        </div>
        </form>
    
    </div>
    
    <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Eliminar</th> <!-- Agregar columna para el botón de eliminar -->
        </tr>

        <?php

        $value=0;

        ?>

        @foreach ($cart as $cart)

        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
                <img width="150" src="/products/{{$cart->product->image}}">
            </td>
            <td>
                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>

        <?php

        $value = $value + $cart->product->price;

        ?>

        @endforeach

    
    </table>
</div>


    <div class="cart_value">
        <h3>Total : S/.{{$value}}</h3>
    </div>


   

  <!-- info section -->

  @include('home.footer')

</body>

</html>