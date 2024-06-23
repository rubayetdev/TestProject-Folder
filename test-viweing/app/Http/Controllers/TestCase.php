<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Roles;
use Illuminate\Http\Request;

class TestCase extends Controller
{
    public function insert(Request $request)
    {
        Roles::create([
            'role' => $request->input('roles')
        ]);

        return redirect()->back();
    }

    public function permission(Request $request)
    {
        Permission::create([
            'permission_name' => $request->input('permission')
        ]);

        return redirect()->back();
    }

    public function product(Request $request)
    {
        return view('product');
    }

    public function order(Request $request){
        return view('order');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'roles' => 'required|exists:roles,id',
            'permission' => 'required|exists:permissions,id',
            'action' => 'required|in:View,Edit',
        ]);

        // Retrieve the selected role, permission, and action from the request
        $roleId = $request->input('roles');
        $permissionId = $request->input('permission');
        $action = $request->input('action');

        // Find the role and permission models based on the provided IDs
        $role = Roles::findOrFail($roleId);
        $permission = Permission::findOrFail($permissionId);

        // Depending on the selected action, assign or revoke the permission for the role
        if ($action === 'Read') {
            $role->permissions()->attach($permission);
        } else {
            $role->permissions()->detach($permission);
        }

        // Redirect back or return a response indicating success
        return redirect()->back()->with('success', 'Role permission updated successfully');
    }
}
