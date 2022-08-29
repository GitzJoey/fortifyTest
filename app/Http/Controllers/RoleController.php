<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roleLists = Role::latest()->get();

        return view('role')->with('roleLists', $roleLists);
    }

    public function crud(Request $request, ?Role $role = null)
    {
        $mode = $role ? 'edit':'create';

        $permissions = Permission::pluck('name', 'id');

        $selectedPermissions = $role ? $role->permissions->pluck('id') : null;

        return view('role-crud')->with([
            'mode' => $mode, 
            'role' => $role,
            'permissions' => $permissions,
            'selectedPermissions' => $selectedPermissions
        ]);
    }
    
    public function create(Request $request)
    {
        $name = $request->name;


    }

    public function update(Request $request)
    {
        
    }

    public function delete(Request $request)
    {
        
    }

}
