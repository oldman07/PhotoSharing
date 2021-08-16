@extends('layouts.app')


@section('content')
<div class="container">
<h1>Upload</h1>

<h2>here you will create new memories</h2>


 {{-- Discussion template   --}}
    
 <form action="/upload" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" >
      <span class="text-danger">@error('email'){{ $message }} @enderror</span>

    </div>
    <div class="form-group">
      <input type="file" name="image">
      <span class="text-danger">@error('image'){{ $message }} @enderror</span>
    </div>
   
    <button type="submit" class="btn btn-primary">{{__('profile.Submit')}}</button>
  </form>

</div> 
@endsection