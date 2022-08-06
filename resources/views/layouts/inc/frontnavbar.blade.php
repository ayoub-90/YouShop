
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">YouShop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('category')}}">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('Cart')}}">Cart
                    <span class="badge badge-pill bg-success cart-count">0</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('wishlist')}}">wishlist
                    <span class="badge badge-pill bg-primary wish-count">0</span>
                </a>
              </li>
              @guest

              @if (Route::has('login'))
              <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">{{ __('connextion')}}</a>
              </li>
              @endif
              @if (Route::has('register'))
              <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">{{ __('S\'inscrire')}}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{url('my-orders')}}">
                            My orders
                          </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            mon profile
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              {{ __('déconnextion') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                        </li>
              @endguest
            </ul>
          </div>
        </div>
    </nav>
