@extends('layouts.app')

@section('content')

<div class="container">
    <h2>My folders</h2><br/>
    @include('includes.messages')
    
    @foreach($directories as $folder)
        <h1>{{$folder}}</h1>
    @endforeach
</div>

@endsection