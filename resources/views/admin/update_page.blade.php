<!-- Diseño de la página de ADMINISTRADOR -->
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    label
    {
        display: inline-block;
        width: 200px;
        padding: 20px;
    }

    input[type='text']
    {
        width: 300px;
        height: 60px;
    }

    textarea
    {
        width: 450px;
        height: 100px;
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
            
            <h2>Editar producto</h2>
            
          <div class="div_deg">

            <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">

                @csrf

                <div>
                    <label>Título</label>
                    <input type ="text" name="title" value="{{$data->title}}">
                </div>

                <div>
                    <label>Descripción</label>
                        <textarea name="description">{{$data->description}}</textarea>
                </div>

                <div>
                    <label>Precio</label>
                    <input type="text" name="price" value="{{$data->price}}">
                </div>

                <div>
                    <label>Cantidad</label>
                    <input type="number" name="quantity" value="{{$data->quantity}}">
                </div>

                <div>
                    <label>Categoría</label>
                    <select name="category">
                        <option value="{{$data->category}}">{{$data->category}}</option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Imagen actual</label>
                    <img width="150" src="/products/{{$data->image}}">
                </div>

                <div>
                    <label>Nueva imagen</label>
                    <input type="file" name="image">
                </div>

                <div>
                    <input class="btn btn-sucess" type="submit" value="Actualizar Producto">
                </div>

            </form>
          </div>


          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>