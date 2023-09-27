<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class FormDataController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'input1' => 'required|string',
            'input2' => 'required|string',
            'input3' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'float_value' => 'required|numeric|between:2.50,99.99',
        ]);
    
        // Upload and store the image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
        } else {
            $imagePath = null; // Set image_path to null if no image was uploaded
        }
        
    
        // Store form data in the database
        $formData = FormData::create([
            'input1' => $request->input('input1'),
            'input2' => $request->input('input2'),
            'input3' => $request->input('input3'),
            'float_value' => $request->input('float_value'),
            'image_path' => $imagePath,
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
            // Update the image_path in the database to the public path
            $formData->update(['image_path' => $imagePath]);
        }

        if ($formData) {
            return redirect('/')->with('success', 'Succes');
        } else {
            return redirect('/')->with('failed', 'Failed to store form data.');
        }
    }

    public function display()
    {
        $formData = FormData::all();
        return view('display', ['formData' => $formData]);
    }
}
