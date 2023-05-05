<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use App\Models\Danhmuc;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Baiviet::all();
        return view('AdminPage.DanhSachBaiViet',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chuyenmuc=Danhmuc::all();
        return view('AdminPage.ThemBaiViet',compact('chuyenmuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
