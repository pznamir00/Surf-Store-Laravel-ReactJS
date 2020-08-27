@extends('layouts.app')

@section('title', '| Cart')

@section('content')

<div id="cart-table-container">
  <table class="table table cart-tabl">
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
        <td><img class="cart-image" src="{{ 'images/'.$item['product']->images[0]->url }}" alt="Cart Img"/></td>
        <td>{{ $item['product']->title }}</td>
        <td>{{ $item['product']->price }}</td>
        <td>{{ $item['size']->size->value }}</td>
        <td><input class="form-control" type="number" data-sid="{{$item['size']->id}}" value="{{$item['quantity']}}" max="{{$item['size']->quantity}}" min="1"/></td>
        <td>
          {!! Form::open(['action'=>'CartController@delete_from_cart', 'method'=>'DELETE']) !!}
            @csrf
            {{Form::hidden('key', $key)}}
            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
</div>

<a href="{{route('personal-data')}}" class="btn btn-primary">Order</a>
<form method="DELETE" action="/cart">
  <button type="submit" class="btn btn-danger float-right">Clear cart</button>
</form>

<div id="root"></root>

@endsection
