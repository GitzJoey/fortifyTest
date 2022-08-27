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
        $roles = $request->roles;
        
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->save();

        $role = Role::find($roles);

        $user->assignRole($role);

        return redirect()->route('users.index');
    }

    public function update(Request $request)
    {
        $uuid = $request->uuid;
        $name = $request->name;
        $roles = $request->roles;

        $user = User::where('uuid', '=', $uuid)->first();
        $roles = Role::find($roles);

        if ($user) {
            $user->update([
                'name' => $name
            ]);

            $user->assignRole($roles);
        }

        return redirect()->route('users.index');
    }

    public function delete(Request $request)
    {
        $uuid = $request->uuid;
        
        $user = User::where('uuid', '=', $uuid)->first();

        if ($user) {
            $user->delete();
        }

        return redirect()->route('users.index');
    }
}
