@extends('layouts.app')

@section('title', '| Order')

@section('content')

  {!! Form::open(['method'=>'POST', 'action'=>'OrderController@save_data_form']) !!}
    {{Form::Label('Email')}}
    {{Form::text('email', $data['email'], ['class'=>'form-control'])}}
    {{Form::Label('First_name')}}
    {{Form::text('first_name', $data['first_name'], ['class'=>'form-control'])}}
    {{Form::Label('Last_name')}}
    {{Form::text('last_name', $data['last_name'], ['class'=>'form-control'])}}
    {{Form::Label('Phone number')}}
    {{Form::text('phone', $data['phone'], ['class'=>'form-control'])}}
    {{Form::Label('Street')}}
    {{Form::text('street', $data['street'], ['class'=>'form-control'])}}
    {{Form::Label('Home number')}}
    {{Form::text('home_number', $data['home_number'], ['class'=>'form-control'])}}
    {{Form::Label('City')}}
    {{Form::text('city', $data['city'], ['class'=>'form-control'])}}
    {{Form::Label('Zip code')}}
    {{Form::text('zipcode', $data['zipcode'], ['class'=>'form-control'])}}
    {{Form::submit('Done', ['class'=>'btn btn-primary mt-5'])}}
    {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default ml-3 mt-5']) !!}
  {!! Form::close() !!}

@endsection
