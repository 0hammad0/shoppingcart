<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\slider;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use App\Cart;
use Session;

class ClientController extends Controller
{ 
    // Home Page
    public function home () {
        $product = Products :: all() -> where ('status', 1);

        $slider = slider :: all() -> where ('status', 1);

        return view ('client.home', compact ('product', 'slider'));
    }

    // Shop page
    public function shop () {
        $product = Products :: all() -> where ('status', 1);
        
        $categories = Category :: all();

        return view ('client.shop', compact ('product', 'categories'));
    }

    // Cart page
    public function cart () {
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        
        return view ('client.cart', ['products' => $cart->items]);
    }

    // Checkout page
    public function checkout () {
        if(!Session::has('client')){
            return view ('client.login');
        }
        return view ('client.checkout');
    }

    // Login page
    public function login () {
        return view ('client.login');
    }

    // Signup page
    public function signup () {
        return view ('client.signup');
    }

    // Create Account Function
    public function create_account (Request $request) {
        $this->validate($request, [
            'email' => 'email|required|unique:clients',
            'password' => 'required|min:6'
        ]);

        $client = new Client();

        $client -> email = $request -> email;
        $client -> password = bcrypt($request -> password);
        $client -> save();

        return back() -> with ('status', 'Account Registered');
    }

    // Access Acount Function
    public function access_account (Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:6'
        ]);

        $client = Client::where ('email', $request->email)->first();

        if ($client) {
            if(Hash::check($request->password, $client->password)){
                Session::put('client', $client);
                return redirect('/shop');
            } else {
                return back()->with('status', 'Wrong email or password');
            }
        } else {
            return back()->with("status", "You don't have Account with this email");
        }
    }

    // logout Function
    public function logout () {
        Session::forget('client');

        return redirect('/shop');
    }

    // Order Page from admin dashboard
    public function orders () {
        return view ('admin.orders');
    }

    // Add To Cart Function
    public function addtocart ($id) {
        $product = Products::find($id);
        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        // dd(Session::get('cart'));
        return back();
    }

    // update Product Function
    public function update_qty (Request $request, $id) {
        //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        $cart->updateQty($id, $request->quantity);

        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return back();
    }

    // Delete Product Function 
    public function remove_from_cart ($id) {
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return back();
    }
}
