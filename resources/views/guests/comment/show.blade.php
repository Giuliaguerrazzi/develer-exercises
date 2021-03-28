@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$comment->title}}</h1>

    <div>{{$comment->body}}</div>
</div>
@endsection
