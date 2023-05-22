<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChuyenMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('view category'))
            abort(403);
        $data = Danhmuc::all();
        return view('AdminPage.DanhSachChuyenMuc', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('create category'))
            abort(403);
        return view('AdminPage.ThemChuyenMuc');
    }
    public function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        $str = preg_replace('/\s/', '', $str);
        return $str;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('create category'))
            abort(403);
        if (isset($request->tenchuyenmuc)) {

            //Chuẩn hóa chữ
            $tenchuyenmuc = trim($request->tenchuyenmuc);
            $tenchuyenmuc = ucwords($tenchuyenmuc);

            //Tạo chuyên mục mới
            $chuyenmuc = new Danhmuc;
            $chuyenmuc->tendanhmuc = $tenchuyenmuc;

            //KiểM tra user có Post slug lên hay không nếu không thì tạo dựa trên tên chuyên mục
            if (isset($request->slug)) {
                $chuyenmuc->slug = $request->slug;
            } else {
                $slug = $this->to_slug($tenchuyenmuc);
                $chuyenmuc->slug = $slug;
            }

            //Kiểm tra tên chuyên mục tồn tại hay chưa
            $checkChuyenMuc = Danhmuc::where('tendanhmuc', 'LIKE', $tenchuyenmuc)->get();

            //Kiểm tra slug đã tồn tại hay chưa
            $checkSlug = Danhmuc::where('slug', 'LIKE', $chuyenmuc->slug)->get();

            //Nếu chưa tiến hành lưu, ngược lại thông báo
            if ($checkChuyenMuc->isEmpty()) {
                if ($checkSlug->isEmpty()) {
                    if ($chuyenmuc->save()) {
                        return redirect()->route('chuyenmuc.create')->with('success', 'Thêm thành công');
                    } else {
                        return redirect()->route('chuyenmuc.create')->with('error', 'Thêm không thành công');
                    }
                } else {
                    return redirect()->route('chuyenmuc.create')->with('error', 'Slug đã tồn tại');
                }
            } else {
                return redirect()->route('chuyenmuc.create')->with('error', 'Tên chuyên mục đã tồn tại');
            }

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
        if (!Auth::user()->can('edit category'))
            abort(403);
        $data = Danhmuc::find($id);
        return view('AdminPage.CapNhatChuyenMuc', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->can('edit category'))
            abort(403);
        $chuyenmuc = Danhmuc::find($id);
        if ($chuyenmuc != null) {
            if (isset($request->tenchuyenmuc)) {

                //Chuẩn hóa chữ
                $tenchuyenmuc = trim($request->tenchuyenmuc);
                $tenchuyenmuc = ucwords($tenchuyenmuc);

                //Kiểm tra tên chuyên mục tồn tại hay chưa
                $checkChuyenMuc = Danhmuc::where('tendanhmuc', 'LIKE', $tenchuyenmuc)->where('id', '!=', $id)->get();

                //Kiểm tra slug đã tồn tại hay chưa
                $checkSlug = Danhmuc::where('id', '!=', $id)->where('slug', 'LIKE', $request->slug)->get();

                //Nếu chưa tiến hành lưu, ngược lại thông báo
                if ($checkChuyenMuc->isEmpty()) {
                    if ($checkSlug->isEmpty()) {
                        //Gắn tên danh mục
                        $chuyenmuc->tendanhmuc = $tenchuyenmuc;

                        //Gắn slug
                        $chuyenmuc->slug = $request->slug;

                        //lưu
                        if ($chuyenmuc->save()) {
                            return redirect()->route('chuyenmuc.edit', $id)->with('success', 'Cập nhật thành công');
                        } else {
                            return redirect()->route('chuyenmuc.edit', $id)->with('error', 'Cập nhật không thành công');
                        }
                    } else {
                        return redirect()->route('chuyenmuc.edit', $id)->with('error', 'Slug đã tồn tại');
                    }
                } else {
                    return redirect()->route('chuyenmuc.edit', $id)->with('error', 'Tên chuyên mục đã tồn tại');
                }

            } else {
                return redirect()->route('chuyenmuc.edit', $id)->with('error', 'Bạn phải nhập vào tên chuyên mục');
            }
        } else {
            return 0;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chuyenmuc = Danhmuc::find($id);
        if ($chuyenmuc != null) {
            if ($chuyenmuc->delete()) {
                return redirect()->route('chuyenmuc.index')->with('success', 'Xóa thành công');
            } else {
                return redirect()->route('chuyenmuc.index')->with('error', 'Xóa không thành công');
            }
        } else {
            return redirect()->route('chuyenmuc.index')->with('error', 'Không tìm thấy chuyên mục này');
        }
    }
}