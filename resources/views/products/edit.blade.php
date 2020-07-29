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

    <hr>

    <div class="form-group mt-5">
      <div id="cat-id" hidden>{{$instance->category_id}}</div>
      {{Form::label('Category')}}
      @foreach($categories as $cat)
        <div class="ml-5">
          <h6>{{$cat->title}}</h6>
            @foreach($cat->subcategories as $subcat)
                <input type="radio" id="subcat{{$subcat->id}}" name="category_id" value="{{$subcat->id}}"/>
                <label for="subcat{{$subcat->id}}">{{$subcat->title}}</label>
                <br/>
            @endforeach
        </div>
      @endforeach
    </div>

    <hr>

    <div class="form-group">
      <div>
        @foreach($instance->sizes as $size)
          <input type="hidden" class="size-value" value="{{$size->value}}"/>
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
