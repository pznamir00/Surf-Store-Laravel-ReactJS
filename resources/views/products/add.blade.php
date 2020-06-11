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

    <hr>

    <div class="form-group mt-5">
      {{Form::label('Category')}}
      @foreach($categories as $cat)
        <div class="ml-5">
          <h6>{{$cat->title}}</h6>
            @foreach($subcategories as $subcat)
              @if($subcat->base_category_id == $cat->id)
                <input type="radio" id="subcat{{$subcat->id}}" name="category_id" value="{{$subcat->id}}"/>
                <label for="subcat{{$subcat->id}}">{{$subcat->title}}</label>
                <br/>
              @endif
            @endforeach
        </div>
      @endforeach
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
