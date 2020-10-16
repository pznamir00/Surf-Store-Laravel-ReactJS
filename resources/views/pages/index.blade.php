@extends('layouts.app')

@section('title', '| Home')

@section('content')

<div id="home-slider">
  <div id="root"></div>
</div>

<section id="home-products">
  <h4 class="text-center">Newest products</h4>
  @if($products->isEmpty())
    <h4>Not found results</h4>
  @endif
  <div class="container">
    <div class="row">
      @foreach($products as $product)
        <a href="{{ route('one_product', $product->id) }}" class="product col-6 col-lg-4 col-xl-3 mb-2">
          <div style="background-image: url('/media/products/{{ count($product->images) ? $product->images[0]->url : `default.jpg` }}');"></div>
          <strong>{{$product->title}}</strong>
          <p class="mt-2">{{$product->price}}</p>
        </a>
      @endforeach
    </div>
  </div>
  {{$products->links()}}
</section>

@endsection
