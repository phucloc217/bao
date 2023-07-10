<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Baiviet;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
        $user = Auth::user();
         
        //  $user->removeRole('tacgia');
        //  $user->assignRole('admin');
        //Role::create(['name'=>'admin']);
        //  Permission::create(['name'=>'create role']);
        //  Permission::create(['name'=>'edit role']);
        //  Permission::create(['name'=>'view role']);
        //  Permission::create(['name'=>'delete role']);
        //  $role = Role::findByName('admin');
        //  $role->syncPermissions(Permission::all());
        // Permission::create(['name'=>'edit category']);
        // Permission::create(['name'=>'delete category']);
        // Permission::create(['name'=>'create category']);
        $countBaiViet = Baiviet::count();
        $countTacGia = User::count();
        return view('AdminPage.index', compact('countBaiViet','countTacGia'));
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
    
  

    public function test()
    {
        // ini_set('max_execution_time', 18000);
        $data = Baiviet::all();
        foreach ($data as $item) {
            $item->slug = SlugService::createSlug(Baiviet::class, 'slug', $item->tieude);
            $item->save();
        }
        return 1;
    }
}