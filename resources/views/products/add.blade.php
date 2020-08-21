@extends('layouts.app')

@section('content')

  {!! Form::open(['action'=>'ProductController@commit', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'id'=>'main-form']) !!}
    @csrf
    <div class="form-group">
      {{Form::label('Title')}}
      {{Form::text('title', '', ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::label('Description')}}
      {{Form::textarea('description', '', ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::label('Price')}}
      {{Form::number('price', '', ['step'=>'0.01', 'class'=>'form-control'])}}
    </div>

    <div class="form-group">
      <label for="colors-input">Color</label>
      <select id="colors-input" name="color_id" class="form-control">
        @foreach($colors as $color)
          <option value="{{ $color->id }}">{{ $color->name }}</option>
        @endforeach
      </select>
      <br>
      <label for="producents-input">Producent</label>
      <select id="producents-input" name="producent_id" class="form-control">
        @foreach($producents as $producent)
          <option value="{{ $producent->id }}">{{ $producent->name }}</option>
        @endforeach
      </select>
    </div>

    <hr>

    <div class="form-group">
      <div class="mt-5" id="root"></div>
    </div>

    <hr>

    <div class="form-group p-5">
      {!! Form::submit('Save', ['class'=>'btn btn-primary mr-5', 'id'=>'save-button']) !!}
      {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default']) !!}
    </div>
  {!! Form::close() !!}

@endsection
