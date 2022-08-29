<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permissionLists = Permission::latest()->get();

        return view('permission')->with('permissionLists', $permissionLists);
    }

    public function crud(Request $request, ?Permission $permission = null)
    {
        $mode = $permission ? 'edit':'create';

        return view('permission-crud')->with([
            'mode' => $mode,
            'permission' => $permission
        ]);
    }

    public function create(Request $request)
    {
        $name = $request->name;

        $p = new Permission();
        $p->name = $name;

        $p->save();

        return redirect()->route('permissions.index');
    }
}
