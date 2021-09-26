<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin/Dash board page
    public function admin () {
        return view ('admin.dashboard');
    }
}
