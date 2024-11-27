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
        margin: 60px;
     }

     input[type='text']
     {
        width: 400px;
        height: 35px;
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
            <!-- Color del título -->
            <h1 style="color: white">Actualizar categoría</h1>

            <div class="div_deg">
                
                <form action="{{url('update_category',$data->id)}}" method="post">
                    @csrf
                    
                    <input type="text" name="category" value="{{$data->category_name}}">
                    <input class="btn btn-primary" type="submit" value="Actualizar categoría">
                </form>
            </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <!-- Se añadió admincss -->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <!-- Se terminó de añadir admincss -->
  </body>
</html>