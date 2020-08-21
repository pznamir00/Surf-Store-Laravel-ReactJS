@extends('layouts.app')

@section('title', '| Home')

@section('content')

<section >
  <div id="background-index"></div>
</section>

<section id="category-images">
  <h4 class="text-center">Categories</h4>
  <div class="container">
    <div class="row">
      @foreach($categories as $cat)
        @foreach($cat->subcategories as $subcat)
          @if($subcat->image_filepath)
            <a href="/products/{{$cat->title}}/{{$subcat->title}}" class="col-4 col-md-3 col-lg-2">
              <figure class="index-subcategory">
                <div style="background-image: url('/storage/subcategories/{{ $subcat->image_filepath }}');"></div>
                <figcaption class="text-dark mt-1 text-center font-weight-bold text-uppercase">{{ $subcat->title }}</figcaption>
              </figure>
            </a>
          @endif
        @endforeach
      @endforeach
    </div>
  </div>
</section>

<section class="mt-5 pt-5">
  <h4 class="text-center">Newest products</h4>
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
