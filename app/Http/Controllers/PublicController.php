<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;

class PublicController extends Controller
{
    public function index() {
        //ottenere i comment
        $comments = Comment::orderBy('created_at', 'desc')->get();

        return view ('guests.comment.index', compact('comments'));
    }

    public function show($slug) {

        $comments = Comment::where('slug', $slug)->first();
        
        if(empty($comment)) {
            abort('404');
        }

        return view ('guests.comment.show', compact('comments'));
    }
}
