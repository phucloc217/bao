<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use App\Models\Danhmuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $danhmuc = Danhmuc::all();
        return view('index', compact('danhmuc'));
    }

    public function loadUrl($slug)
    {
        $danhmuc = Danhmuc::all();
        $url = explode('-post', $slug);
        if (count($url) == 1) {
            $check = Danhmuc::where('slug', 'LIKE', $slug)->first();
            if ($check != null) {
                $data = Baiviet::where('danhmuc', '=', $check->id)->where('trangthai', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
                return view('ChuyenMuc', compact('danhmuc', 'check', 'data'));
            }
        } else {

            $data = Baiviet::where('slug', 'LIKE', $url)->first();
            return view('ChiTietBaiViet', compact('danhmuc', 'data'));
        }
    }
}