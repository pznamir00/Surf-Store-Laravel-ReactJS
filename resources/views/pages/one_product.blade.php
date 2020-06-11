@extends('layouts.app')

@section('title', '| Product')

@section('content')

  <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/one_product.css') }}"/>



  <div class="mt-5">
    <h1>{{$product->title}}</h1>
    <hr>
    <strong class="mt-2"><a href="{{ '/products/'.$category->slug.'/'.$subcat->slug }}">Category > {{$category->title}} > {{$subcat->title}}</a></strong>
  </div>

  <div>
    @foreach($product->images as $img)
      <input type="hidden" class="slider-image" value="{{$img->url}}"/>
    @endforeach
    <div id="root"></div>
  </div>

  <div id="description">
    <b>Description:</b>
    <p>
      {!! $product->description !!}
    </p>
  </div>

  <div class="text-center">
    <div id="price">
      <span>Price:</span>
      <b>{{$product->price}}</b>
    </div>

    <form method="GET" action="/cart/add-to-cart">
      <input type="hidden" name="product_id" value="{{$product->id}}"/>

      <div id="sizes">
        <strong>Available sizes:</strong>
        <br>
          @foreach($product->sizes as $size)
            <label class="size-label"><input type="radio" name="selected_size" value="{{$size->id}}"/><span>{{$size->value}}</span></label>
          @endforeach
      </div>

      <div id="add-to-cart-button"></div>
    </form>
  </div>

  <hr>

  <div class="mb-5 pb-5">
    @if(Auth::check())
      <a href="{{ route('edit_product', $product->id) }}" class="btn btn-primary operation"><i class="fa fa-pencil-square-o mr-3"></i>Edit</a>
      {!! Form::open(['action'=>'ProductController@delete', 'method'=>'DELETE']) !!}
        @csrf
        {{Form::hidden('product_id', $product->id)}}
        <button class="btn btn-danger m-1"><i class="fa fa-trash mr-3"></i>Delete</button>
      {!! Form::close() !!}
    @endif

    <div class="float-right">
      <span>Added at: {{$product->created_at}}</span>
    </div>
  </div>

@endsection
