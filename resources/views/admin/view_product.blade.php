<!-- Diseño de la página de ADMINISTRADOR -->
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    /* Contenedor de la tabla */
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Cambiado a flex-start para evitar recortes */
        padding-top: 30px; /* Espaciado superior para un diseño balanceado */

        box-sizing: border-box; /* Considera padding en el cálculo del tamaño */
    }

    /* Tabla: Estilo actualizado */
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

    .btn-danger
    {
      background-color: #2D3035;
      color: white;
      border: none;
    }

    .btn-danger:hover
    {
      background-color: #c0392b;
    }

    .btn-sucess
    {
      background-color: #DB6574;
      color: white;
      border: none;
    }

    .btn-sucess:hover
    {
      background-color: #ff4c39;
      color: white;
    }

    .btn-primary
    {
      background-color: #2ecc71;  
      color: white;
      border: none;
    }

    .btn-primary:hover
    {
      background-color: #00ff6a;
      color: rgb(105, 105, 105);
    }

    .search-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .input-container
    {
      width: 60%;
      padding: 20px;
      background-color: #333;
      border-radius: 10px;
      text-align: center;
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
            <div class="search-container">
              <div class="input-container">
                <form action="{{url('admin/product_search')}}" method="get">
                  @csrf
                  <input type="search" name="search" placeholder="Buscar producto" required>
                  <input type="submit" class="btn btn-primary" value="Buscar">
                </form>
              </div>
            </div>
            <div class="div_deg">
              <div class="table-responsive">
                <table class="table_deg">
                  <tr>
                    <th>Título del producto</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th>Edit</th>
                    <th>Borrar</th>
                  </tr>
                  @foreach($product as $products)
                  <tr>
                    <td>{{$products->title}}</td>
                    <td>{!!Str::limit($products->description,100)!!}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>
                      <img height="120" width="120" src="{{ asset('products/'.$products->image) }}">
                    </td>
                    <td>
                      <a class="btn btn-sucess" href="{{url('update_product',$products->slug)}}">Editar</a>
                    </td>
                    <td>
                      <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Borrar</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
            <div class="div_deg">
              {{$product->onEachSide(1)->links()}}
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
