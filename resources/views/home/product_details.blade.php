<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .detail-box {
            background-color: #F8F9FA; /* Fondo claro para resaltar los detalles */
            border: 1px solid #2D2D2D; /* Bordes con el color principal */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }

        .detail-box h6 {
            font-size: 18px;
            color: #2D2D2D; /* Títulos en el color principal */

        }

        .detail-box span {
            font-size: 16px;
            color: #343A40; /* Texto oscuro */
            font-weight: normal;
        }

        .detail-box p {
            font-size: 15px;
            color: #6C757D; /* Texto de descripción en tono gris */
            line-height: 1.6; /* Mejor separación entre líneas */
        }

        .img-box img {
            border: 2px solid #DB6574; /* Borde de la imagen con el color principal */
            border-radius: 10px;
            max-width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }

        .btn-back {
            background-color: #DB6574; /* Botón de regresar en el color principal */
            color: white;
            font-size: 16px;

            border-radius: 25px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin: 20px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #C14B5E; /* Color más oscuro al pasar el mouse */
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <!-- Inicio de detalles de los productos -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 style="color: #DB6574; font-weight: bold;">Detalles del producto</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <!-- Imagen del producto -->
                        <div class="div_center">
                            <img width="400" src="/products/{{$data->image}}" alt="">
                        </div>

                        <!-- Información del producto -->
                        <div class="detail-box">
                            <h6>Nombre del producto:</h6>
                            <span>{{$data->title}}</span>
                        </div>

                        <div class="detail-box">
                            <h6>Precio:</h6>
                            <span>S/.{{$data->price}}</span>
                        </div>

                        <div class="detail-box">
                            <h6>Categoría:</h6>
                            <span>{{$data->category}}</span>
                        </div>

                        <div class="detail-box">
                            <h6>Cantidad disponible:</h6>
                            <span>{{$data->quantity}}</span>
                        </div>

                        <div class="detail-box">
                            <h6>Descripción:</h6>
                            <p>{{$data->description}}</p>
                        </div>

                        <!-- Botón de regresar -->
                        <div class="div_center">
                            <a class="btn-back" href="{{url('/')}}">Regresar a la tienda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de detalles de los productos -->

    <!-- info section -->
    @include('home.footer')
</body>

</html>
