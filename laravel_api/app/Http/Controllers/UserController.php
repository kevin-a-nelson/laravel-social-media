<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            $user = User::where('email', $request->email)->first();
            return response()->json([
                'message' => 'Login success',
                'user' => $user,
                'code' => 200
            ]);
        }

        return response()->json(
            [
                'message' => 'Login fail',
                'code' => 400
            ]
        );
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->name = $request->name;
        $user->save();

        return response()->json([
            'message' => 'User Created Sucess',
            'code' => 200
        ]);
    }
}
