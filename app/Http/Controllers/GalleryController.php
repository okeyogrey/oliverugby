<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::latest()->get(); // assuming a model
        return view('gallery.index', compact('images'));
    }
}
