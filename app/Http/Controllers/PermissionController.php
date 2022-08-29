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

    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->name;

        $p = Permission::find($id);

        if ($p) {
            $p->update([
                'name' => $name,
            ]);
        }

        return redirect()->route('permissions.index');        
    }

    public function delete(Request $request)
    {
        return redirect()->route('permissions.index');
    }

}
