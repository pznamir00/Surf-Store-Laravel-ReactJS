@extends('layouts.app')

@section('title', '| Product')

@section('content')


<div class="mt-5">
  <h1>{{$product->title}}</h1>
  <hr>
  <strong class="mt-2">
    <a href="{{ '/products/'.$product->category->base_category->slug.'/'.$product->category->slug }}" id="cat_a">
      Category<i class="fa fa-long-arrow-right"></i>{{$product->category->base_category->title}}<i class="fa fa-long-arrow-right"></i>{{$product->category->title}}
    </a>
  </strong>
</div>



<div>
  <form id="add-to-cart-form" class="mt-5" method="GET" action="/cart/add-to-cart">
      @foreach($product->images as $img)
        <input type="hidden" class="slider-image" value="{{$img->url}}"/>
      @endforeach
      <input type="hidden" name="product_id" value="{{$product->id}}"/>
      <div id="root"></div>
      <div id="sizes">
        <strong>Available sizes:</strong>
        <br>
        @foreach($product->sizes as $size)
          <label class="size-label"><input type="radio" name="selected_size" value="{{$size->id}}"/><span>{{$size->value}}</span></label>
        @endforeach
      </div>
  </form>
</div>

<div id="price" class="my-5">
  <b>{{$product->price}}</b>
</div>

<div id="description">
  <b>Description:</b>
  <p>
    {!! $product->description !!}
  </p>
</div>

<hr>

<div class="mb-5 pb-5">
  @if(Auth::check())
    @if(Auth::user()->hasRole('admin'))
      <a href="{{ route('edit_product', $product->id) }}" class="btn btn-primary operation"><i class="fa fa-pencil-square-o"></i>Edit</a>
      {!! Form::open(['action'=>'ProductController@delete', 'method'=>'DELETE']) !!}
        @csrf
        {{Form::hidden('product_id', $product->id)}}
        <button class="btn btn-danger m-1"><i class="fa fa-trash"></i>Delete</button>
      {!! Form::close() !!}
    @endif
  @endif

  <div class="float-right" style="color: #aaa;">
    <span>ID: {{$product->id}}</span>
    <br>
    <span>Added at: {{$product->created_at}}</span>
  </div>
</div>

@endsection
