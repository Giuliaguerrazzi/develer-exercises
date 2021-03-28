<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //vista utenti non registrati
    public function index() {
        return view('guests.home');
    }
}
