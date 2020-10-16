@extends('layouts.app')

@section('title', '| Cart')

@section('content')

<div id="cart-table-container">
  <table class="table">
    <thead>
        <th></th>
        <th>Title</th>
        <th>Price</th>
        <th>Size</th>
        <th>Quantity</th>
        <th></th>
    <thead>
    @foreach(session('cart')->items as $key => $item)
      <tr>
        <td><img class="cart-image" src="{{ 'media/products/'.$item['product']->images[0]->url }}" alt="Cart Img"/></td>
        <td>{{ $item['product']->title }}</td>
        <td>{{ $item['product']->price }}</td>
        <td>{{ $item['size']->size->value }}</td>
        <td><input class="form-control" type="number" data-sid="{{$item['size']->id}}" value="{{$item['quantity']}}" max="{{$item['size']->quantity}}" min="1"/></td>
        <td>
          {!! Form::open(['action'=>'CartController@delete_from_cart', 'method'=>'DELETE']) !!}
            @csrf
            {{Form::hidden('key', $key)}}
            {{Form::submit('Delete', ['class'=>'btn btn-default text-danger'])}}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
</div>

<form method="DELETE" action="/cart">
  <button type="submit" class="btn btn-danger">Clear cart</button>
</form>

<a href="{{route('personal-data')}}" class="btn btn-default order-button">Order</a>

<div id="root"></root>

@endsection
