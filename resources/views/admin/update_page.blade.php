<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      body {
        background-color: #1e1e1e;
        color: white;
        font-family: Arial, sans-serif;
      }

      .page-content {
        padding: 30px;
      }

      .form-container {
        background-color: #2c2c2c;
        border-radius: 10px;
        padding: 20px;
        max-width: 700px;
        margin: 0 auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      }

      h2 {
        text-align: center;
        color: #f1f1f1;
        font-size: 24px;
      }

      label {
        display: block;
        margin: 10px 0 5px;
        font-size: 16px;
      }

      input[type='text'], input[type='number'], select, textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #555;
        background-color: #444;
        color: white;
        font-size: 16px;
        border-radius: 5px;
      }

      input[type='file'] {
        padding: 12px;
        margin-bottom: 15px;
      }

      .btn {
        display: block;
        width: 100%;
        padding: 15px;
        background-color: #e74c3c;
        border: none;
        color: white;
        font-size: 18px;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
      }

      .btn:hover {
        background-color: #c0392b;
      }

      .footer {
        background-color: #333;
        padding: 20px;
        text-align: center;
        color: white;
      }
    </style>

  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="form-container">
        <h2>Editar Producto</h2>
        <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <label>Título del Producto</label>
          <input type="text" name="title" value="{{$data->title}}">

          <label>Descripción del Producto</label>
          <textarea name="description">{{$data->description}}</textarea>

          <label>Precio del Producto</label>
          <input type="text" name="price" value="{{$data->price}}">

          <label>Cantidad Disponible</label>
          <input type="number" name="quantity" value="{{$data->quantity}}">

          <label>Categoría</label>
          <select name="category">
            <option value="{{$data->category}}">{{$data->category}}</option>
            @foreach($category as $category)
            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endforeach
          </select>

          <label>Imagen Actual</label>
          <img width="150" src="/products/{{$data->image}}">

          <label>Nueva Imagen</label>
          <input type="file" name="image">

          <button type="submit" class="btn">Actualizar Producto</button>
        </form>
      </div>
    </div>

    @include('admin.js')

  </body>
</html>
