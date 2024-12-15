<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view permissions')->only(['index']);
        $this->middleware('permission:edit permissions')->only(['edit']);
        $this->middleware('permission:create permissions')->only(['create']);
        $this->middleware('permission:delete permissions')->only(['destroy']);
    }

    // This method will show permission page
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.permission.list', [
            'permissions' => $permissions
        ]);
    }

    // This method will show create permission page
    public function create()
    {
        return view('admin.permission.create');
    }

    // This method will insert a permission in DB

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission Added Successfully.');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    // This method will show edit a permission page
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permission.edit', [
            'permission' => $permission
        ]);
    }

    // This method will update a permission
    public function update($id, Request $request)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,' . $id . ',id'
        ]);

        if ($validator->passes()) {
            $permission->name = $request->name;
            $permission->save();
            return redirect()->route('permissions.index')->with('success', 'Permission Updated Successfully.');
        } else {
            return redirect()->route('permission.edit', $id)->withInput()->withErrors($validator);
        }
    }


    // This method will delete a permission in DB
    public function destroy(Request $request)
    {
        $id = $request->id;

        $permission = Permission::find($id);

        if ($permission == null) {
            session()->flash('error', 'Permission Not Found');
            return response()->json([
                'status' => false
            ]);
        }
        $permission->delete();
        session()->flash('success', 'Permission Deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }
}
