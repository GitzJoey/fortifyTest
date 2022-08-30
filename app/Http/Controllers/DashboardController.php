<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('dashboard');
    }
    
    public function changepassword(Request $request)
    {
        return view('profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::where('uuid', '=', $request->id);

        $user->password = Hash::make($request->password);
        $user->save();

        return view('dashboard');
    }
}
