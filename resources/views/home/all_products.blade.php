
<section class="shop_section layout_padding">
  <div class="container">
    <div class="row">
      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="product-card">
          <!-- Imagen del producto -->
          <a href="{{url('product_details', $products->id)}}" class="product-link">
            <div class="img-box">
              <img src="products/{{$products->image}}" alt="{{$products->title}}">
            </div>
            <div class="detail-box">
              <h6 class="product-title">{{$products->title}}</h6>
            </div>
          </a>

          <!-- Precio -->
          <div class="price-box">
            <span class="product-price">S/.{{$products->price}}</span>
          </div>

          <!-- Botón de agregar al carrito -->
          <div class="action-buttons">
            <a class="btn btn-add-cart" href="{{url('add_cart', $products->id)}}">
              Agregar <i class="fa fa-shopping-cart"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Estilos CSS -->
<style>
  /* Contenedor de la tarjeta */
  .product-card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    background-color: #ffffff;
    margin-bottom: 20px;
    padding: 15px;
    text-align: center;
  }

  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }

  /* Imagen cuadrada */
  .img-box {
    width: 100%;
    height: 200px; /* Define un tamaño fijo cuadrado */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden; /* Recorta el contenido que exceda el contenedor */
    background-color: #f9f9f9;
  }

  .img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ajusta la imagen para llenar el contenedor */
    border-radius: 10px; /* Esquinas redondeadas */
  }

  /* Título del producto */
  .product-title {
    font-size: 14px;
    font-weight: bold;
    margin: 10px 0;
    color: #333;
    text-transform: capitalize;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  /* Precio */
  .price-box {
    margin-top: 5px;
    font-size: 16px;
    font-weight: bold;
    color: #DB6574;
  }

  /* Botón de agregar al carrito */
  .btn-add-cart {
    background-color: #DB6574;
    color: #ffffff;
    border: none;
    border-radius: 25px;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    display: inline-block;
    margin-top: 10px;
    transition: all 0.3s ease;
  }

  .btn-add-cart:hover {
    background-color: #da4d4d; /* Fondo rosa oscuro */
    text-decoration: none;
    color: #f5f5f5; /* Cambiar el color del texto a rosa claro */
    box-shadow: 0 0 12px #FF69B4; /* Efecto de brillo rosa claro */
  }

  .btn-add-cart i {
    margin-left: 5px;
  }

  /* Grilla responsiva */
  @media (max-width: 576px) {
    .product-card {
      padding: 10px;
    }

    .product-title {
      font-size: 12px;
    }

    .btn-add-cart {
      font-size: 12px;
      padding: 8px 12px;
    }

    .img-box {
      height: 150px; /* Tamaño menor en dispositivos pequeños */
    }
  }
</style>