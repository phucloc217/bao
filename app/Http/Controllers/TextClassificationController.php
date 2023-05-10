<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Locng\TextClassification\TextClassification;

class TextClassificationController extends Controller
{
    public function test()
    {
        return TextClassification::event("test",123);
    }
}
