<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
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
        // $user->assignRole('admin');
        //Role::create(['name'=>'admin']);
        // Permission::create(['name'=>'view category']);
        // $role = Role::findByName('admin');
        // $role->syncPermissions(Permission::all());
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
            'level' => 1,
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
    public function test()
    {
        return Hash::make('123');
    }
}