@extends('layouts.app')

@section('title', '| Products')

@section('content')
<section class="mt-5">
  @if($products->isEmpty())
    <h4>Not found results</h4>
  @endif
  <div class="container">
    <div class="row">
      @foreach($products as $product)
        <a href="{{ route('one_product', $product->id) }}" class="product col-6 col-lg-4 col-xl-3 mb-2">
          @if(count($product->images))
            <img src="{{ asset('images').'/'.$product->images[0]->url }}" alt="{{$product->title}}"/>
          @endif
          <strong>{{$product->title}}</strong>
          <p class="mt-2">{{$product->price}}</p>
        </a>
        <br/>
      @endforeach
    </div>
  </div>
  {{$products->links()}}
</section>

@endsection
