@extends('layouts.app')

@section('title', '| Products')

@section('content')

<div class="mt-5">
  <div class="container">
    <div class="row">

      @if(isset($subcategory))
        <input type="hidden" value="{{ $subcategory->id }}" id="subcat_id" />
      @endif

      <section style="width: 100%">
        <h6 class="mb-5">{{ $title }}</h6>
        <div id="root"></div>
        <hr>
        @if($products->isEmpty())
          <h5 class="text-center mt-3">No results :(</h5>
        @else
          @foreach($products as $product)
            <a href="{{ route('one_product', $product->id) }}" class="product col-6 col-lg-4 col-xl-3 mb-2">
              <div style="background-image: url('/media/products/{{ count($product->images) ? $product->images[0]->url : `default.jpg` }}');"></div>
              <strong>{{$product->title}}</strong>
              <p class="mt-2">{{$product->price}}</p>
            </a>
          @endforeach
          {{$products->links()}}
        @endif
      </section>
    </div>
  </div>
</div>

@endsection
