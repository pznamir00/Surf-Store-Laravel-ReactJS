@extends('layouts.app')

@section('title', '| Contact with us')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/contact.css') }}"/>

{!! Form::open(['action'=>'ContactController@submit_message', 'method'=>'POST']) !!}
  @csrf
  {{Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Enter your email'])}}
  <div class="form-group">
    {{Form::text('subject', '', ['class'=>'form-control mt-5', 'placeholder'=>'Subject'])}}
    {{Form::textarea('content', '', ['class'=>'form-control mt-2', 'placeholder'=>'Content'])}}
  </div>
  <div class="form-group mt-5">
    {!! Form::submit('Save', ['class'=>'btn btn-primary mr-5', 'id'=>'save-button']) !!}
    {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default']) !!}
  </div>
{!! Form::close() !!}

@endsection
