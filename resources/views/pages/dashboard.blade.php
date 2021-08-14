@extends('layouts.app')

@section('content')

<h1>this is home page where all photos will be visible</h1>
    {{-- <img 
    src="{{ asset('images/').$photo->image_path }}" 
    alt="no pic"> --}}

    @forelse ($photos as $photo)

    <p>Title: {{ $photo->title }}</p> 
    <p>Username: {{ $photo->user->name }}</p>
    <img 
    src="{{ asset('images/'.$photo->image_path) }}" 
    alt="no pic"> 

<hr>
@empty
<p>No posts for this user</p>
@endforelse
@endsection