<header>
    <nav class="navbar navbar-light bg-white shadow-sm">
      <a class="navbar-brand ml-auto mr-auto ml-lg-5 pl-lg-5" href="{{ url('/') }}">
          <b>{{ __('Surf Store') }}</b>
      </a>
      <div id="header-options" class="mr-5 pr-5 d-none d-lg-block">
        @guest
          <a href="{{ route('login') }}"><i class="fa fa-user"></i>Sign in</a>
          <a href="{{ route('register') }}"><i class="fa fa-sign-in"></i>Registration</a>
        @else
          <a href="{{ route('home') }}"><i class="fa fa-user"></i>Profile</a>
        @endguest
        <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i>Cart</a>
      </div>
    </nav>
    <div id="header-root"></div>
</header>
