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
        return $value;
    }
}
