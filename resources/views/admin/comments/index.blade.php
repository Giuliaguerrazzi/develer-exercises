@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comments</h1>

    <!-- nel caso in cui non ci siano commenti -->
    @if($comments->isEmpty())

        <p>Non ci sono ancora commenti</p>

    @else 
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created</th>
                    <th colspan="3"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->title}}</td>
                        <td>{{$comment->created_at->format('d/m/Y')}}</td>

                        <td>
                            <a href="{{route('admin.comments.show', $comment->id)}}" class="btn btn-success">Show</a>
                        </td>
                        <td>
                            <a href="{{route('admin.comments.edit', $comment->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    @endif        
</div>
@endsection
