<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view roles')->only(['index']);
        $this->middleware('permission:edit roles')->only(['edit']);
        $this->middleware('permission:create roles')->only(['create']);
        $this->middleware('permission:delete roles')->only(['destroy']);
    }
    // This method will show roles pages
    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(10);
        return view('admin.roles.list', [
            'roles' => $roles
        ]);
    }

    // This method will create roles
    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('admin.roles.create', [
            'permissions' => $permissions
        ]);
    }

    // This method will insert a roles in DB
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3'
        ]);

        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);

            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('roles.index')->with('success', 'Roles Added Successfully.');
        } else {
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }


    // This method will show edit a role page
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');

        $permissions = Permission::orderBy('name', 'ASC')->get();
        // dd($hasPermissions);
        return view('admin.roles.edit', [
            'permissions' => $permissions,
            'hasPermissions' => $hasPermissions,
            'role' => $role
        ]);
    }

    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:roles,name,' . $id . ',id'
        ]);

        if ($validator->passes()) {

            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }

            return redirect()->route('roles.index')->with('success', 'Roles Updated Successfully.');
        } else {
            return redirect()->route('roles.edit', $id)->withInput()->withErrors($validator);
        }
    }

    // This method will delete a roles in DB
    public function destroy(Request $request)
    {
        $id = $request->id;

        $role = Role::find($id);

        if ($role == null) {
            session()->flash('error', 'Role Not Found');
            return response()->json([
                'status' => false
            ]);
        }
        $role->delete();
        session()->flash('success', 'Role Deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }
}
