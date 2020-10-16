<footer>
  <div>
    <a href="/"><i class="fa fa-home"></i>Home</a>
    <a href="{{ route('contact') }}"><i class="fa fa-envelope"></i>Contact</a>
    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i>Cart</a>
    <i class="ml-2">|</i>
    @guest
      <a href="/login" class="_wh"><i class="fa fa-user"></i>Login</a>
      <a href="/register" class="_wh"><i class="fa fa-sign-in"></i>Register</a>
    @else
      <a href="{{ route('home') }}" class="_wh"><i class="fa fa-user"></i>Your profile</a>
    @endguest
  </div>
  <p>&copy All rights reserved {{ date('Y') }}</p>
</footer>
