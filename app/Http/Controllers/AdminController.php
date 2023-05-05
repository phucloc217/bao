<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('AdminPage/index');
    }
    public function login()
    {
        return view('AdminPage/DangNhap');
    }
}
