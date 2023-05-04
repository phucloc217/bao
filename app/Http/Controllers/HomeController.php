<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $danhmuc=Danhmuc::all();
        return view('index',compact('danhmuc'));
    }
}
