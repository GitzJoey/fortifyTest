<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userLists = User::latest()->get();
        return view('user')->with('userLists', $userLists);
    }

    public function crud(Request $request, ?User $user = null)
    {
        $mode = $user ? 'edit':'create';

        $roles = Role::get()->pluck('name', 'id');

        return view('user-crud')->with([
            'mode' => $mode,
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function create(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $roles = $request->roles
    }

    public function update(Request $request, User $user)
    {
        
    }

    public function delete(Request $request)
    {
        
    }
}
