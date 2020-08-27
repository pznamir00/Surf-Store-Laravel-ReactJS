@extends('layouts.app')
@section('title', 'Summary')
@section('content')

<h3>Summary your order</h3>

<div id="cart-table-container">
  <table class="table table mt-5">
    <thead>
        <th></th>
        <th>Title</th>
        <th>Price</th>
        <th>Size</th>
        <th>Quantity</th>
        <th></th>
    <thead>
    @foreach($products as $key => $item)
      <tr>
        <td><img class="summary-img" src="{{ '/images/'.$item['product']->images[0]->url }}" alt="img"/></td>
        <td>{{$item['product']->title}}</td>
        <td>{{$item['product']->price}}</td>
        <td>{{$item['size']->value}}</td>
        <td>{{$item['quantity']}}</td>
      </tr>
    @endforeach
  </table>

  <hr>

  <div id="order-details">
    <h3 class="mb-5">Order details</h3>
    <table class="table table">
      <tr>
        <td><strong>Payment</strong></td>
        <td><p>{{$payment->name}}</p></td>
        <td><img src="/media/logos/{{$payment->logo}}" alt="payment logo" height="30"/></td>
      </tr>
      <tr>
        <td><strong>Delivery Way</strong></td>
        <td><p>{{$delivery->name}}</p></td>
        <td><img src="/media/logos/{{$delivery->logo}}" alt="delivery logo" height="30"/></td>
        <td><strong>+ ${{$delivery->price}}</strong></td>
      </tr>
    </table>
  </div>
</div>

<hr>

<strong class="float-right">Total: ${{$total}}</strong>

{!! Form::open(['method'=>'POST', 'action'=>'OrderController@make_order', 'class'=>'mt-5 float-right']) !!}
  @csrf
  {{Form::submit('Order', ['class'=>'btn btn-primary mt-5'])}}
  {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default ml-3 mt-5']) !!}
{!! Form::close() !!}

@endsection
