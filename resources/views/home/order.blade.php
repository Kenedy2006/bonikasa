<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    @include('home.css')
    <style type="text/css">
        .div_center
        {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
        table
        {
            width: 100%;
            border-collapse: collapse;
        }
        th
        {
            background-color: #DB6574;
            color: white;
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <div>
            <table>

                <tr>
                    <th>Nombre del Producto</th>
                    <th>Price</th>
                    <th>Estado del pedido</th>
                    <th>Image</th>
                </tr>

                @foreach($order as $order)

                <tr>
                    <td>{{$order->product->title}}</td>
                    <td>{{$order->product->price}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <img width="150" src="{{url('products')}}/{{$order->product->image}}">
                    </td>
                </tr>

                @endforeach

            </table>
        </div>
    </div>

    @include('home.footer')

</body>
</html>