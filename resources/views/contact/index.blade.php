@extends('layouts.app')

@section('title', '| Contact with us')

@section('content')

{!! Form::open(['action'=>'ContactController@submit_message', 'method'=>'POST']) !!}
  @csrf
  {{Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Enter your email'])}}
  <div class="form-group">
    {{Form::text('subject', '', ['class'=>'form-control mt-5', 'placeholder'=>'Subject'])}}
    {{Form::textarea('message', '', ['class'=>'form-control mt-2', 'placeholder'=>'Message'])}}
  </div>
  <div class="form-group mt-5">
    {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default']) !!}
    {!! Form::submit('Send', ['class'=>'btn btn-primary mr-5', 'id'=>'save-button']) !!}
  </div>
{!! Form::close() !!}

@endsection
