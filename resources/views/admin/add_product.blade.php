<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    
    <!-- [Cambio 1: Importación de la fuente Poppins] -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    <style type="text/css">
        body {
            background-color: #2c2f33; /* Fondo oscuro, igual que el resto de la página */
            color: white;
        }

        /* [Cambio 2: Estilo del título "Agregar Producto"] */
        .page-header h1 {
            font-family: 'Poppins', sans-serif; /* Fuente personalizada */
            color: white;
            text-align: center; /* Centra el texto */
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .form-container {
            background-color: #22252A; /* Fondo del formulario */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: white;
        }

        input[type="text"], 
        input[type="number"], 
        select, 
        textarea, 
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #DB6574;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #3b3f47; /* Fondo similar al resto */
            color: white;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .btn-success {
            background-color: #DB6574; /* Rojo coherente con el diseño */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #c0392b;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <!-- [Cambio 3: Título centrado con la fuente personalizada] -->
          <h1>Agregar Producto</h1>
          
          <div class="form-container">
            <form action="{{url('upload_product')}}" method="Post" enctype="multipart/form-data">
              @csrf

              <label for="title">Título del Producto</label>
              <input type="text" name="title" id="title" required>

              <label for="description">Descripción</label>
              <textarea name="description" id="description" required></textarea>

              <label for="price">Precio</label>
              <input type="text" name="price" id="price" required>

              <label for="qty">Cantidad</label>
              <input type="number" name="qty" id="qty" required>

              <label for="category">Categoría</label>
              <select name="category" id="category" required>
                <option value="">Seleccionar</option>
                @foreach($category as $category)
                  <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
              </select>

              <label for="image">Imagen del Producto</label>
              <input type="file" name="image" id="image" required>

              <button type="submit" class="btn-success">Agregar Producto</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
