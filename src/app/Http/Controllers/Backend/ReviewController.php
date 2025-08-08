<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

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
}