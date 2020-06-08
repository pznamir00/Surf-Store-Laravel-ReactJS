<header>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/header.css') }}"/>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ __('Online Shop') }}
            </a>
        </div>
    </nav>
    <nav class="p-1 navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Right Side Of Navbar -->
            @foreach($headerCategories as $cat)
              <div class="dropdown">
                <span type="button" id="dropdownMenuButton{{$cat->id}}" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$cat->title}}</span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$cat->id}}">
                  @foreach($cat->subcategories as $subcat)
                    <a class="dropdown-item" href="{{ '/products/'.$cat->slug.'/'.$subcat->slug }}">{{$subcat->title}}</a>
                  @endforeach
                </div>
              </div>
            @endforeach

            <ul class="navbar-nav ml-auto user-panel">
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <i class="fa fa-user mr-2"></i> {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{route('add_product')}}">
                            {{ __('Add product') }}
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
              <a href="{{ route('cart') }}" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></a>
            </ul>

            <form method="GET" action="/products/search" class="input-group md-form form-sm form-1 pl-0 search-panel">
              <div class="input-group-prepend">
                <button type="submit" class="input-group-text lighten-3" style="background: #000;" id="basic-text1"><i class="fa fa-search text-white"
                    aria-hidden="true"></i>
                </button>
              </div>
              <input class="form-control my-0 py-1" type="text" name="keywords" placeholder="Search" aria-label="Search">
            </form>
      </div>
    </nav>
    <div id="header-root"></div>
</header>
