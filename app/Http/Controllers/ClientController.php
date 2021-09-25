<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{ 
    // Home Page
    public function home () {
        return view ('client.home');
    }
}
