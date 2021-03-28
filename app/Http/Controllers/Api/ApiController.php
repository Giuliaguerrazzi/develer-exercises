<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class ApiController extends Controller
{
    public function apicomment() {

        $comments = Comment::all();
        return response()->json($comments);
    }
}
