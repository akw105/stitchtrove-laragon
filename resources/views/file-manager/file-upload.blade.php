@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Laravel Upload Image to Amazon s3 cloud Storage Tutorial</h2><br/>
    @include('includes.messages')
    <form method="post" action="{{url('store')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="form-group col-md-4">
            <input type="text" name="pattern_name">

        <input type="text" name="user_id" value="{{Auth::user()->id}}">
        </div>
        <div class="form-group col-md-4">
          <input type="file" name="file">    
       </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
      </div>
    </form>
  </div>

@endsection