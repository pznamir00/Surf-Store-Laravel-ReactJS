@extends('layouts.app')
@section('content')

  {!! Form::model($instance, ['action'=>['ProductController@update', $instance->id], 'method'=>'PUT', 'id'=>'main-form']) !!}
    @csrf
    <div class="form-group">
      {{Form::label('Title')}}
      {{Form::text('title', $instance->title, ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::label('Description')}}
      {{Form::textarea('description', $instance->description, ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::label('Price')}}
      {{Form::number('price', $instance->price, ['step'=>'0.01', 'class'=>'form-control'])}}
    </div>

    <div class="form-group">
      <label for="colors-input">Color</label>
      <select id="colors-input" name="color_id" class="form-control">
        <option value="none">None</option>
        @foreach($colors as $color)
          <option value="{{ $color->id }}" {{ $instance->color == $color ? 'selected' : '' }}>{{ $color->name }}</option>
        @endforeach
      </select>
      <br>
      <label for="producents-input">Producent</label>
      <select id="producents-input" name="producent_id" class="form-control">
        <option value="none">None</option>
        @foreach($producents as $producent)
          <option value="{{ $producent->id }}" {{ $instance->producent == $producent ? 'selected' : '' }}>{{ $producent->name }}</option>
        @endforeach
      </select>
    </div>

    <hr>

    <div class="form-group mt-5">
      <div id="cat-id" hidden>{{$instance->sub_category_id}}</div>
    </div>

    <hr>

    <div class="form-group">
      <div>
        @foreach($instance->sizes as $size)
          <input type="hidden" class="size-id" value="{{$size->size->id}}"/>
          <input type="hidden" class="size-qty" value="{{$size->quantity}}"/>
        @endforeach
      </div>
      <div class="mt-5" id="root"></div>
    </div>

    <hr>

    <div class="form-group p-5">
      {!! Form::submit('Update', ['class'=>'btn btn-primary mr-5', 'id'=>'save-button']) !!}
      {!! link_to(URL::previous(), 'Back', ['class'=>'btn btn-default']) !!}
    </div>

    <!-- removed images -->
    <div id="removed-images" hidden></div>

    @foreach($instance->images as $image)
      <input type="hidden" class="image-filename" value="{{$image->url}}"/>
    @endforeach

  {!! Form::close() !!}

@endsection
