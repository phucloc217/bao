<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->can('view role'))
            return abort(403);
        $role = Role::where('name', '!=', 'admin')->get();

        return view('AdminPage.DanhSachNhomQuyen', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can('create role'))
            return abort(403);

        $permissions = Permission::all();

        return view('AdminPage.ThemNhomQuyen', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        if (!$request->user()->can('create role'))
            abort(403);
        $role = Role::create(['name' => $request->name]);
        $status = $role->syncPermissions($request->permissions);
        if ($status)
            return redirect()->back()->with('success', "Thêm thành công");
        return redirect()->back()->with('error', "Thêm không thành công");
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
    public function edit(string $name)
    {
        if (!Auth::user()->can('edit role'))
            return abort(403);
        $permissions = Permission::all();
        $role = Role::findByName($name);
        $RolePermissions = [];
        foreach ($role->permissions as $item) {
            array_push($RolePermissions, $item->name);
        }
        return view('AdminPage.ChiTietNhomQuyen', compact('role', 'permissions', 'RolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $name)
    {
        if (!$request->user()->can('edit role'))
            return abort(403);
        $role = Role::findByName($name);
        $status = $role->syncPermissions($request->permissions);
        if ($status)
            return redirect()->back()->with('success', "Cập nhật thành công");
        return redirect()->back()->with('error', "Cập nhật không thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
        if (!Auth::user()->can('delete role'))
            return abort(403);
        $role = Role::findByName($name);
        if ($role->name != 'admin') {
            $status = $role->delete();
            if ($status)
                return redirect()->back()->with('success', "Xóa thành công");
            return redirect()->back()->with('error', "Xóa không thành công");
        }

    }
}