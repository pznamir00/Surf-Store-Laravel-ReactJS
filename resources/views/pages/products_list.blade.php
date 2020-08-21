@extends('layouts.app')

@section('title', '| Products')

@section('content')

<div class="mt-5">
  <div class="container">
    <div class="row">

      <section id="filters" class="d-none">
        <div class="filter-header">
          <i id="exit-btn" class="fa fa-times float-right"></i>
          <h2>Filters</h2>
        </div>

        <hr>

        <form method="GET">
          @if(request()->has('keywords') && request('keywords') != '')
            <input type="hidden" name="keywords" value="{{ request('keywords') }}"/>
          @endif
          <div class="container">
            <div class="row">

              <div class="form-group col-sm-6">
                <label for="orderBySelect">Order by</label>
                <select id="orderBySelect" name="order_by" class="form-control">
                  @foreach($sorts as $key => $sort)
                    <option value="{{ $key }}" {{ request()->has('order_by') ? (request('order_by') == $key ? 'selected' : '') : '' }}>{{ $sort }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-sm-6">
                <label for="priceInput">Price</label>
                <div id="priceInput">
                  <label>
                    As
                    <input type="range" step="0.01" class="custom-range" name="price_as" value="{{ $price['as'] }}" min="0" max="{{ $biggest_price }}"/>
                    <span id="price_as" class="float-right">{{ $price['as'] }}</span>
                  </label>
                  <br/>
                  <label>
                    To
                    <input type="range" step="0.01" class="custom-range" name="price_to" value="{{ $price['to'] }}" min="0" max="{{ $biggest_price }}"/>
                    <span id="price_to" class="float-right">{{ $price['to'] }}</span>
                  </label>
                </div>
              </div>

              <div class="form-group col-sm-6">
                <label for="sizeSelect">Size</label>
                <select id="sizeSelect" name="size" class="form-control">
                  <option>All</option>
                  @foreach($sizes as $size)
                    <option {{ request()->has('size') ? ($size->value == request('size') ? 'selected' : '') : '' }}>{{ $size->value }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-sm-6">
                <label for="colorInput">Color</label>
                <div class="form-group" id="colorInput">
                  @foreach($colors as $color)
                    <label class="d-block">
                      <input type="radio" name="color" value="{{ $color->name }}"
                        {{ request()->has('color') ? ($color->name == request('color') ? 'checked' : '') : '' }}/>
                      <div class="color-sqrt d-inline-block" style="background: {{ $color->hex_code }}"></div>
                      {{ $color->name }}
                    </label>
                  @endforeach
                </div>
              </div>

              <div class="form-group ml-5">
                <label for="producentSelect">Producent:</label>
                <select id="producentsSelect" name="producent" class="form-control">
                  <option>All</option>
                  @foreach($producents as $producent)
                    <option {{ request()->has('producent') ? ($producent->name == request('producent') ? 'selected' : '') : '' }}>{{ $producent->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-default"><i class="fa fa-filter"></i>Filter</button>
        </form>
        <form method="GET">
          <button id="delete-filters" type="submit" class="text-danger btn btn-default float-right"
          {{ request()->has('order_by') ||
             request()->has('price_as') ||
             request()->has('price_to') ||
             request()->has('size') ||
             request()->has('color') ||
             request()->has('producent')
            ? '' : 'disabled'
          }}
          ><i class="fa fa-times"></i>Delete filters</button>
        </form>
      </section>

      <section style="width: 100%">
        <h5>{{ $title }}</h5>
        <div id="root"></div>
        <hr>
        @if($products->isEmpty())
          <h4>Not found results :(</h4>
        @else
          @foreach($products as $product)
            <a href="{{ route('one_product', $product->id) }}" class="product col-6 col-lg-4 col-xl-3 mb-2">
              <div style="background-image: url('/images/{{ count($product->images) ? $product->images[0]->url : `default.jpg` }}');"></div>
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
