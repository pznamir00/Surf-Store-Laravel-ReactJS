<footer>
  <div class="f-site">
    <h4>Site</h4>
    <a href="/"><i class="fa fa-home"></i>Home</a>
    <a href="{{ route('contact') }}"><i class="fa fa-envelope"></i>Contact</a>
    <a href="/about-us"><i class="fa fa-info mr-1"></i>About us</a>
  </div>
  <hr>
  <div class="f-auth">
    <h4>User</h4>
    @guest
      <a href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a>
      <a href="{{ route('register') }}"><i class="fa fa-sign-in"></i>Register</a>
    @else
      <a href="{{ route('home') }}"><i class="fa fa-user"></i>Your account</a>
    @endguest
    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i>Your cart</a>
  </div>
  <hr>
  <div class="medias">
    <a href="#" class="mx-md-4"><i class="fa fa-facebook h3"></i></a>
    <a href="#" class="mx-md-4"><i class="fa fa-instagram h3"></i></a>
    <a href="#" class="mx-md-4"><i class="fa fa-github h3"></i></a>
    <a href="#" class="mx-md-4"><i class="fa fa-google-plus h3"></i></a>
    <a href="#" class="mx-md-4"><i class="fa fa-linkedin h3"></i></a>
    <a href="#" class="mx-md-4"><i class="fa fa-youtube h3"></i></a>
  </div>
  <div class="f-copyright">
    <span>All rights reserved &copy</span>
  </div>
</footer>
