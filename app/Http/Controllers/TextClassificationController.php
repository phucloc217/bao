<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Locng\TextClassification\TextClassification;

class TextClassificationController extends Controller
{
    public function predict(Request $request)
    {
        $text = $request->text;
        $value = TextClassification::predict($text);
        $value = json_decode($value);
        $label = $value->label;
        // return ucwords($label[0].', '.$label[1].', '.$label[2]);
        return ucwords($label[0]);
    }
}
