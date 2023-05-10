@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store']) !!}
    @csrf
    {!! Form::label('title', 'Title :') !!} 
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
    {!! Form::submit('create Post') !!}
    {!! Form::close() !!}



    @if((count($errors)) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection 
