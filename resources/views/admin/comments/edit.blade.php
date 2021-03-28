@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit comment</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.comments.update', $comments->id)}}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="title"> Title</label>
        <input class='form-control' type="text" id="title" name="title" value="{{old('title', $comments->title)}}">
    </div>
    
    <div class="form-group">
        <label for="body">Content</label>
        <textarea class="form-control" id="body" name="body">{{ old('body', $comments->body) }}</textarea>
    </div>
    
    <input class='btn btn-primary' type="submit" value="Edit Post">

    </form>
</div>
@endsection