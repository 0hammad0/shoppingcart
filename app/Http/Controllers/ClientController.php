<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{ 
    // Home Page
    public function home () {
        return view ('client.home');
    }

    //Shop page
    public function shop () {
        return view ('client.shop');
    }

    //Cart page
    public function cart () {
        return view ('client.cart');
    }

    //Checkout page
    public function checkout () {
        return view ('client.checkout');
    }
}
