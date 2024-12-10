<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Ordenes</title>

    @include('home.css')
    <style type="text/css">
        .div_center {
            margin: auto;
            width: 80%;
            padding: 20px;
        }

        table {
            width: 100%;
            border-spacing: 0;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f9f9f9;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #e1e1e1;
        }

        th {
            background-color: #DB6574;
            color: white;
            font-weight: normal;
            font-size: 19px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #fcf0f1;
        }

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e1e1e1;
        }

        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
        }

        h2 {
            color: #000000;
            margin-top: 2px;
            margin-bottom: 20px;
        }

        .product-name {
            text-align: left;
            font-weight: normal;
            color: #333;
        }

        .product-price {
            color: #DB6574;
            font-size: 18px;
        }

        .product-description {
            color: #777;
            font-size: 14px;
        }

        .status {
            font-weight: normal;
            color: #4caf50; /* Cambiar a otro color si es necesario */
        }

        .btn-primary {
            background-color: #DB6574;
            border: none;
            color: #FFFFFF;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            margin-right: 10px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #B04456;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')

        <div class="table-container">
            <h2>Mis Pedidos</h2>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Estado del Pedido</th>
                </tr>

                @if($order->isEmpty())
                <tr>
                    <td colspan="4">No has realizado ninguna compra</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <a href="{{url('shop')}}" class="btn-primary">Comprar ya!</a>
                    </td>
                </tr>
                @else
                @foreach($order as $order)
                <tr>
                    <td>
                        <img src="{{url('products')}}/{{$order->product->image}}">
                    </td>
                    <td class="product-name">{{$order->product->title}}</td>
                    <td class="product-price">S/ {{$order->product->price}}</td>
                    <td class="status">{{$order->status}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>

    @include('home.footer')
</body>
</html>
