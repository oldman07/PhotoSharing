@extends('layouts.app')

@section('content')

<h1>this is home page where all photos will be visible</h1>
    {{-- <img 
    src="{{ asset('images/').$photo->image_path }}" 
    alt="no pic"> --}}

    @forelse ($photos as $photo)

    <p>Title: {{ $photo->title }}</p> 
    <p>link: {{ $photo->link }}</p> 
    <p>Username: {{ $photo->user->name }}</p>
    <img 
    src="{{ asset('images/'.$photo->image_path) }}" 
    alt="no pic"> 
    <a href="{{url('/download',$photo->image_path)}}">Download</a>

<hr>
@empty
<p>No posts for this user</p>
@endforelse
@endsection