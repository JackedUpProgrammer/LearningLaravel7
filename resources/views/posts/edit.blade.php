@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>
{!! Form::model($post,['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
@csrf
{!! Form::label('title', 'Title :') !!} 
{!! Form::text('title', null, ['class'=>'form-control']) !!}
{!! Form::submit('Update Post') !!}
{!! Form::close() !!}



<h1>Delete Post</h1>
{!! Form::model($post,['method'=>'DELETE', 'action'=>['PostsController@update', $post->id]]) !!}
@csrf
{!! Form::submit('Delete Post') !!}
{!! Form::close() !!}

@endsection

