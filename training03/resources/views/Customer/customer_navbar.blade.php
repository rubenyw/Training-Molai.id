<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <div class="container-fluid justify-content-between">
      <!-- Left elements -->
      <div class="d-flex">
        <!-- Brand -->
        <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="{{route("customer_page")}}">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="20"
            alt="MDB Logo"
            loading="lazy"
            style="margin-top: 2px;"
          />
        </a>
  
        <!-- Search form -->
            <div class="w-auto my-auto d-none d-sm-flex">
                SIM ISTTS
            </div>
      </div>
      <!-- Left elements -->
  
      <!-- Center elements -->
      <ul class="navbar-nav flex-row d-none d-md-flex">
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link {{ Request::routeIs('master_customer_page') ? 'active' : ''}}" href="{{ route("master_customer_page") }}">
            <span><i class="fas fa-user-group fa-lg"></i></span>
            {{-- <span class="badge rounded-pill badge-notification bg-danger">1</span> --}}
          </a>
        </li>
  
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link {{ Request::routeIs('master_barang_page') ? 'active' : ''}}" href="{{ route("master_barang_page") }}">
            <span><i class="fas fa-suitcase fa-lg"></i></span>
          </a>
        </li>
  
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link {{ Request::routeIs('tambah_stock_page') ? 'active' : ''}}" href="{{ route("tambah_stock_page") }}">
            <span><i class="fas fa-boxes-stacked fa-lg"></i></span>
          </a>
        </li>
  
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link {{ Request::routeIs('transaksi_page') ? 'active' : ''}}" href="{{ route("transaksi_page") }}">
            <span><i class="fas fa-dollar-sign fa-lg"></i></span>
          </a>
        </li>
  
        {{-- <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="#">
            <span><i class="fas fa-users fa-lg"></i></span>
            <span class="badge rounded-pill badge-notification bg-danger">2</span>
          </a>
        </li> --}}
      </ul>
      <!-- Center elements -->
  
      <!-- Right elements -->
      <ul class="navbar-nav flex-row">
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link d-sm-flex align-items-sm-center" href="#">
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp"
              class="rounded-circle"
              height="22"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
            <strong class="d-none d-sm-block ms-1">{{explode(' ', $customer["customer_name"])[0]}}</strong>
          </a>
        </li>
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="#">
            <span><i class="fas fa-plus-circle fa-lg"></i></span>
          </a>
        </li>
        <li class="nav-item dropdown me-3 me-lg-1">
          <a
            data-mdb-dropdown-init
            class="nav-link dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            aria-expanded="false"
          >
            <i class="fas fa-comments fa-lg"></i>
  
            <span class="badge rounded-pill badge-notification bg-danger">6</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown me-3 me-lg-1">
          <a
            data-mdb-dropdown-init
            class="nav-link dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            aria-expanded="false"
          >
            <i class="fas fa-bell fa-lg"></i>
            <span class="badge rounded-pill badge-notification bg-danger">12</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown me-3 me-lg-1">
          <a
            data-mdb-dropdown-init
            class="nav-link dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            aria-expanded="false"
          >
            <i class="fas fa-chevron-circle-down fa-lg"></i>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Right elements -->
    </div>
  </nav>
  <!-- Navbar -->