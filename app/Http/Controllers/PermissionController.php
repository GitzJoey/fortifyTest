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
        return view('permission');
    }

    public function crud(Request $request, Permission $permission)
    {
        $mode = 'create';
        return view('permission-crud')->with('mode', $mode);
    }

    public function create(Request $request)
    {

    }

    public function update(Request $request)
    {
        
    }

    public function delete(Request $request)
    {
        
    }

}
