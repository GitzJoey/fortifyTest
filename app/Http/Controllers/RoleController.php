<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('role');
    }

    public function crud(Request $request, Role $role)
    {
        $mode = 'create';



        return view('role-crud')->with('mode', $mode);
    }

    public function list(Request $request)
    {

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
