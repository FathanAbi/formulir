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
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'float_value' => 'required|numeric|between:2.50,99.99',
        ]);

        // Upload and store the image
        $imagePath = $request->file('image')->store('images');

        // Store form data in the database
        FormData::create([
            'input1' => $request->input('input1'),
            'input2' => $request->input('input2'),
            'input3' => $request->input('input3'),
            'image_path' => $imagePath,
            'float_value' => $request->input('float_value'),
        ]);

        return redirect('/')->with('success', 'Form data has been stored.');
    }

    public function display()
    {
        $formData = FormData::all();
        return view('display', ['formData' => $formData]);
    }
}
