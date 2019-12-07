<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function get($path) {
        return response()->file('../storage/app/temp/' . $path);
    }

    public function store(Request $request) {
        if ($request->hasFile('image')) {
            $pathImage = $request->file('image')->store('temp');
            $url = substr($pathImage, 5);
            return response($url, 200);
        } else {
            return response('419', 419);
        }
    }
}
