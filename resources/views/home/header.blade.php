<header class="header_section" style="color: black;">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="{{url('/')}}" style="color: black;">
        <span>
          Bonikasa
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" style="color: black;">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('/')}}" style="color: black;">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('shop')}}" style="color: black;">
              Todos los productos
            </a>
          </li>
          <li class="nav-item {{ Request::is('why') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('why')}}" style="color: black;">
              ¿Por Qué Nosotros?
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""></a>
          </li>
        </ul>
        <div class="user_option" style="color: black;">

          @if (Route::has('login'))

            @auth

            <a href="{{url('myorders')}}" style="color: black;">
            Mis pedidos
            </a>

            <a href="{{url('mycart')}}" style="color: black;">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              [{{$count}}]
            </a>

            <form style="padding: 10px" method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-link" style="color: black; text-decoration: none; display: flex; align-items: center;">
                <i class="fa fa-sign-out" aria-hidden="true" style="font-size: 1.5em; margin-right: 5px;"></i>
                <span>Cerrar Sesión</span>
              </button>
            </form>
                
            @else

          <a href="{{url('/login')}}" style="color: black;">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Iniciar sesión
            </span>
          </a>

          <a href="{{url('/register')}}" style="color: black;">
            <i class="fa fa-vcard" aria-hidden="true"></i>
            <span>
              Registrarse
            </span>
          </a>
            @endauth
          @endif  
         


          
        </div>
      </div>
    </nav>
  </header>