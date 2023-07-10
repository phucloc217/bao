<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('AdminPage.DanhSachNguoiDung', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        return view('AdminPage.ThemNguoiDung', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        if(!$request->user()->can('create user')) abort(403);

        $user = new User();
        $user->name = $request->name;
        $user->ngaysinh = $request->ngaysinh;
        $user->email = $request->email;
        $user->password = Hash::make(date('dmY',strtotime($request->ngaysinh)));
        $user->trangthai = 1;
        if($user->save()) return redirect()->route('user.create')->with('success', 'Thêm thành công');
        else return redirect()->back()->with('error', 'Thêm không thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        return view('AdminPage.UserInfomation',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data = User::find($id);
       $role = Role::all();
       $userRole = $data->getRoleNames()[0];
       return view('AdminPage.CapNhatNguoiDung',compact('data','role','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'ngaysinh' => 'date',
            'email' => 'required|email|unique:users,email,'.$user->id
        ],[
            'name.required' => 'Vui lòng nhập họ tên',
            'ngaysinh.date' => 'Sai định dạng ngày sinh',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Sai định dạng Email',
            'email.unique'=>'Email đã tồn tại'
        ]);
        $user->update($request->all());
        
        if ($user->save()) {
            return redirect()->route('user.edit', $id)->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('user.edit', $id)->with('error', 'Cập nhật không thành công');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}