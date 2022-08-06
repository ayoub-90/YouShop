
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="https://www.creative-tim.com" class="simple-text logo-mini">
        <div class="logo-image-small">
            {{-- logo --}}
        </div>
        <!-- <p>CT</p> -->
      </a>
      <i class="bi bi-bag"></i>
        youshop
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>


    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class=" {{Request::is('dashboard')? 'active' : ''}}">
          <a href="{{url('/dashboard')}}">
            <i class="bi bi-bank2"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class=" {{Request::is('Categories')? 'active' : ''}}">
            <a href="{{url('Categories')}}">
              <i class="bi bi-person"></i>
              <p>Categories</p>
            </a>
          </li>
        <li class="{{Request::is('add-Category')? 'active' : ''}}">
          <a href="{{url('add-Category')}}">
            <i class="bi bi-file-plus-fill"></i>
            <p>add category</p>
          </a>
        </li>
        <li class=" {{Request::is('Products')? 'active' : ''}}">
            <a href="{{url('Products')}}">
              <i class="bi bi-person"></i>
              <p>Products</p>
            </a>
          </li>
        <li class="{{Request::is('add-Products')? 'active' : ''}}">
          <a href="{{url('add-Products')}}">
            <i class="bi bi-file-plus-fill"></i>
            <p>add Products</p>
          </a>
        </li>

        <li class="{{Request::is('orders')? 'active' : ''}}">
            <a href="{{url('orders')}}">
                <i class="bi bi-clipboard"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="{{Request::is('users')? 'active' : ''}}">
            <a href="{{url('users')}}">
                <i class="bi bi-person"></i>
              <p>Users</p>
            </a>
          </li>
      </ul>
    </div>
  </div>
