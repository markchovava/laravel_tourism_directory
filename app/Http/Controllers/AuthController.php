<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(Request $request){
        $email = User::where('email', $request->email)->first();
        if(isset($email)){
            return response()->json([
                'status' => 0,
                'message' => 'Email is aleady taken, please try another one.',
            ]);
        }
        $data = new User();
        $data->email = $request->email;
        $data->code = $request->password;
        $data->password = Hash::make($request->password);
        $data->role_level = 1;
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Created Successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        /* Check Email... */
        if(!isset($user)){
            return response()->json([
                'status' => 0,
                'message' => 'Email was not found.',
            ]);
        }
        /* Check Password... */
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => 2,
                'message' => 'The password is incorrect.',
            ]);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Login Successful.',
            'auth_token' => $user->createToken($user->email)->plainTextToken,
            'role_level' => $user->role_level,
        ]);
    }

    public function password(Request $request){
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        $data->code = $request->password;
        $data->password = Hash::make($request->password);
        $data->save();
        return response()->json([
            'message' => 'Password updated successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function view(){
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        return response()->json([
            'data' => new UserResource($data),
        ]);
    }

    public function update(Request $request){
        $user_id = Auth::user()->id;
        $email = User::where('id', '!=', $user_id)
                ->where('email', $request->email)->first();
        if(isset($email)){
            return response()->json([
                'status' => 0,
                'message' => 'Email is already taken, please try another one.',
            ]);
        }
        $data = User::find($user_id);
        $data->name = $request->name ;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Profile updated successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function emailUpdate(Request $request){
        $user_id = Auth::user()->id;
        $email = User::where('email', $request->email)->first();
        if(isset($email)){
            return response()->json([
                'status' => 0,
                'message' => 'Email already exists, try another one.',
            ]);
        } else {
            $data = User::find($user_id);
            $data->email = $request->email;
            $data->save();
            return response()->json([
                'status' => 1,
                'message' => 'Email updated successfully.',
            ]);
        }
    }


    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out succesfully.',
        ]);
    }

}
