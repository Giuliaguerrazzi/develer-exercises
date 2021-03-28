@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comments</h1>

    <!-- nel caso in cui non ci siano commenti -->
    @if($comments->isEmpty())

        <p>Non ci sono ancora commenti</p>

    @else 

        @foreach ($comments as $comment)
            <article class='mb-5'>
            <h2>{{$comment->title}}</h2>
                <div class='info'>
                by {{$comment->user->name}}
                    <div class='date'>{{$comment->updated_at->diffForHumans()}}</div>
                </div>
                <p>{{$comment->body}}</p>
              
            </article>
        @endforeach

    @endif        
</div>
@endsection
