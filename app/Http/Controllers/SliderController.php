<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    // Add Slider page
    public function addslider () {
        return view ('admin.addslider');
    }

    // Slider page
    public function sliders () {
        return view ('admin.sliders');
    }
}
