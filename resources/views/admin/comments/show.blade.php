@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comments</h1>

    <h2>{{$comments->title}}</h2>
    <p>{{$comments->body}}</p>
         
</div>
@endsection
