<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    // Add category page
    public function addcategory () {
        return view ('admin.addcategory');
    }

    // Categories page
    public function categories () {
        $categories = Category::all();

        return view ('admin.categories') -> with ('categories', $categories);
    }

    // FUNCTIONS

    // Save Category Function
    public function savecategory (Request $request) {
        $this -> validate($request, ['category_name' => 'required|unique:categories']);

        $category = new Category();

        $category -> category_name = $request -> category_name;

        $category -> save();

        return back() -> with ('status', 'Category name has been successfully saved.');
    }

    // Edit Category page 
    public function editcategory ($id) {
        $category = Category::find($id);

        return view ('admin.edit_category') -> with ('category', $category);
    }

    // Update Category Function
    public function updatecategory (Request $request) {
        // samaj aii? nai
        $this -> validate($request, ['category_name' => 'required']);

        // ye id ni aa rhi thi. samaj aii? han agye. blade ma id ki value sae set ni ki thi
        $category = Category::find($request -> input ('id'));

        $category -> category_name = $request -> category_name;

        $category -> update();

        return redirect ('/categories') -> with ('status', 'Category has been updated.');
    }

    // Delete Category Function
    public function deletecategory ($id){
        $category = Category :: find ($id);

        $category -> delete();

        return redirect('/categories') -> with ('status', 'Category has been removed.');
    }
}
