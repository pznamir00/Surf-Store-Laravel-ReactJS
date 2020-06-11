@extends('layouts.app')

@section('title', '| Contact with us')

@section('content')

<strong>{{$data['email']}}</strong>

<hr>

<p>{{$data['subject']}}</p>

<p>{{$data['content']}}</p>

@endsection
