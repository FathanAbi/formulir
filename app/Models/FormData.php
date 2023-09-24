<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    protected $fillable = ['input1', 'input2', 'input3', 'image_path', 'float_value'];
}