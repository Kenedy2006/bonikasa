<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>

    @include('home.css')
    <style>
      .search-container {
        display: flex;
        justify-content: center;
        margin-top: 60px; /* Más separación del título */
      }
      .input-container {
        display: flex;
        width: 100%;
        max-width: 600px;
        align-items: center; /* Alinear elementos verticalmente */
      }
      .input-container form {
        display: flex;
        width: 100%;
        align-items: center; /* Alinear elementos verticalmente */
      }
      .input-container input[type="search"] {
        flex: 1;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 25px; /* Bordes redondeados completos */
        outline: none;
      }
      .input-container button {
        width: 40px;
        height: 40px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 50%; /* Botón circular */
        cursor: pointer;
        margin-left: 10px; /* Separación entre la barra y el botón */
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .input-container button:hover {
        background-color: #0056b3;
      }
      .input-container button i {
        font-size: 16px;
      }
      @media (max-width: 768px) {
        .input-container {
          flex-direction: column;
        }
        .input-container input[type="search"],
        .input-container button {
          border-radius: 25px;
          margin: 5px 0;
        }
      }
    </style>
  
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
  </div>

  <div class="heading_container heading_center">
    <div class="search-container">
      <div class="input-container">
        <form action="{{url('product_search')}}" method="get">
          @csrf
          <input type="search" name="search" placeholder="Buscar producto" required>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    <div class="product-container">
      @include('home.all_products')
    </div>
  </div>

</body>
@include('home.footer')
</html>