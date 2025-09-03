<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ReviewController extends Controller
{
    public function AllReview()
    {
        $reviews = Review::latest()->get();
        return view('admin.backend.review.all_review', compact('reviews'));
        //compact serve para passar os dados para a view
         
    }  
    
    public function AddReview()
    {
        return view('admin.backend.review.add_review');
         
    }

    public function StoreReview(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255', 
            'message' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('upload/review/'.$name_gen));
            $save_url = 'upload/review/'.$name_gen;

            Review::create([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
                'image' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Avaliação adicionada com sucesso!', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.review')->with($notification);
    }

    public function EditReview($id)
    {
        $review = Review::find($id);
        return view('admin.backend.review.edit_review', compact('review'));
    }

    public function UpdateReview(Request $request)
    {
        $rev_id = $request->id;

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
            $img->resize(300,300)->save(public_path('upload/review/'.$name_gen));
            $save_url = 'upload/review/'.$name_gen;

            Review::find($rev_id)->update([
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

    public function DeleteReview($id){
        $item = Review::find($id);
        $img = $item->image;
        unlink($img);

        Review::find($id)->delete();
        $notification = array(
            'message' => 'Avaliação excluída com sucesso!', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}