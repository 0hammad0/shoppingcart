<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use Session;

class ProductController extends Controller
{
    // Add Product page
    public function addproduct () {
        $categories = Category :: all() -> pluck ('category_name', 'category_name');

        return view ('admin.addproduct', compact ('categories'));
    }

    // Product page
    public function products () {
        $product = Products :: all ();
        return view ('admin.products', compact('product'));
    }

    // FUNCTIONS

    // Adding product functon
    public function saveporduct (Request $request){
        $product = new Products;

        $this -> validate ($request, [
            'product_name' => 'Required',
            'product_price' => 'Required',
            'product_category' => 'Required',
            'product_image' => 'image|nullable|max:1999'
        ]);

        $image = $request-> file ('product_image');

        if($request->hasFile('product_image')){
            $fileNameWithExt = $image ->getClientOriginalName() ;

            $fileName = pathinfo ($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $image->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $image->move('product_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product -> product_name = $request -> product_name;
        $product -> product_price = $request -> product_price;
        $product -> product_category = $request -> product_category;
        $product -> product_image = $fileNameToStore;

        $product -> save();

        return back() -> with ('status', 'Product has been Added.');
        // print ('this is '.$request -> product_category);
    }

    // Edit Product Function
    public function editproduct ($id) {
        $product = Products :: find ($id);
        $categories = Category ::all () -> pluck ('category_name', 'category_name');

        return view ('admin.edit_product', compact ('product', 'categories'));
    }

    // Updating Product Function
    public function updateproduct (Request $request) {
        $product = Products :: find ($request -> input('id'));
        $this -> validate ($request, [
            'product_name' => 'Required',
            'product_price' => 'Required',
            'product_category' => 'Required',
            'product_image' => 'image|nullable|max:1999'
        ]);

        $image = $request-> file ('product_image');

        if($request->hasFile('product_image')){
            $fileNameWithExt = $image ->getClientOriginalName() ;

            $fileName = pathinfo ($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $image->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $image->move('product_images', $fileNameToStore);

            $product -> product_name = $request -> product_name;
            $product -> product_price = $request -> product_price;
            $product -> product_category = $request -> product_category;
            $product -> product_image = $fileNameToStore;
        }else{
            $product -> product_name = $request -> product_name;
            $product -> product_price = $request -> product_price;
            $product -> product_category = $request -> product_category;
            // $product -> product_image = $fileNameToStore;
        }

        $product -> update();

        return redirect('/products') -> with ('status', 'Product has been Updated.');
    }

    // Deleting Product Function
    public function deleteproduct ($id) {
        $product = Products :: find ($id);

        $product -> delete();

        return redirect ('/products') -> with ('status', 'Product has been Deleted.');
    }

    // Product Activate Function
    public function activate_deactivate_product ($id) {
        $product = Products :: find($id);

        if ($product -> status == 0) {
            $product -> status = 1;
            Session::put('status', 'Product '.$product -> product_name.' has been Activated');
        } else {
            $product -> status = 0;
            Session::put('status2', 'Product '.$product -> product_name.' has been deactivated');
        }

        $product -> update();


        return redirect('/products');
    }
}
