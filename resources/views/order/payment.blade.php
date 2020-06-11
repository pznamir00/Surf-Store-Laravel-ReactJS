@extends('layouts.app')
@section('title', 'Payment')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/cart/payment.css') }}"/>

<h3>Select payment method</h3>

{!! Form::open(['method'=>'POST', 'action'=>'OrderController@payment', 'class'=>'mt-5']) !!}

  @csrf

  @if(Session::has('payment_id'))
    <input type="hidden" name="instance-id" value="{{Session::get('payment_id')}}"/>
    <div id="root"></div>
  @endif

  <table class="table table">
    @foreach($payments as $payment)
      <tr>
        <td><input class="form-control" id="p{{$payment->id}}" type="radio" name="selected-payment" value="{{$payment->id}}"/></td>
        <td><label for="p{{$payment->id}}">{{$payment->name}}</label></td>
        <td><img class="payment-logo" src="/media/logos/{{$payment->logo}}" alt="{{$payment->name}}"/></td>
      </tr>
    @endforeach
  </table>

  {{Form::submit('Done', ['class'=>'btn btn-primary mt-5'])}}
  {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default ml-3 mt-5']) !!}
{!! Form::close() !!}

@endsection
