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

    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;

        // Validação dos dados de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255', 
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('upload/slider/'.$name_gen));
            $save_url = 'upload/slider/'.$name_gen;

            Slider::find($slider_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
                'image' => $save_url,
            ]);
             $notification = array(
            'message' => 'Avaliação editada com sucesso!', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.review')->with($notification);

        }
        else{
            Review::find($rev_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
            ]);
             $notification = array(
            'message' => 'Avaliação editada com sucesso!', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.review')->with($notification);
        }
    }

}
