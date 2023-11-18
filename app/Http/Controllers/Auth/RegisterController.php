<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $adminRole = Role::where('name', 'customer')->firstOrFail();
        $user->assignRole($adminRole);
        $token = Auth::guard('api')->login($user);
        $user['token'] = $token;
        return response()->json([
            'user' => $user,
            'token_type' => 'bearer',
        ]);
    }
}
