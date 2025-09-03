<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Slider;

class SliderController extends Controller
{
    public function GetSlider(){
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider', compact('slider'));
    }
    

}
