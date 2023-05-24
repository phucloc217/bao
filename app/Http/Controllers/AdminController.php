<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Baiviet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        // $user->assignRole('tacgia');
        //Role::create(['name'=>'admin']);
        // Permission::create(['name'=>'view category']);
         //$role = Role::findByName('tacgia');
        // $role->syncPermissions(['edit post','write post','view post','edit user']);
        // Permission::create(['name'=>'edit category']);
        // Permission::create(['name'=>'delete category']);
        // Permission::create(['name'=>'create category']);
        return view('AdminPage.index');
    }
    public function login()
    {
        if (Auth::check())
            return redirect('admin/');
        else
            return view('AdminPage.DangNhap');
    }
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'trangthai' => 1
        ];
        if (Auth::attempt($login))
            return redirect('admin/');
        else
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function UserInfo()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $baiviet = Baiviet::where('tacgia','=',$id)->get();
        return view('AdminPage.UserInfomation',compact('data','baiviet'));
    }
    public function NhomQuyen()
    {
        $role = Role::all();

        return view('AdminPage.DanhSachNhomQuyen',compact('role'));
    }
    public function ChiTietNhomQuyen($name)
    {
        $permissions = Permission::all();
        $role = Role::findByName($name);
        $RolePermissions = [];
        foreach($role->permissions as $item)
        {
            array_push($RolePermissions,$item->name);
        }
        return view('AdminPage.ChiTietNhomQuyen',compact('role','permissions','RolePermissions'));
    }
    public function CapNhatNhomQuyen(Request $request,$name)
    {
        $role= Role::findByName($name);
        $status = $role->syncPermissions($request->permissions);
        if($status) return redirect()->back()->with('success',"Cập nhật thành công");
        return redirect()->back()->with('error',"Cập nhật không thành công");
    }
}