<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boleta de Compra - BONIKASA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #DB6574;
            padding-bottom: 10px;
        }

        .header img {
            width: 120px;
        }

        .header h1 {
            color: #DB6574;
            font-size: 28px;
        }

        .content {
            margin-top: 20px;
        }

        .content h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .content h2 {
            margin: 15px 0;
            color: #DB6574;
            font-size: 22px;
        }

        .product-image {
            text-align: center;
            margin-top: 20px;
        }

        .product-image img {
            max-width: 200px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #DB6574;
        }

        .footer p {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <img src="/images/bonikasa-logo.png" alt="BONIKASA Logo">
            <h1>Boleta de Compra</h1>
        </div>

        <div class="content">
            <h3><strong>Nombre del cliente:</strong> {{$data->name}}</h3>
            <h3><strong>Dirección del cliente:</strong> {{$data->rec_address}}</h3>
            <h3><strong>Teléfono:</strong> {{$data->phone}}</h3>

            <h2><strong>Título del producto:</strong> {{$data->product->title}}</h2>
            <h2><strong>Precio:</strong> S/.{{$data->product->price}}</h2>
        </div>

        <div class="product-image">
            <img src="products/{{$data->product->image}}" alt="Producto">
        </div>

        <div class="footer">
            <p>Gracias por su compra. Si tiene alguna consulta, no dude en contactarnos.</p>
            <p><strong>BONIKASA</strong> - Tu tienda de confianza</p>
        </div>
    </div>
</body>
</html>
