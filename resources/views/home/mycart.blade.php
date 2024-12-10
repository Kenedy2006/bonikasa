<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
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

        .cart_value {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 70px;
            padding: 18px;
            background-color: transparent; /* Quitado el fondo */
            color: #2D2D2D; /* Cambiado el color del texto */
            font-weight: bold;
            font-size: 20px;
        }

        .cart_value i {
            margin-right: 10px;
            font-size: 24px;
            color: #2D2D2D; /* Color del icono */
        }

        .order_deg {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: -50px;
        }

        .order_container {
            margin-top: 50px;
            margin-bottom: 150px; /* Añadido para separar del pie de página */
            padding: 20px;
            border: 2px solid #2D2D2D;
            border-radius: 8px;
            background-color: #FFFFFF;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 600px;
        }

        label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
            color: #333333;
            vertical-align: top; /* Añadido para alinear con text areas */
        }

        input, textarea {
            border: 2px solid #2D2D2D;
            border-radius: 8px;
            padding: 8px;
            width: 300px;
            background-color: #FFFFFF;
            color: #333333;
            display: inline-block; /* Añadido para alinear con labels */
        }

        textarea {
            height: 80px;
        }

        .div_gap {
            padding: 20px;
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

        .btn-success {
            background-color: #E0E0E0;
            border: none;
            color: #333333;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #CCCCCC;
        }

        button {
            background-color: #DB6574;
            border: none;
            color: #FFFFFF;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #B04456;
        }

        h2 {
            text-align: left; /* Alinear el título a la izquierda */

        }

    </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
  </div>

  <div style="margin: 60px;">
    <h2>Mi Carrito</h2> <!-- Aplicar el estilo directamente al elemento h2 -->
  </div>

<div class="div_deg">
    <table>
        <tr>
            <th>Título Del Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Eliminar</th>
        </tr>

        <?php $value = 0; ?>

        @if($cart->count() == 0)
        <tr>
            <td colspan="4">Aún no se ha agregado ningún producto al carrito</td>
        </tr>
        <tr>
            <td colspan="4">
                <a href="{{url('shop')}}" class="btn-primary">Comprar ya!</a>
            </td>
        </tr>
        @else
            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>S/.{{$cart->product->price}}</td>
                <td>
                    <img src="/products/{{$cart->product->image}}">
                </td>
                <td>
                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php $value += $cart->product->price; ?>
            @endforeach
        @endif
    </table>
</div>

@if($cart->count() > 0)
<div class="cart_value">
    <i class="fas fa-coins"></i> <!-- Icono de moneda -->
    <h3>Total: S/.{{$value}}</h3>
</div>

<div class="order_deg">
    <div class="order_container">
        <form action="{{url('comfirm_order')}}" method="POST">
            @csrf    
            <div class="div_gap"> 
                <label>Nombre Del Receptor</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="div_gap"> 
                <label>Dirección Del Receptor</label>
                <textarea name="address">{{Auth::user()->address}}</textarea>
            </div>
            <div class="div_gap"> 
                <label>Teléfono Del receptor</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>
            <div class="div_gap"> 
                <input class="btn-primary" type="submit" value="Pago Contra Entrega">
                <a class="btn-success" href="{{url('stripe', $value)}}">Pago con tarjeta</a>
            </div>
        </form>
    </div>
</div>
@endif

<!-- info section -->
@include('home.footer')

</body>

</html>
