<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use App\Models\Danhmuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $danhmuc=Danhmuc::where('trangthai','=','1')->get();
        return view('index',compact('danhmuc'));
    }

    public function loadUrl($slug)
    {
        $danhmuc=Danhmuc::all();
        
        if(!preg_match("/[0-9]$/", $slug))
        {
        $check = Danhmuc::where('slug','LIKE',$slug)->first();
        $data = Baiviet::where('danhmuc','=',$check->id)->orderBy('created_at','desc')->paginate(10);
        return view('ChuyenMuc',compact('danhmuc','check','data'));
        }
        else
        {
            $url =  explode( '-post', $slug ) ;
            $data = Baiviet::where('slug','LIKE',$url)->first();
            return view('ChiTietBaiViet',compact('danhmuc','data'));
        }
    }
}
