<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;

class SliderController extends Controller
{
    // Add Slider page
    public function addslider () {
        $slider = Slider :: all();
        return view ('admin.addslider', compact ('slider'));
    }

    // Slider page
    public function sliders () {
        $slider = Slider :: all();
        return view ('admin.sliders', compact ('slider'));
    }

    // FUNCTIONS

    // Add Sliders Function
    public function saveslider (Request $request) {
        $slider = new Slider;

        $this -> validate($request, [
            'description1' => 'Required',
            'description2' => 'Required',
            'slider_image' => 'image|nullable|max:1999'
        ]);

        $slider -> description1 = $request -> description1;
        $slider -> description2 = $request -> description2;

        $image = $request-> file ('slider_image');
        $fileNameWithExt = $image ->getClientOriginalName() ;
        $fileName = pathinfo ($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $image->move('slider_images', $fileNameToStore);

        $slider -> slider_image = $fileNameToStore;

        $slider -> status = 1;

        $slider -> save();

        return redirect ('/addslider') -> with ('status', 'Slider has been Saved.');    
    }

    // Sliders Activate Function
    public function activate_deactivate_slider ($id) {
        $slider = Slider :: find($id);

        if ($slider -> status == 0) {
            $slider -> status = 1;
            Session::put('status', 'Slider has been Activated.');
        } else {
            $slider -> status = 0;
            Session::put('status2', 'Slider has been Deactivated.');
        }

        $slider -> update();


        return redirect('/sliders');
    }

    // Delete Slider Function
    public function deleteslider ($id) {
        $slider = Slider :: find($id);

        $slider -> delete();
        $slider -> delete('slider_images', $slider -> slider_image);

        return redirect ('/sliders') -> with ('status', 'Slider has been Deleted.');
    }

    // Edit Slider Page 
    public function editslider ($id) {
    $slider = Slider :: find ($id);

    return view ('admin.update_slider', compact ('slider'));
    }

    // Update Slider Function 
    public function updateslider (Request $request) {
        $slider = Slider :: find ($request -> input ('id'));

        $this -> validate($request, [
            'description1' => 'Required',
            'description2' => 'Required',
            'slider_image' => 'image|nullable|max:1999'
        ]);

        $slider -> description1 = $request -> description1;
        $slider -> description2 = $request -> description2;

        $image = $request-> file ('slider_image');
        $fileNameWithExt = $image ->getClientOriginalName() ;
        $fileName = pathinfo ($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $image->move('slider_images', $fileNameToStore);

        $slider -> slider_image = $fileNameToStore;

        $slider -> status = 1;

        $slider -> update();
    
        return redirect ('/sliders') -> with ('status', 'Slider has been Updated.');
        }
}
