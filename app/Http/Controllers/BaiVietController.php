<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use App\Models\Danhmuc;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Baiviet::all();
        return view('AdminPage.DanhSachBaiViet', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chuyenmuc = Danhmuc::all();
        return view('AdminPage.ThemBaiViet', compact('chuyenmuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tieude' => 'required|unique:baiviet|max:255',
            'noidung' => 'required',
        ]);
        $baiviet = new Baiviet;
        $baiviet->tieude = $request->tieude;
        $baiviet->tomtat = $request->tomtat;
        $baiviet->noidung = $request->noidung;
        $baiviet->slug = SlugService::createSlug(Baiviet::class, 'slug', $request->tieude);
        $request->chuyenmuc == '' ? $baiviet->danhmuc = null : $baiviet->danhmuc = $request->chuyenmuc;
        $request->anh == '' ? $baiviet->anh = 'default.jpg' : $baiviet->anh = $request->anh;
        $request->trangthai == 1 ? $baiviet->trangthai = 1 : $baiviet->trangthai = 0;
        if ($baiviet->save()) {
            return redirect()->route('baiviet.create')->with('success', 'Thêm thành công');
        } else {
            return redirect()->route('baiviet.create')->with('error', 'Thêm không thành công');
        }
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