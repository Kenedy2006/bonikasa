<!-- Diseño de la página de ADMINISTRADOR -->
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .table_deg {
            border: 1px solid #4a4a4a; /* Ajuste del borde */
            /* border-radius: 8px; */
            overflow: hidden; /* Para mantener el diseño limpio */
            background-color: #22252A; /* Fondo oscuro */
            color: #8A8D93; /* Texto blanco para contraste */
            width: 90%; /* Ajuste al ancho del contenido */
            text-align: center; /* Centrar el texto dentro de la tabla */
            overflow-x: auto; /* Hacer la tabla responsiva */
        }

        /* Cabecera de la tabla */
        th {
            background-color: #DB6574; /* Color gris oscuro para la cabecera */
            color: white; /* Texto con un tono rojo para destacar */
            font-size: 18px;
            padding: 15px;
            font-weight: normal;
            text-align: center; /* Centrar el texto de los títulos */
            border-bottom: 1px solid #22252A;
        }

        /* Filas de la tabla */
        td {
            border: 1px solid #4a4a4a; /* Borde más tenue */
            text-align: center; /* Centrar el contenido */
            padding: 10px;
            /* border-radius: 5px; */
        }

        /* Imágenes */
        img {
            border: 1px solid #555555; /* Borde alrededor de las imágenes */
            border-radius: 4px; /* Bordes ligeramente redondeados */
            width: 120px; /* Asegurar que todas las imágenes tengan el mismo tamaño */
            height: 120px; /* Asegurar que todas las imágenes tengan el mismo tamaño */
        }

        /* Separar botones verticalmente */
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Espacio entre los botones */
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

        <div class="table_center">   
          <div class="table-responsive">
            <table class="table_deg">
                <tr>
                    <th>Nombre De Comprador</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Título Del Droducto</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Estado Del Pago</th>
                    <th>Estado Del Pedido</th>
                    <th>Cambiar Estado</th>
                    <th>Voucher De Compra</th>

                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>

                    <td><img width="150" src="products/{{$data->product->image}}"></td>

                    <td>{{$data->payment_status}}</td>

                    <td>
                        

                        @if($data->status== 'in progress')
                        <span style="color:red">{{$data->status}}</span>

                        @elseif($data->status== 'En camino')
                        <span style="color:skyblue;">{{$data->status}}</span>

                        @else
                        <span style="color:rgb(38, 209, 38);">{{$data->status}}</span>

                        @endif


                    </td>
                    <td>
                        <div class="btn-container">
                            <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">En camino</a>
                            <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Entregado</a>
                        </div>
                    </td>

                    <td>
                    <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Imprimir Voucher</a>
                    </td>
                </tr>
                
                @endforeach
                
            </table>
          </div>
        </div>    

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
  <footer class="footer">
    <div class="footer__block block no-margin-bottom">
      <div class="container-fluid text-center">
        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
         <p class="no-margin-bottom">2024 &copy; Kenedy Ramos Huaman. Student from <a target="_blank" href="https://www.tecsup.edu.pe/">Tecsup</a>.</p>
      </div>
    </div>
    </footer>
</html>