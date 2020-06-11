<footer>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/footer.css') }}"/>

  <div id="footer-categories">
    <h3>Categories</h3>
    @foreach($footerCategories as $cat)
      <div class="mt-3">
        <strong>{{$cat->title}}</strong>
        <ul class="list-group">
          @foreach($cat->subcategories as $subcat)
            <a href="{{ 'products/'.$cat->slug.'/'.$subcat->slug }}"><li class="footer-list-item">{{$subcat->title}}</li></a>
          @endforeach
        </ul>
      </div>
    @endforeach
  </div>
  <div id="footer-user">
    <h3>User</h3>
    @guest
      <a href="{{ route('register') }}" class="nav-link">Register</a>
      <a href="{{ route('login') }}" class="nav-link">Login</a>
    @else
      <a href="{{ route('home') }}"><i class="fa fa-user mr-3"></i>Your account</a>
    @endguest
    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart mr-3"></i>Your cart</a>
  </div>
  <div id="footer-copyright">
    <span>All rights reserved &copy</span>
  </div>
</footer>
