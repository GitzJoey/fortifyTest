<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->has('search') ? $request['search'] : '';

        if (!empty($search)) {
            $userLists = User::where('name', 'like', '%' . $search . '%')->latest()->get();
        } else {
            $userLists = User::latest()->get();
        }
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
        $password = $request->password;
        $status = $request->status == 'on' ? 1:0;

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->status = $status;
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
        $password = $request->password;
        $status = $request->status == 'on' ? 1:0;

        $user = User::where('uuid', '=', $uuid)->first();
        $roles = Role::find($roles);

        if ($user) {
            $user->update([
                'name' => $name,
                'status' => $status
            ]);

            $user->syncRoles([$roles->name]);
        }

        if (!empty($password)) {
            $user->password = Hash::make($password);
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
