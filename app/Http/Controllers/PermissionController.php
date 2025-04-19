<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;//new in laravel 11
use Illuminate\Routing\Controllers\HasMiddleware;//new in laravel 11

class PermissionController extends Controller implements HasMiddleware //new in laravel 11(implements HasMiddleware)
{
    //all function and syntax is new in laravel 11
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view permission', only: ['index']),
            new Middleware('permission:create permission', only:['create','store']),
            new Middleware('permission:update permission', only: ['update','edit']),
            new Middleware('permission:delete permission', only: ['destroy']),
        ];
    }
    //old
    // $this->middleware('permission:view permission', ['only' => ['index']]);
    // $this->middleware('permission:create permission', ['only' => ['create','store']]);
    // $this->middleware('permission:update permission', ['only' => ['update','edit']]);
    // $this->middleware('permission:delete permission', ['only' => ['destroy']]);

    public function index()
    {
        $permissions = Permission::get();
        return view('role-permission.permission.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('status','Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        return view('role-permission.permission.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('status','Permission Updated Successfully');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permissions')->with('status','Permission Deleted Successfully');
    }
}