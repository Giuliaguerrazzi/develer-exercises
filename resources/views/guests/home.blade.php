@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Home Page</h1>

    <section id="app">
        <ul>
            <li v-for='comment in comments'>
                <h2>@{{comment.title}}</h2>
                <div>@{{comment.body}}</div>
             
            </li>
        </ul>
    </section>

@endsection


  <script src="{{asset('js/app.js')}}"></script>
