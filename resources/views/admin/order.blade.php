<!-- Diseño de la página de ADMINISTRADOR -->
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:nth-child(odd) {
            background-color: #fff;
        }

        table th {
            background-color: black;
            color: white;
        }

        .table_center {
            margin: auto;
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

            <table>
                <tr>
                    <th>Customisar nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Título del producto</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Status</th>
                    <th>Cambiar estado</th>
                    <th>Imprimir PDF</th>

                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>

                    <td><img width="150" src="products/{{$data->product->image}}"></td>
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
                        <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">En camino</a>
                        <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Entregado</a>
                    </td>

                    <td>
                    <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Imprimir PDF</a>
                    </td>
                </tr>
                
                @endforeach
                
            </table>

        </div>    

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>