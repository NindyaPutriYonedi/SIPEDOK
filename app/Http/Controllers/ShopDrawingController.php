<?php

namespace App\Http\Controllers;

use App\Models\ShopDrawing;

class ShopDrawingController extends Controller
{
    public function index()
    {
        $data = ShopDrawing::all();

        return view('mc0.index', compact('data'));
    }
}
