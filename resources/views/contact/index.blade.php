@extends('layouts.app')

@section('title', '| Contact with us')

@section('content')

{!! Form::open(['action'=>'ContactController@submit_message', 'method'=>'POST']) !!}
  @csrf
  {{Form::email('email', '', ['class'=>'form-control mb-1', 'placeholder'=>'Enter your email'])}}
  {{Form::text('subject', '', ['class'=>'form-control mb-1', 'placeholder'=>'Subject'])}}
  {{Form::textarea('message', '', ['class'=>'form-control', 'placeholder'=>'Message'])}}
  <div class="form-group mt-5">
    {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default']) !!}
    {!! Form::submit('Send', ['class'=>'btn btn-primary mr-5', 'id'=>'save-button']) !!}
  </div>
{!! Form::close() !!}

@endsection
