@extends('layouts.app')

@section('title', '| Home')

@section('content')

<section >
  <div id="background-index"></div>
</section>

<section class="mt-5 pt-5">
  <h3 class="ml-2 mb-5 ">Newest products:</h3>
  @if($products->isEmpty())
    <h4>Not found results</h4>
  @endif
  <div class="container">
    <div class="row">
      @foreach($products as $product)
        <a href="{{ route('one_product', $product->id) }}" class="product col-6 col-lg-4 col-xl-3 mb-2">
          <div style="background-image: url('/images/{{ count($product->images) ? $product->images[0]->url : `default.jpg` }}');"></div>
          <strong>{{$product->title}}</strong>
          <p class="mt-2">{{$product->price}}</p>
        </a>
      @endforeach
    </div>
  </div>
  {{$products->links()}}
</section>

@endsection
