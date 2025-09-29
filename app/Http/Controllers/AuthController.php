<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json(['status' => false, 'message' => 'Email not found']);
        }

        if(!Hash::check($request->password, $user->password)){
            return response()->json(['status' => false, 'message' => 'Incorrect password']);
        }

        Session::put('user', $user);

        return response()->json(['status' => true, 'message' => 'Login successful', 'user' => $user]);
    }

    // SIGNUP
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => 'User',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::put('user', $user);

        return response()->json(['status' => true, 'message' => 'Registration successful', 'user' => $user]);
    }

    // LOGOUT
    public function logout()
    {
        Session::forget('user');
        return response()->json(['status' => true, 'message' => 'Logged out successfully']);
    }
}
