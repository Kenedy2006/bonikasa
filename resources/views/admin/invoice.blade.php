<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <center>
        
    <h3>Nombre del cliente : {{$data->name}}</h3>
    <h3>Dirección del cliente : {{$data->rec_address}}</h3>
    <h3>Teléfono : {{$data->phone}}</h3>
    <h2>Título del producto : {{$data->product->title}}</h2>
    <h2>Price : {{$data->product->price}}</h2>
    <img width="150" src="products/{{$data->product->image}}">
    </center>
</body>
</html>