<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
     public function uploadForm()
    {
        return view('upload_form');
    }

    // public function uploadSubmit(Request $request)
    // {
    //     // Coming soon...
    // }

    public function uploadSubmit(UploadRequest $request)
    {
        $product = Product::create($request->all());
        foreach ($request->photos as $photo) {
            $filename = $photo->store('data_education');
            ProductsPhoto::create([
                'product_id' => $product->id,
                'filename' => $filename
            ]);
        }
        return 'Upload successful!';
    }
}
