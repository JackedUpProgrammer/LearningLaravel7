@extends('layouts.app')

@section('content')

<ul>

@foreach($posts as $post)


<br>
<li><a href="{{route('posts.show',$post->id)}}">{{ $post->title }}</a></li>
<div class="image-container">
    <img height="100" src="/images/{{ $post->path }}" alt="">
</div>
@endforeach
<br>

</ul>


@endsection
