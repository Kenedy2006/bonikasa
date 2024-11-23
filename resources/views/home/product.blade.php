<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Nuestros últimos productos
      </h2>
    </div>
    <div class="row">

      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <!-- Zona clicable para detalles del producto -->
          <a href="{{url('product_details', $products->id)}}" class="product-link">
            <div class="img-box">
              <img src="products/{{$products->image}}" alt="">
            </div>
            <div class="detail-box">
              <h6 class="product-title">{{$products->title}}</h6>
            </div>
            <div class="price-box">
              <span class="product-price">S/.{{$products->price}}</span>
            </div>
          </a>

          <!-- Botón de agregar al carrito -->
          <div class="action-buttons">
            <a class="btn btn-add-cart" href="{{url('add_cart', $products->id)}}">
              Agregar
              <i class="fa fa-shopping-cart"></i>
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
  /* Zona clicable para detalles */
  .product-link {
    display: block;
    text-decoration: none;
    color: inherit;
  }

  .product-title {
    font-size: 14px;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .price-box {
    text-align: center;
    margin-top: 5px;
  }

  .product-price {
    font-size: 16px;
    font-weight: bold;
    color: #000000;
  }

  /* Botón de agregar al carrito */
  .btn-add-cart {
    background-color: #DB6574; /* Color solicitado */
    color: #FFFFFF; /* Texto blanco */
    border: none;
    border-radius: 25px; /* Bordes redondeados */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s ease;
    margin: 10px auto 0;
    width: 80%;
    text-align: center;
  }

  .btn-add-cart i {
    margin-left: 8px; /* Espaciado entre texto e ícono */
  }

  .btn-add-cart:hover {
    background-color: #C14B5E; /* Color más oscuro al pasar el mouse */
  }

  /* Estilo responsivo */
  @media (max-width: 576px) {
    .btn-add-cart {
      font-size: 14px;
      padding: 8px 16px;
    }
  }
</style>
