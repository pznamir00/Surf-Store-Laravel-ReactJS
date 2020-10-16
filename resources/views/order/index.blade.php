@extends('layouts.app')

@section('title', '| Order')

@section('content')

  {!! Form::open(['method'=>'POST', 'action'=>'OrderController@save_data_form', 'id'=>'personal-data-order-form']) !!}

    <h5 class="mb-2">Contact informations</h5>
    {{Form::Label('Email')}}
    {{Form::text('email', $data['email'], ['class'=>'form-control'])}}
    {{Form::Label('First_name')}}
    {{Form::text('first_name', $data['first_name'], ['class'=>'form-control'])}}
    {{Form::Label('Last_name')}}
    {{Form::text('last_name', $data['last_name'], ['class'=>'form-control'])}}
    {{Form::Label('Phone number')}}
    {{Form::text('phone', $data['phone'], ['class'=>'form-control'])}}

    <h5 class="mt-5 mb-2">Address for shipping</h5>
    {{Form::Label('Street')}}
    {{Form::text('street', $data['street'], ['class'=>'form-control'])}}
    {{Form::Label('Home number')}}
    {{Form::text('home_number', $data['home_number'], ['class'=>'form-control'])}}
    {{Form::Label('City')}}
    {{Form::text('city', $data['city'], ['class'=>'form-control'])}}
    {{Form::Label('Zip code')}}
    {{Form::text('zipcode', $data['zipcode'], ['class'=>'form-control'])}}

    <span style="font-size: 10px; float: right; margin-top: 10px;">All fields are required</span>

    {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default ml-3 mt-5']) !!}
    {{Form::submit('Done', ['class'=>'btn btn-primary mt-5'])}}
  {!! Form::close() !!}

@endsection
