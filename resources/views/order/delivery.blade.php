@extends('layouts.app')
@section('title', 'Delivery')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/cart/delivery.css') }}"/>

<h3>Select delivery</h3>

{!! Form::open(['method'=>'POST', 'action'=>'OrderController@delivery', 'class'=>'mt-5']) !!}

  @csrf

  @if(Session::has('delivery_id'))
    <input type="hidden" name="instance-id" value="{{Session::get('delivery_id')}}"/>
    <div id="root"></div>
  @endif

  <table class="table table">
    @foreach($deliveries as $delivery)
      <tr>
        <td><input class="form-control" id="p{{$delivery->id}}" type="radio" name="selected-delivery" value="{{$delivery->id}}"/></td>
        <td><label for="p{{$delivery->id}}">{{$delivery->name}}</label></td>
        <td><img class="delivery-logo" src="/media/logos/{{$delivery->logo}}" alt="{{$delivery->name}}"/></td>
        <td><strong>Price: <p>{{$delivery->price}}</p></strong></td>
      </tr>
    @endforeach
  </table>

  {{Form::submit('Done', ['class'=>'btn btn-primary mt-5'])}}
  {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default ml-3 mt-5']) !!}
{!! Form::close() !!}

@endsection
