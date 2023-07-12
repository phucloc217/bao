<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use App\Models\Danhmuc;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        if (Auth::user()->hasRole('admin'))
            $data = Baiviet::all();
        else
            $data = Baiviet::where('tacgia', '=', Auth::user()->id);
        return view('AdminPage.DanhSachBaiViet', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('write post'))
            abort(403);
        $chuyenmuc = Danhmuc::all();
        return view('AdminPage.ThemBaiViet', compact('chuyenmuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('write post'))
            abort(403);
        $validated = $request->validate([
            'tieude' => 'required|unique:baiviet|max:255',
            'noidung' => 'required',
            'anh' => 'image'
        ]);
        $anh = 'assets/img/default.jpg';
        if ($request->anh != '') {
            $url = $request->file('anh')->store('public/anhbaiviet');
            $anh = substr($url, strlen('public/'));
        }
        $baiviet = new Baiviet;
        $baiviet->tieude = $request->tieude;
        $baiviet->tomtat = $request->tomtat;
        $baiviet->noidung = $request->noidung;
        $baiviet->slug = SlugService::createSlug(Baiviet::class, 'slug', $request->tieude);
        $request->chuyenmuc == '' ? $baiviet->danhmuc = null : $baiviet->danhmuc = $request->chuyenmuc;
        $baiviet->anh = $anh;
        $baiviet->tacgia = $request->user()->id;
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
        if (!Auth::user()->can('edit post'))
            abort(403);
        $chuyenmuc = Danhmuc::all();
        $baiviet = Baiviet::find($id);
        return view('AdminPage.CapNhatBaiViet', compact('chuyenmuc', 'baiviet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $baiviet = Baiviet::find($id);
        if (!Gate::allows('update-post', $baiviet))
            abort(403);
        $validated = $request->validate([
            'tieude' => 'required|max:255',
            'noidung' => 'required',

        ]);
        $anh = $baiviet->anh;
        if ($request->anh != '') {
            $url = $request->file('anh')->store('public/anhbaiviet');      
            $anh = substr($url, strlen('public/'));
        }
        $baiviet->tieude = $request->tieude;
        $baiviet->tomtat = $request->tomtat;
        $baiviet->noidung = $request->noidung;
        $baiviet->slug = SlugService::createSlug(Baiviet::class, 'slug', $request->tieude);
        $request->chuyenmuc == '' ? $baiviet->danhmuc = null : $baiviet->danhmuc = $request->chuyenmuc;
        $baiviet->anh = $anh;
        $request->trangthai == 1 ? $baiviet->trangthai = 1 : $baiviet->trangthai = 0;
        if ($baiviet->save()) {
            return redirect()->route('baiviet.edit', $id)->with('success', 'Câp nhật thành công');
        } else {
            return redirect()->route('baiviet.edit', $id)->with('error', 'Cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->can('delete post'))
            abort(403);
        $baiviet = Baiviet::find($id);
        if ($baiviet != null) {
            if ($baiviet->delete()) {
                return redirect()->route('baiviet.index')->with('success', 'Xóa thành công');
            } else {
                return redirect()->route('baiviet.index')->with('error', 'Xóa không thành công');
            }
        } else {
            return redirect()->route('baiviet.index')->with('error', 'Không tìm thấy chuyên mục này');
        }
    }

    public function changeStatus($id) {
        $baiviet = Baiviet::find($id);
        if ($baiviet != null) {
            if($baiviet->trangthai) $baiviet->trangthai=0 ;
            else $baiviet->trangthai=1;
            if ($baiviet->save()) {
                return redirect()->route('baiviet.index')->with('success', 'Đổi trạng thái thành công');
            } else {
                return redirect()->route('baiviet.index')->with('error', 'Đổi trạng thái không thành công');
            }
        } else {
            return redirect()->route('baiviet.index')->with('error', 'Không tìm thấy chuyên mục này');
        }
    }
}